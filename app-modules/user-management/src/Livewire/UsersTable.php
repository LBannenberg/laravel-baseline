<?php

declare(strict_types=1);

namespace Corrivate\UserManagement\Livewire;

use App\Models\User;
use Corrivate\Theme\Livewire\Table;
use Corrivate\Theme\Table\Column;
use Illuminate\Database\Eloquent\Builder;

class UsersTable extends Table
{
    public function query(): Builder
    {
        return User::query();
    }

    public function columns(): array
    {
        return [
            Column::make('name', 'Name'),
            Column::make('email', 'Email'),
            Column::make('status', 'Status')->component('user-management::columns.users.status'),
            Column::make('created_at', 'Created At')->component('theme::columns.common.human-diff'),
        ];
    }
}
