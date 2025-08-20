<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StarRating extends Component
{
    public function __construct(
        public float $value = 0,   // 0..5, có thể 3.7
        public string $size = '5'  // 
    ) {}

    public function render()
    {
        return view('components.star-rating');
    }
}
