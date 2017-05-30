<?php snippet('header') ?>

  <main class="main" role="main">
    <piece class="piece single wrap">

      <header class="piece-header">
        <h1><?= $page->title()->html() ?></h1>
        <div class="intro text">
          <?= $page->date('F jS, Y') ?>
        </div>
        <hr />
      </header>

      <?php snippet('coverimage', $page) ?>

      <div class="text">
        <?= $page->text()->kirbytext() ?>
      </div>

      <h3>Tags</h3>

      <?php $tags = $page->tags()->split(); ?>
      <?php foreach($tags as $tag): ?>
      <div class="tag">
        <?php echo $tag ?>
      </div>
      <?php endforeach ?>

    </piece>

    <?php snippet('prevnext', ['flip' => true]) ?>

  </main>

<?php snippet('footer') ?>
