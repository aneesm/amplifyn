<?php
/*
Place Detail Page
*/

$context = Timber::get_context();
$posts = new Timber\PostQuery();

$templates = array( 'search-global.twig' );

$context['posts'] = $posts;
$context['search_query'] = get_search_query();
$context['posts_per_page'] = get_field('search__posts-per-page', 'options');

Timber::render($templates, $context);
