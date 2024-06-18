<?php

declare(strict_types=1);

namespace Corrivate\UserManagement\Livewire;

use App\Enums\UserRole;
use App\Models\User;
use Corrivate\Theme\Livewire\Table;
use Corrivate\Theme\Table\Column;
use Corrivate\Theme\Table\SearchType;
use Corrivate\Theme\Values\SelectOption;
use Illuminate\Database\Eloquent\Builder;

class UsersTable extends Table
{
    public function query(): Builder
    {
        return User::query();
    }

    /**
     * @return Column[]
     */
    public function columns(): array
    {
        return [
            Column::make('name', 'Name', SearchType::Like)->classes('w-[25%]'),
            Column::make('email', 'Email', SearchType::Like)->classes('w-[25%]'),
            Column::make('role', 'Role', SearchType::SelectOne)->options(UserRole::toSelectOptions(withBlank: true)),
            Column::make('status', 'Status', SearchType::SelectOne)
                ->component('user-management::columns.users.status')->options([
                    new SelectOption('', '', ''),
                    new SelectOption('deleted', 'deleted', 'bg-red-500'),
                    new SelectOption('active', 'active', 'bg-green-500'),
                    new SelectOption('inactive', 'inactive', 'bg-gray-500'),
                ]),
            Column::make('created_at', 'Created At', SearchType::FromDateTo)
                ->component('theme::columns.common.human-diff')
                ->classes('w-[25%] text-center'),
        ];
    }
}
