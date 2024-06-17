<?php

namespace Corrivate\Theme\Table;

enum SearchType: string
{
    case None = 'None';
    case Is = 'Is';
    case Like = 'Like';
    case FromDateTo = 'FromDateTo';
    case FromNumTo = 'FromNumTo';
    case SelectOne = 'SelectOne';
}
