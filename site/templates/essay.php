<?php snippet('header') ?>

  <main class="main essay" role="main">
    <section>

      <?= $page->text()->footnotes() ?>

      <div class="agree">
        <input type="checkbox" id="check"><label for="check">I agree with the terms</label>
      </div>

      <div class="continue">
        <a href="<?= $page->nextPage() ?>">Continue</a>
      </div>

    </section>
  </main>

<?php snippet('footer') ?>
