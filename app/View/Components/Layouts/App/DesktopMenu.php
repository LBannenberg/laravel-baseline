<?php

declare(strict_types=1);

namespace App\View\Components\Layouts\App;

use Illuminate\Contracts\View\View;

class DesktopMenu extends AbstractMenu
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
    public function render(): View
    {
        $items = $this->getItems();
        return view('components.layouts.app.desktop-menu', compact('items'));
    }
}
