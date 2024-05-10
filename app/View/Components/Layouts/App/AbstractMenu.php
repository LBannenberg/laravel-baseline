<?php

declare(strict_types=1);

namespace App\View\Components\Layouts\App;

use App\Enums\UserRole;
use Illuminate\View\Component;

abstract class AbstractMenu extends Component
{
    protected function getItems(): array
    {
        $items = $this->generateBaseItems();
        $items = $this->applyGates($items);
        $items = $this->applyTranslations($items);
        $items = $this->applyRoutes($items);
        return $items;
    }

    private function generateBaseItems(): array
    {
        return [
            [
                'label' => 'Dashboard',
                'icon' => 'heroicon-m-chart-bar-square',
                'route' => 'dashboard',
            ],
            [
                'label' => 'Pulse',
                'icon' => 'heroicon-c-signal',
                'route' => 'pulse',
                'roles' => [UserRole::Admin]
            ],
            [
                'label' => 'Demo',
                'icon' => 'heroicon-c-eye',
                'route' => 'demo'
            ]
        ];
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
