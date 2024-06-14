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
            'label' => 'Theme',
            'icon' => 'heroicon-c-academic-cap',
            'children' => [
                [
                    'label' => 'Demo',
                    'icon' => 'heroicon-c-eye',
                    'route' => 'demo',
                ],
                [
                    'label' => 'Pulse',
                    'icon' => 'heroicon-c-signal',
                    'route' => 'pulse',
                    'roles' => [UserRole::Admin],
                ], [
                    'label' => 'Pulse',
                    'icon' => 'heroicon-c-signal',
                    'route' => 'pulse',
                    'roles' => [UserRole::Admin],
                ],
            ],
        ],
        [
            'label' => 'Administration',
            'icon' => 'heroicon-c-document',
            'roles' => [UserRole::Admin],
            'children' => [
                [
                    'label' => 'Users',
                    'icon' => 'heroicon-c-user',
                    'route' => 'user-management.listing',
                ],
            ],
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
