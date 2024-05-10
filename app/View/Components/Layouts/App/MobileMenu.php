<?php

declare(strict_types=1);

namespace App\View\Components\Layouts\App;

use Closure;
use Illuminate\Contracts\View\View;

class MobileMenu extends AbstractMenu
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $items = $this->getItems();
        return view('components.layouts.app.mobile-menu', compact('items'));
    }
}
