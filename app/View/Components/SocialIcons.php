<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;

class SocialIcons extends Component
{
    public function render()
    {
        return $this->view('components.social-icons', [
            'facebook' => get_option('facebook'),
            'twitter' => get_option('twitter'),
            'youtube' => get_option('youtube'),
            'instagram' => get_option('instagram'),
        ]);
    }
}

