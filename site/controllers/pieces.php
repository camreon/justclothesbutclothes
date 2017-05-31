<?php

// This is a controller file that contains the logic for the blog template.
// It consists of a single function that returns an associative array with
// template variables.
//
// Learn more about controllers at:
// https://getkirby.com/docs/developer-guide/advanced/controllers

return function($site, $pages, $page) {

  $excludedFields = array('title', 'date', 'coverimage', 'text');

  // fetch the basic set of pages
  $pieces = $page->children()->visible()->flip();
  $c = $pieces->first()->content();

  $categories = Array();

  // fetch all fields
  foreach ($c as $key => $value) {
    if ($key == "fields") {
      foreach ($value as $field) {
        if (!in_array($field, $excludedFields))  {
          $tags = $pieces->pluck($field, ',', true);
          $categories[$field] = implode(',', $tags);
        }
      }
    }
  }

  // add the tag filters
  if($rawTags = param('tag')) {
    $selected = explode(',', $rawTags);

    $pieces = $pieces->filter(function($piece) use ($selected) {
      // get all the tags from a single page
      $pageTags = Array();
      $c = $piece->content();
      $excludedFields = array('title', 'date', 'coverimage', 'text');

      foreach ($c as $key => $value) {
        if ($key == "fields") {
          foreach ($value as $field) {
            if (!in_array($field, $excludedFields))  {
              $pageTags[] = $piece->$field();
            }
          }
        }
      }

      // find pieces that contain all the selected tags
      if (!array_diff($selected, $pageTags)) {
        return $piece;
      }
    });
  }

  // apply pagination
  $pieces   = $pieces->paginate(10);
  $pagination = $pieces->pagination();

  return compact('pieces', 'pagination', 'selected', 'categories');

};
