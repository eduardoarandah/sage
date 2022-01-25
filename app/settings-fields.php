<?php

// field definitions

function sage_settings_text_option($name, $label, $settings, $section)
{
    register_setting($section, $name);
    add_settings_field($name, $label, function () use ($name) {
        sage_settings_text_option_field($name);
    }, $settings, $section);
}

function sage_settings_text_option_field($name)
{
?>
    <input type="text" name="<?php echo $name ?>" id="<?php echo $name ?>" value="<?php echo get_option($name); ?>" />
<?php
}

function sage_settings_check_option($name, $label, $settings, $section)
{
    register_setting($section, $name);
    add_settings_field($name, $label, function () use ($name) {
        sage_settings_check_option_field($name);
    }, $settings, $section);
}

function sage_settings_check_option_field($name)
{
?>
    <input type="checkbox" name="<?php echo $name ?>" value="1" <?php checked(1, get_option($name), true); ?> />
<?php
}


function sage_settings_image_option($name, $label, $settings, $section)
{
    register_setting($section, $name,  function () use ($name) {

        // if image exists
        if (!empty($_FILES[$name]["tmp_name"])) {
            $urls = wp_handle_upload($_FILES[$name], array('test_form' => FALSE));
            if (!empty($urls["url"]))
                return $urls["url"];
        }
        // if deleting image
        elseif (!empty($_POST["$name-delete"])) {
            return "";
        }
        // if nothing
        return get_option($name);
    });
    add_settings_field($name, $label, function () use ($name) {
        sage_settings_image_option_field($name);
    }, $settings, $section);
}


function sage_settings_image_option_field($name)
{
?>
    <input type="file" name="<?php echo $name ?>" />
    <?php if (get_option($name)) : ?>
        <p>
            <a href="<?php echo get_option($name); ?>" target="_blank">
                <img src="<?php echo get_option($name); ?>" style="max-height: 200px;max-height:200px" />
            </a>
        </p>
        <p>
            <label>
                <?php echo __("Delete image?", "sage") ?>
                <input type="checkbox" name="<?php echo $name ?>-delete" value="1" />
            </label>
        </p>
    <?php endif ?>

<?php
}
