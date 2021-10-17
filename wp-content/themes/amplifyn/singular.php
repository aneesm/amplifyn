<?php
/**
* Single entry template. Used for posts and other individual content items.
*
* To override for a particular post type, create a template named single-[post_type]
*/

$context = Timber::get_context();
$post = Timber::get_post();

$templates = array( 'single-' . $post->ID . '.twig', 'single-' . $post->post_type . '.twig', 'single.twig' );

$context['post'] = $post;

if (post_password_required($post->ID)) {
    //action URL for the post-level password protection form
    $context['password_form_action_url'] = add_query_arg('action', 'postpass', wp_login_url());
    Timber::render('single-password.twig', $context);
} else {
    Timber::render($templates, $context);
}
