<?php snippet('header') ?>

  <main class="main" role="main">

    <header class="wrap">
      <h1><?= $page->title()->html() ?></h1>

      <?php
      // This page uses a separate controller to set variables, which can be used
      // within this template file. This results in less logic in your templates,
      // making them more readable. Learn more about controllers at:
      // https://getkirby.com/docs/developer-guide/advanced/controllers
      if($pagination->page() == 1):
      ?>
        <div class="intro text">
          <?= $page->text()->kirbytext() ?>
        </div>
      <?php endif ?>

      <hr />
    </header>

    <!-- sidebar with tagcloud -->
    <aside>
      <h1>Tags</h1>
      <ul class="tags">
        <?php foreach($tags as $tag): ?>
        <li>
          <a href="<?php echo url($page->url() . '/' . url::paramsToString(['tag' => $tag])) ?>">
            <?php echo html($tag) ?>
          </a>
        </li>
        <?php endforeach ?>
      </ul>
    </aside>

    <section class="wrap">
      <?php if($pieces->count()): ?>
        <?php foreach($pieces as $piece): ?>

          <piece class="piece index">

            <header class="piece-header">
              <h2 class="piece-title">
                <a href="<?= $piece->url() ?>"><?= $piece->title()->html() ?></a>
              </h2>

              <p class="piece-date"><?= $piece->date('F jS, Y') ?></p>
            </header>

            <!-- <?php snippet('coverimage', $piece) ?> -->

            <!-- <div class="text">
              <p>
                <?= $piece->text()->kirbytext()->excerpt(50, 'words') ?>
                <a href="<?= $piece->url() ?>" class="piece-more">read more</a>
              </p>
            </div> -->

          </piece>

          <hr />

        <?php endforeach ?>
      <?php else: ?>
        <p>This site does not contain any pieces yet.</p>
      <?php endif ?>
    </section>

    <?php snippet('pagination') ?>

  </main>

<?php snippet('footer') ?>