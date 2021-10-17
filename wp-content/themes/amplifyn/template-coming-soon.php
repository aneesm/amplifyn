<?php
/*
Template Name: Coming Soon Page
*/

$context = Timber::get_context();
$post = Timber::get_post();

$templates = [ 'templates/coming-soon-page.twig' ];
$context['post'] = $post;
$context['is_coming_soon'] = true;

Timber::render($templates, $context);
