<?php snippet('header') ?>

  <?php $pieces = page('pieces')->children()->visible()->flip(); ?>

  <main class="main index" role="main" id="highlight">
    <section>
      <ul class="piece-list">

        <?php foreach($pieces as $piece): ?>
          <li class="piece-list-item">
            <a href="<?= $piece->url() ?>">

              <?php
                $excludedFields = array('title', 'date', 'coverimage', 'text');
                foreach ($piece->content() as $cat => $value) {
                  if ($cat == "fields") {
                    foreach ($value as $field) {
                      if (!in_array($field, $excludedFields)) {
                        foreach (explode(',', $piece->$field()) as $tag) {
                          echo "<span class='" . $field . "'>" . $tag . "</span> ";
                        }
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

    <div class="legend" id="legend">
      <span class="isbn">Code</span>
      <span class="designer">Designer Name</span>
      <span class="fabric">Fabric</span>
      <span class="production">Fabric production/treatment</span>
      <span class="closure">Closure Type</span>
      <span class="size">Marked Size</span>
      <span class="type">Garment Type</span>
      <span class="country">Country of manufacture</span>
      <span class="era">Era of manufacture</span>
    </div>

  </main>

  <?php echo js('assets/js/pieces.js') ?>

<?php snippet('footer') ?>
