<?php

// menu item
add_action("admin_menu", "add_sage_menu_item");

function add_sage_menu_item()
{
    add_menu_page("Settings", __("Theme options", "sage"), "manage_options", "theme-panel", "sage_settings_page", null, 99);
}

// page
function sage_settings_page()
{
?>
    <div class="wrap">
        <h1>Settings</h1>
        <form method="post" action="options.php" enctype="multipart/form-data">
            <?php settings_fields("sage_settings"); ?>
            <?php do_settings_sections("sage_settings_global"); ?>
            <?php do_settings_sections("sage_settings_posts"); ?>
            <?php submit_button(); ?>
        </form>
    </div>
<?php
}

// global fields
function sage_settings_fields_global()
{
    add_settings_section("sage_settings", __("Global", "sage"), null, "sage_settings_global");
    sage_settings_text_option("text_option", __("Text option", "sage"), "sage_settings_global", "sage_settings");
    sage_settings_check_option("check_option", __("Check option", "sage"), "sage_settings_global", "sage_settings");
    sage_settings_image_option("image_option", __("Image option", "sage"), "sage_settings_global", "sage_settings");
}

add_action("admin_init", "sage_settings_fields_global");

// post fields
function sage_settings_fields_posts()
{
    add_settings_section("sage_settings", __("Posts", "sage"), null, "sage_settings_posts");
    sage_settings_text_option("text_option2", __("Text option", "sage"), "sage_settings_posts", "sage_settings");
    sage_settings_check_option("check_option2", __("Check option", "sage"), "sage_settings_posts", "sage_settings");
    sage_settings_image_option("image_option2", __("Image option", "sage"), "sage_settings_posts", "sage_settings");
}

add_action("admin_init", "sage_settings_fields_posts");
