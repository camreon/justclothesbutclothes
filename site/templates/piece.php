<?php snippet('header') ?>

  <main class="main piece" role="main">
    <piece class="piece single wrap">

      <header>
        <div><?= $page->isbn()->html() ?></div>
      </header>

      <div class="images">
        <?php foreach ($page->images()->sortBy('sort', 'asc') as $image): ?>
          <img src="<?= $image->url() ?>" alt="Thumbnail for <?= $page->title()->html() ?>" />
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
                  echo "<span><a href='/pieces/tag:" . $page->$field() . "'>" . $page->$field() . " </a></span> "; 
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
