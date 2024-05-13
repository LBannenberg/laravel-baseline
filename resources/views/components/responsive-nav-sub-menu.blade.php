@props(['item'])


<div x-data="{ open: {{$item['active'] ? 'true': 'false'}} }"
     x-on:click="open = ! open" {{ $attributes->merge() }}
    @class([
    'block p-2 text-start text-base font-medium ',
    'bg-light text-dark dark:text-darkDark' => $item['active'],
    'bg-dark text-light dark:text-lightDark' => !$item['active']
])
>

    <div class="flex">
        <x-dynamic-component component="{{$item['icon']}}" class="w-8 h-8 inline flex-none"/>
        <span class="grow">{{$item['label']}}</span>
        <span class="flex-none" :class="{'rotate-90': open}" x-transition>
            <x-heroicon-c-chevron-right class="w-8 h-8"/>
        </span>
    </div>

    <div x-cloak x-show="open" x-transition class="mx-4 grid grid-cols-1 gap-2">
        @foreach(($item['children'] ?? []) as $child)
            <x-responsive-nav-link :href="$child['route']" wire:navigate @class([
                                     'text-primary dark:text-primaryDark' => $child['active'],
                                     'text-dark dark:text-darkDark' => !$child['active'] && $item['active'],
                                     'text-light dark:text-lightDark' => !$child['active'] && !$item['active'],
                                    ])>
                <x-dynamic-component component="{{$child['icon']}}" class="w-8 h-8 inline"/>
                {{ $child['label'] }}
            </x-responsive-nav-link>
        @endforeach
    </div>

</div>
