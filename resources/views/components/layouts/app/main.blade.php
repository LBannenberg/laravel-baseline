<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">


<div class="min-h-screen bg-light dark:bg-lightDark">


    <x-layouts.app.header :$header/>

    <livewire:layouts.app.menu menuType="sidebar" />


    <!-- Page Content -->
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 text-dark dark:text-secondaryDark">
        <main class="py-6">
            {{ $slot }}
        </main>
        <x-layouts.app.footer/>
    </div>


    <!-- Right column -->
    <div class="hidden xl:block fixed z-20 top-20 right-0 left-auto bottom-0 w-[18rem] overflow-y-auto">
        <h5 class="text-primary dark:text-primaryDark">{{__('On this page')}}</h5>
        <ul class="grid grid-cols-1 gap-2">
            @foreach(range(0, 50) as $i)
                <li><span class="inline-block bg-light dark:bg-lightDark text-secondary dark:text-secondaryDark">{{$i}} Lorem ipsum dolor sit amet, consectetur adipiscing elit</span>
                </li>
            @endforeach
        </ul>
    </div>
</div>
</body>
</html>
