<?php
/*
Blog Article
*/

$context = Timber::get_context();
$context['post'] = Timber::get_post();

Timber::render([ 'single.twig' ], $context);
