<?php snippet('header') ?>

  <main class="main piece" role="main">
    <piece class="piece single">

      <header>
        <div><?= $page->isbn()->html() ?></div>
      </header>

      <div class="blocks">

          <?php $index = 0; foreach ($page->images()->sortBy('sort', 'asc') as $image): ?>
            <?php if ($index == (($page->images()->count())-1)): ?>
              <a href="#categories" name="img_<?= $index ?>" class="image">
                <div class="image-container">
                  <img src="<?= $image->url() ?>" />
                </div>
              </a>
            <?php else: ?>
              <a href="#img_<?= $index + 1 ?>" name="img_<?= $index ?>" class="image">
                <div class="image-container">
                  <img src="<?= $image->url() ?>" />
                </div>
              </a>
              <?php $index++ ?>
            <?php endif ?>
          <?php endforeach ?>

          <div class="categories" id="categories">
            <?php
              $excludedFields = array('title', 'date', 'coverimage', 'text');
              $c = $page->content();

              foreach ($c as $key => $value) {
                if ($key == "fields") {
                  foreach ($value as $field) {
                    if (!in_array($field, $excludedFields)) {
                      foreach (explode(',', $page->$field()) as $tag) {
                        echo "<span><a href='/pieces?q=" . urlencode($tag) . "'>" . $tag . "</a> </span>";
                      }
                    }
                  }
                }
              }
            ?>
          </div>

      </div>

    </piece>
  </main>

<?php snippet('footer') ?>
