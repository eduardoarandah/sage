<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class SocialShare extends Composer
{

    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.social-share',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        $post = get_post();
        $urlEncoded = urlencode(get_permalink($post->ID));
        $titleEncoded = urlencode($post->post_title);

        return [
            'facebook' => "https://www.facebook.com/sharer.php?u=$urlEncoded",
            'twitter' => "https://twitter.com/share?text=$titleEncoded&url=$urlEncoded",
            'whatsapp' => "https://wa.me/?text=$titleEncoded $urlEncoded"
        ];
    }
}
