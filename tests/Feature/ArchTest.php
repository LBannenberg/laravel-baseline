<?php

arch('No debugging statements are left in our code.')
    ->expect(['dd', 'dump', 'var_dump', 'ray'])
    ->not->toBeUsed();

arch('Do not use env helper in code')
    ->expect(['env'])
    ->not->toBeUsed();

arch('Use strict types')
    ->expect('App')
    ->toUseStrictTypes();

arch('Action classes should be invokable')
    ->expect('App\Actions')
    ->toBeInvokable();

arch('Job classes should have handle method')
    ->expect('App\Jobs')
    ->toHaveMethod('handle');

arch('Services classes should have proper suffix')
    ->expect('App\Services')
    ->toHaveSuffix('Service');

arch('Controller classes should have proper suffix')
    ->expect('App\Controllers')
    ->toHaveSuffix('Controller');

arch('Do not access session data in Async jobs')
    ->expect([
        'session',
        'auth',
        'request',
        'Illuminate\Support\Facades\Auth',
        'Illuminate\Support\Facades\Session',
        'Illuminate\Http\Request',
        'Illuminate\Support\Facades\Request',
    ])
    ->each->not->toBeUsedIn('App\Jobs');

arch('Contracts should be interfaces')
    ->expect('App\Contracts')
    ->toBeInterfaces();

arch('Concerns should be traits')
    ->expect('App\Concerns')
    ->toBeTraits();

arch('Value objects should be final')
    ->expect('App\ValueObjects')
    ->toBeFinal();

arch('Value objects should be readonly')
    ->expect('App\ValueObjects')
    ->toBeReadonly();

arch('Value objects should extend nothing')
    ->expect('App\ValueObjects')
    ->toExtendNothing();

arch('Value objects do not implement interfaces')
    ->expect('App\ValueObjects')
    ->toImplementNothing();

arch('All Enums should be backed')
    ->expect('App\Enums')
    ->enums()
    ->toBeStringBackedEnums();
