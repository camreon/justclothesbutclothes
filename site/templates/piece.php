<?php snippet('header') ?>

  <main class="main piece" role="main">
    <piece class="piece single">

      <header>
        <div><?= $page->isbn()->html() ?></div>
      </header>

      <div class="images">
        <?php $index = 0; foreach ($page->images()->sortBy('sort', 'asc') as $image): ?>
          <a href="#img_<?= $index + 1 ?>" name="img_<?= $index ?>">
            <img src="<?= $image->url() ?>" />
          </a>
          <?php $index++ ?>
        <?php endforeach ?>
      </div>

      <div class="categories">
        <?php
          $excludedFields = array('title', 'date', 'coverimage', 'text');
          $c = $page->content();

          foreach ($c as $key => $value) {
            if ($key == "fields") {
              foreach ($value as $field) {
                if (!in_array($field, $excludedFields)) {
                  foreach (explode(',', $page->$field()) as $tag) {
                    echo "<span><a href='/?q=" . urlencode($tag) . "'>" . $tag . " </a></span> "; 
                  }
                }
              }
            }
          }
        ?>
      </div>

    </piece>
    <!-- <?php snippet('prevnext', ['flip' => true]) ?> -->
  </main>

<?php snippet('footer') ?>
