<?php

namespace App;

class PostWidget extends \WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'post-widget', // Base ID
            esc_html__('&raquo; Post Widget', 'sage'), // Name
            [
                'description' => esc_html__('A block of posts', 'sage')
            ]
        );
    }

    public function form_field_values($instance, $name, $default = null)
    {
        return [
            'id' => $this->get_field_id($name),
            'name' => $this->get_field_name($name),
            'value' => $instance[$name] ?? '',
            'default' => $default,
        ];
    }

    public function form($instance)
    {
        $templates = [];
        foreach (glob(get_theme_file_path('resources/views/post-widget-structures/*')) as $file) {
            if ($file == '.' || $file == '..') continue;
            $templates[] = basename($file);
        }
        echo \Roots\view('widgets/post-widget', [
            'cat' => $this->form_field_values($instance, 'cat', ''),
            'author' => $this->form_field_values($instance, 'author', ''),
            'posts_per_page' => $this->form_field_values($instance, 'posts_per_page', '1'),
            'offset' => $this->form_field_values($instance, 'offset', '0'),
            'thumbnail_size' => $this->form_field_values($instance, 'thumbnail_size', ''),
            'excerpt_words' => $this->form_field_values($instance, 'excerpt_words', ''),
            'structure_file' => $this->form_field_values($instance, 'structure_file', ''),
            'templates' => $templates,
        ])->render();
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';
        $instance['cat'] = (!empty($new_instance['cat'])) ? sanitize_text_field($new_instance['cat']) : '';
        $instance['author'] = (!empty($new_instance['author'])) ? sanitize_text_field($new_instance['author']) : '';
        $instance['posts_per_page'] = (!empty($new_instance['posts_per_page'])) ? sanitize_text_field($new_instance['posts_per_page']) : '';
        $instance['offset'] = (!empty($new_instance['offset'])) ? sanitize_text_field($new_instance['offset']) : '';
        $instance['thumbnail_size'] = (!empty($new_instance['thumbnail_size'])) ? sanitize_text_field($new_instance['thumbnail_size']) : '';
        $instance['excerpt_words'] = (!empty($new_instance['excerpt_words'])) ? sanitize_text_field($new_instance['excerpt_words']) : '';
        $instance['structure_file'] = (!empty($new_instance['structure_file'])) ? $new_instance['structure_file'] : '';
        return $instance;
    }

    public function widget($args, $instance)
    {
        // query items
        $query_args = [
            'post_type' => 'post',
            'cat' => $instance['cat'] ?? null,
            'author' => $instance['author'] ?? null,
            'posts_per_page' => $instance['posts_per_page'] ?? null,
            'offset' => $instance['offset'] ?? null,
        ];

        $posts = [];
        $the_query = new \WP_Query($query_args);
        foreach ($the_query->posts as $post) {
            // extra
            $post->rendered_thumbnail = get_the_post_thumbnail($post->ID, $instance['thumbnail_size'], array('class' => "thumbnail"));
            $post->excerpt_or_content = Helpers::excerptOrContent($post, $instance['excerpt_words']);
            $post->author_data = get_userdata($post->post_author);
            $post->permalink = get_permalink($post);
            $post->date_w3c = date(DATE_W3C, strtotime($post->post_date));
            $post->date_regional = date_i18n(get_option('date_format'), strtotime($post->post_date));
            $posts[] = $post;
        }

        if (!empty($instance['structure_file'])) {
            $template = get_theme_file_path("resources/views/post-widget-structures/{$instance['structure_file']}");
            if (!file_exists($template)) {
                echo "doesn't exist: $template";
                return;
            }
            echo \Roots\view($template, [
                'posts' => $posts,
            ])->render();
        }
    }
}

function register_post_widget()
{
    register_widget('App\PostWidget');
}
add_action('widgets_init', 'App\register_post_widget');
