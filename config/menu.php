<?php

use App\Enums\UserRole;

return [
    'app' => [
        [
            'label' => 'Dashboard',
            'icon' => 'heroicon-m-chart-bar-square',
            'route' => 'dashboard',
        ],
        [
            'label' => 'Demo',
            'icon' => 'heroicon-c-eye',
            'route' => 'demo',
        ],
        [
            'label' => 'System',
            'icon' => 'heroicon-c-cog',
            'roles' => [UserRole::Admin],
            'children' => [
                [
                    'label' => 'Pulse',
                    'icon' => 'heroicon-c-signal',
                    'route' => 'pulse',
                    'roles' => [UserRole::Admin],
                ],
            ],
        ],
    ],
];
