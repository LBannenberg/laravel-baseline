<?php

declare(strict_types=1);

namespace Corrivate\Theme\Table;

class Column
{
    public string $component = 'theme::columns.column';

    public function __construct(
        public string $key,
        public string $label)
    {
    }

    public static function make(string $key, string $label): static
    {
        return new static($key, $label);
    }

    public function component($component): static
    {
        $this->component = $component;

        return $this;
    }
}
