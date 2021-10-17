<?php
/*
Template Name: Portraits Page
*/

$context = Timber::get_context();
$post = Timber::get_post();

$templates = [ 'templates/portraits-page.twig' ];
$context['components'] = get_field('portraits__flex', $post->ID);

$context['portraits'] = $post;

Timber::render($templates, $context);


