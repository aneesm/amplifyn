<?php
/*
404 Page
*/

$context = Timber::get_context();
$post = Timber::get_post();

$templates = array( '404.twig' );

$context['post'] = $post;

Timber::render($templates, $context);
