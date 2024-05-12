<?php

declare(strict_types=1);

namespace App\Values;

use App\Enums\UserRole;
use Livewire\Wireable;

class MenuItem implements Wireable
{
    public bool $active = false;

    public string $url = '';

    /**
     * @param  UserRole[]  $roles
     */
    public function __construct(
        public string $label,
        public string $icon,
        public string $route,
        public array $roles = [],
    ) {
    }

    /**
     * @return array{'label': string, 'icon': string, 'route': string, 'roles': UserRole[]}
     */
    public function toLivewire(): array
    {
        return [
            'label' => $this->label,
            'icon' => $this->icon,
            'route' => $this->route,
            'roles' => $this->roles,
        ];
    }

    /**
     * @param  array{'label': string, 'icon': string, 'route': string, 'roles': UserRole[]}  $value
     */
    public static function fromLivewire($value): MenuItem
    {
        return new MenuItem(
            $value['label'],
            $value['icon'],
            $value['route'],
            $value['roles']
        );
    }
}
