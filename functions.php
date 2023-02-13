<?php

use BoxyBird\Inertia\Inertia;

require_once __DIR__ . '/vendor/autoload.php';

// Ensure script tag has type=module if hot is running
add_filter( 'script_loader_tag', 'add_type_module_to_script_tag', 10, 3 );
function add_type_module_to_script_tag( $tag, $handle, $src ) {
    if(file_exists(__DIR__ . '/hot')) {
        if ('bb_theme' === $handle || 'vite_client' === $handle) {
            $tag = '<script type="module" src="' . esc_url( $src ) . '"></script>';
        }
    }

    return $tag;
}

// Enqueue scripts.
add_action('wp_enqueue_scripts', function () {
    if(file_exists(__DIR__ . '/hot')) {
        $url = file_get_contents(__DIR__ . '/hot');
        $file = $url . '/src/js/app.js';
        $version = time();
    } else {
        // Enqueue production script
        $manifest = get_stylesheet_directory() . '/build/manifest.json';
        $version = md5_file($manifest);
        $json = json_decode(file_get_contents($manifest));
        $file = get_stylesheet_directory_uri() . "/build/" . $json->{'src/js/app.js'}->file;
    }

    wp_enqueue_script('bb_theme', $file, [], $version, true);
});

// Share globally with Inertia views
add_action('after_setup_theme', function () {
    Inertia::share([
        'site' => [
            'name'        => get_bloginfo('name'),
            'description' => get_bloginfo('description'),
        ],
    ]);
});

// Add Inertia version. Helps with cache busting
add_action('after_setup_theme', function () {
    if(file_exists(__DIR__ . '/manifest.json')) {
        $version = md5_file(get_stylesheet_directory() . '/build/manifest.json');
    } else {
        $version = time();
    }

    Inertia::version($version);
});