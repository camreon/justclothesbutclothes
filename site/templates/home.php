<?php snippet('header') ?>

  <?php $pieces = page('pieces')->children()->visible(); ?>

  <main class="main" role="main" id="highlight">
    <section>
      <ul class="piece-list">

        <?php foreach($pieces as $piece): ?>
          <li class="piece-list-item">
            <a href="<?= $piece->url() ?>">
              
              <?php
                $excludedFields = array('title', 'date', 'coverimage', 'text');
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

 <?php echo js('assets/js/home.js') ?>

<?php snippet('footer') ?>