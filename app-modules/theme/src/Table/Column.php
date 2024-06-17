<?php

declare(strict_types=1);

namespace Corrivate\Theme\Table;

use Corrivate\Theme\Values\SelectOption;

class Column
{
    public array $options = [];

    public function __construct(
        public string $key,
        public string $label,
        public SearchType $searchType = SearchType::None,
        public string $width = '',
        public string $component = 'theme::columns.column',
    ) {
    }

    public static function make(string $key, string $label, SearchType $searchType = SearchType::None): static
    {
        return new static($key, $label, $searchType);
    }

    public function component(string $component): static
    {
        $this->component = $component;

        return $this;
    }

    /**
     * @param  SelectOption[]  $options
     * @return $this
     */
    public function options(array $options): static
    {
        $this->options = $options;

        return $this;
    }
}
