<?php

namespace Corrivate\Theme\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Volt\Volt;

class ThemeServiceProvider extends ServiceProvider
{
    public function register(): void
    {
    }

    public function boot(): void
    {
        Volt::mount([
            resource_path('../app-modules/theme/resources/views/livewire'),
        ]);
    }
}
