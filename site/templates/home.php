<?php snippet('header') ?>

  <?php $pieces = page('pieces')->children()->visible(); ?>

  <main class="main home" role="main">
    <section>
      <ul class="piece-list">

        <?php foreach($pieces as $piece): ?>
          <li class="piece-list-item">
            <a href="<?= $piece->url() ?>">
              
              <?php
                $excludedFields = array('date', 'coverimage', 'text');
                foreach ($piece->content() as $key => $value) {
                  if ($key == "fields") {
                    foreach ($value as $field) {
                      if (!in_array($field, $excludedFields)) {
                        echo "<span class='" . $field . "'>" . $piece->$field() . " </span> "; 
                      }
                    }
                  }
                }
              ?>
              
            </a>  
          </li>
        <?php endforeach ?>

      </ul> 
    </section>
  </main>

<?php snippet('footer') ?>