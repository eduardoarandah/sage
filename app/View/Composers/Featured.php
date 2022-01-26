<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Featured extends Composer
{

    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.featured',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        $post = get_post();
        return [
            'youtube_embed' => $this->youtube_embed($post),
            'embed' => get_post_meta($post->ID, 'embed', true),
            'thumbnail' => has_post_thumbnail($post) ? get_the_post_thumbnail($post, 'large', ['class' => 'w-full']) : '',
            'caption' => has_post_thumbnail($post) ? get_the_post_thumbnail_caption($post) : '',
        ];
    }
    function youtube_embed()
    {
        // youtube embed
        $youtube_url = get_post_meta(get_the_ID(), 'youtube', true);
        $youtube_embed = null;
        if ($youtube_url) {
            $youtube_id = \App\Embeds::extractYoutubeId($youtube_url);
            $youtube_embed = "https://www.youtube.com/embed/$youtube_id";
        }
        return $youtube_embed;
    }
}
