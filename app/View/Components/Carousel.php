<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Carousel extends Component
{
    public array $slides = [
        [
            'image' => '/assets/images/bmi-bg1.jpg',
        ],
        [
            'image' => '/assets/images/bmi-bg2.jpg',
        ],
        [
            'image' => '/assets/images/bmi-bg3.jpg',
        ],
        [
            'image' => '/assets/images/bmi-bg4.jpg',
        ],
        [
            'image' => '/assets/images/bmi-bg5.jpg',
        ],
        [
            'image' => '/assets/images/bmi-bg6.jpg',
        ],
        [
            'image' => '/assets/images/bmi-bg7.jpg',
        ],
        [
            'image' => '/assets/images/bmi-bg8.jpg',
        ],
    ];

    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.carousel');
    }
}
