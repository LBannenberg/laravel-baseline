<?php

use App\Enums\UserRole;
use App\Values\MenuItem;

return [
    'app' => [
        new MenuItem(
            'Dashboard',
            'heroicon-m-chart-bar-square',
            'dashboard',
        ),
        new MenuItem(
            'Pulse',
            'heroicon-c-signal',
            'pulse',
            roles: [UserRole::Admin],
        ),
        new MenuItem(
            'Demo',
            'heroicon-c-eye',
            'demo',
        ),
    ],
];
