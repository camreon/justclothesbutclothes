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

    <aside>
      <h3>Categories</h3>
      <ul class="tags">

        <!-- append query params if 'tag' is already in the url -->
        <?php $appendTags = strpos(thisUrl(), 'tag') !== false ?>
        <?php $oneTagLeft = $selected && count($selected) < 2 ?>

        <?php foreach($categories as $category => $rawTags): ?>
          <li>
            <b><?php echo html($category) ?></b>
            <ul>
              <?php $tags = split(',', $rawTags); ?>
              <?php foreach ($tags as $tag): ?>
                <?php $isSelected = $selected && in_array($tag, $selected);

                // insanity
                if($appendTags):
                  $base = ($isSelected) ? str_replace(',' . $tag, '', thisUrl()) : thisUrl();
                  $params = ($isSelected) ? '' : ',' .  $tag;
                  $base = ($oneTagLeft) ? str_replace('tag:' . $tag, '', $base) : $base ;
                else:
                  $base = ($isSelected) ? str_replace('/tag:' . $tag, '', $page->url()) : $page->url();
                  $params = ($isSelected) ? '' : '/' . url::paramsToString(['tag' => $tag]);
                endif;

                $link = url($base . $params);
                ?>
                <li>
                  <a <?php ecco($isSelected, ' class="selected"') ?> href="<?php echo $link ?>">
                    <?php echo html($tag) ?>
                  </a>
                </li>
              <?php endforeach ?>
            </ul>
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
