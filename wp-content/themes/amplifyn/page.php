<?php
/*
Landing Page
*/

$context = Timber::get_context();
$post = Timber::get_post();
$templates = array( 'landing-page.twig' );
$context['components'] = get_field('landing__flex', $post->ID);
$context['post'] = $post;
Timber::render($templates, $context);