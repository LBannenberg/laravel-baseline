<?php

declare(strict_types=1);

namespace App\Enums;

use Corrivate\Theme\Contracts\SelectableEnumContract;
use Corrivate\Theme\Values\SelectOption;

enum UserRole: string implements SelectableEnumContract
{
    case Admin = 'Admin';
    case User = 'User';

    /**
     * @return SelectOption[]
     */
    public static function toSelectOptions(bool $withBlank): array
    {
        $result = $withBlank
            ? [new SelectOption('', '', '')]
            : [];

        return array_merge($result, [
            new SelectOption(UserRole::User, UserRole::User->name, 'bg-green-500'),
            new SelectOption(UserRole::Admin, UserRole::Admin->name, 'bg-purple-500'),
        ]);
    }
}
