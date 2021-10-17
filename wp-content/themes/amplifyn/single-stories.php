<?php
/*
Portraits Detail Page
*/

$context = Timber::get_context();
$post = Timber::get_post();

$templates = [ 'templates/stories-page.twig' ];

$context['stories'] = $post;


Timber::render($templates, $context);
