<?php

namespace Corrivate\Theme\Values;

readonly class SelectOption
{
    public function __construct(
        public mixed $value,
        public string $label,
        public string $class = ''
    ) {
    }
}
