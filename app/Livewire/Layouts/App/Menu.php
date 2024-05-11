<?php

declare(strict_types=1);

namespace App\Livewire\Layouts\App;

use App\Livewire\Actions\Logout;
use Livewire\Attributes\Locked;
use Livewire\Component;

class Menu extends Component
{
    #[Locked]
    public string $menuType;

    public array $items = [];

    public function mount(string $menuType): void
    {
        $this->menuType = $menuType;
        $items = config('menu.app');;
        $items = $this->applyGates($items);
        $items = $this->applyTranslations($items);
        $items = $this->applyRoutes($items);
        $this->items = $items;
    }

    public function render()
    {
        return $this->menuType == 'sidebar'
            ? view('livewire.layouts.app.menu-sidebar')
            : view('livewire.layouts.app.menu-mobile');
    }


    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }


    private function applyGates(array $items): array
    {
        $result = [];
        foreach($items as $item) {
            if(!isset($item['roles'])) {
                $result[] = $item;
                continue;
            }

            if(in_array(auth()->user()->role, $item['roles'])) {
                $result[] = $item;
            }
        }
        return $result;
    }


    private function applyTranslations(array $items): array
    {
        foreach($items as &$item) {
            $item['label'] = __($item['label']);
        }
        return $items;
    }

    private function applyRoutes(array $items): array
    {
        foreach($items as &$item) {
            if(!isset($item['route'])) {
                $item['active'] = false;
                continue;
            }
            $item['active'] = request()->routeIs($item['route']);
            $item['route'] = route($item['route']);
        }
        return $items;
    }
}