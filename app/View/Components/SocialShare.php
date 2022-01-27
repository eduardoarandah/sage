<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;

class SocialShare extends Component
{
    public $post;

    public function __construct($post)
    {
        $this->post = $post;
    }

    public function render()
    {
        $urlEncoded = urlencode(get_permalink($this->post->ID));
        $titleEncoded = urlencode($this->post->post_title);

        return $this->view('components.social-share', [
            'facebook' => "https://www.facebook.com/sharer.php?u=$urlEncoded",
            'twitter' => "https://twitter.com/share?text=$titleEncoded&url=$urlEncoded",
            'whatsapp' => "https://wa.me/?text=$titleEncoded $urlEncoded"
        ]);
    }
}
