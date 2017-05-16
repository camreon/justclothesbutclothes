<?php

// This is a controller file that contains the logic for the blog template.
// It consists of a single function that returns an associative array with
// template variables.
//
// Learn more about controllers at:
// https://getkirby.com/docs/developer-guide/advanced/controllers

return function($site, $pages, $page) {

  // fetch the basic set of pages
  $pieces = $page->children()->visible()->flip();

  // fetch all tags
  $tags = $pieces->pluck('tags', ',', true);

  // add the tag filters
  if($rawTags = param('tag')) {
    $filterTags = explode(',', $rawTags);

    $pieces = $pieces->filter(function($piece) use ($filterTags) {
      if(array_intersect($piece->tags()->split(','), $filterTags)) {
        return $piece;
      }
    });
  }

  // apply pagination
  $pieces   = $pieces->paginate(10);
  $pagination = $pieces->pagination();

  return compact('pieces', 'tags', 'tag', 'pagination');

};