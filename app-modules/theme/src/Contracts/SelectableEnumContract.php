<?php

namespace Corrivate\Theme\Contracts;

use Corrivate\Theme\Values\SelectOption;

interface SelectableEnumContract
{
    /**
     * @return SelectOption[]
     */
    public static function toSelectOptions(bool $withBlank): array;
}
