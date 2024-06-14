@props([
    'header'
])

<!-- Page Heading -->
<div x-data="{open: false}" class="sticky top-0 left-0 right-0">
    <header class="bg-dark dark:bg-darkDark shadow">
        <div class="max-w-7xl flex mx-auto gap-2 py-4 px-4 sm:px-6 lg:px-8 ">
            <div class="flex-none self-center">
                <livewire:theme::layouts.app.menu menuType="mobile" />
            </div>
            <div class="flex-auto self-center">
                <!-- page title -->
                <h2 class="font-semibold text-xl text-primary dark:text-primaryDark leading-tight">
                    {{ $header }}
                </h2>
            </div>
            <div class="flex-none self-center">
                <livewire:layouts.app.profile-menu/>
            </div>
            <div class="flex-none self-center">
                <x-theme::layouts.theme-switcher/>
            </div>
        </div>
    </header>
</div>
