<?php
/*
Tag Archive
*/

$context = Timber::get_context();
$context['post'] = Timber::get_posts();

// posts per page
$context['posts_per_page'] = get_field('tag__posts-per-page', 'options');

// get taxonomy
$context['current_term'] = get_queried_object();

// get pagination state
global $paged;
if (!isset($paged) || !$paged)
    $paged = 1;
$context['paged'] = $paged;

$templates = array( 'tag-archive.twig' );

Timber::render($templates, $context);
