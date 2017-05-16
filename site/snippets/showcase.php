<?php

$pieces = page('pieces')->children()->visible();

/*

The $limit parameter can be passed to this snippet to
display only a specified amount of pieces:

```
<?php snippet('showcase', ['limit' => 3]) ?>
```

Learn more about snippets and parameters at:
https://getkirby.com/docs/templates/snippets

*/

if(isset($limit)) $pieces = $pieces->limit($limit);

?>

<ul class="showcase grid gutter-1">

  <?php foreach($pieces as $piece): ?>

    <li class="showcase-item column">
        <a href="<?= $piece->url() ?>" class="showcase-link">
          <?php if($image = $piece->images()->sortBy('sort', 'asc')->first()): $thumb = $image->crop(600, 600); ?>
            <img src="<?= $thumb->url() ?>" alt="Thumbnail for <?= $piece->title()->html() ?>" class="showcase-image" />
          <?php endif ?>
          <div class="showcase-caption">
            <h3 class="showcase-title"><?= $piece->title()->html() ?></h3>
          </div>
        </a>
    </li>

  <?php endforeach ?>

</ul>