<?php

// exclude REST API, XML_RPC
add_filter('rest_enabled', '__return_false');
remove_action('xmlrpc_rsd_apis', 'rest_output_rsd');
remove_action('wp_head', 'rest_output_link_wp_head', 10, 0);
remove_action('template_redirect', 'rest_output_link_header', 11, 0);
remove_action('auth_cookie_malformed', 'rest_cookie_collect_status');
remove_action('auth_cookie_expired', 'rest_cookie_collect_status');
remove_action('auth_cookie_bad_username', 'rest_cookie_collect_status');
remove_action('auth_cookie_bad_hash', 'rest_cookie_collect_status');
remove_action('auth_cookie_valid', 'rest_cookie_collect_status');
remove_filter('rest_authentication_errors', 'rest_cookie_check_errors', 100);
remove_action('init', 'rest_api_init');
remove_action('rest_api_init', 'rest_api_default_filters', 10, 1);
remove_action('parse_request', 'rest_api_loaded');
remove_action('rest_api_init', 'wp_oembed_register_route');
remove_filter('rest_pre_serve_request', '_oembed_rest_pre_serve_request', 10, 4);

// Переписать заголовки title + description поверх плагинов
add_filter( 'wpseo_title', 'my_title', 100);
add_filter( 'wpseo_metadesc', 'my_description', 100);
function my_title($title) {
    $title = 'Статьи компании XSA Ramps';
    return $title;
}
function my_description($description) {
    $description = 'Статьи о строительстве и проектировании скейт парков компанией XSA Ramps';
    return $description;
}