<?php

function sage_register_scripts()
{
    // scripts
    wp_enqueue_script('alpinejs', 'https://unpkg.com/alpinejs', [], '0.1.0', true);

    // styles
    // add define("WP_TAILWIND_DEBUG", true);
    if (defined("WP_TAILWIND_DEBUG") && WP_TAILWIND_DEBUG) {
        wp_enqueue_style('tailwind', "https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.css", [], '0.1.0', 'screen');
    }
}

add_action('wp_enqueue_scripts', 'sage_register_scripts');

