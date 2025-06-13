<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public function __construct() {}

    public function render(): View|Closure|string
    {
        return view('components.form.input');
    }
}
