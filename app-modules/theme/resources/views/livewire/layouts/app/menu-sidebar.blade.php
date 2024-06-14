<!-- Left Column -->
<div class="hidden lg:block fixed top-20 left-0 bottom-0 right-auto w-[18rem] px-3 overflow-y-auto">
    <nav id="nav" class="">
        <ul class="grid grid-cols-1 gap-2">
            @foreach($items as $item)
                @if(isset($item['route']))
                    <li @class([
                                'rounded-md border-2 bg-dark dark:bg-darkDark hover:border-info hover:text-info dark:hover:text-infoDark',
                                'border-primary dark:border-primaryDark text-primary dark:text-primaryDark' => $item['active'],
                                'border-secondary dark:border-lightDark text-light dark:text-secondaryDark' => !$item['active']
                                ])>
                        <a href="{{$item['route']}}" class="p-2 block" wire:navigate>
                            <x-dynamic-component component="{{$item['icon']}}" class="w-8 h-8 inline"/>
                            {{$item['label']}}</a>
                    </li>
                @else
                    <li x-data="{ open: {{$item['active'] ? 'true': 'false'}} }" x-cloak
                        x-on:click="open = ! open" @click.outside="open = {{$item['active'] ? 'true': 'false'}}"
                        @class([
                                'rounded-md border-2 bg-dark dark:bg-darkDark text-light dark:text-secondaryDark hover:border-info hover:text-info dark:hover:text-infoDark',
                                'border-primary dark:border-primaryDark' => $item['active'],
                                'border-secondary dark:border-lightDark' => !$item['active']
                                ])>
                        <span class="p-2 block">
                            <x-dynamic-component component="{{$item['icon']}}" class="w-8 h-8 inline"/>
                            {{$item['label']}}</span>

                        <ul x-show="open" class="mx-4 grid grid-cols-1 gap-2">
                            @foreach(($item['children'] ?? []) as $childItem)
                                <li @class([
                                            'text-primary dark:text-primaryDark' => $childItem['active'],
                                            'text-light dark:text-secondaryDark' => !$childItem['active']
                                            ])>
                                    <a href="{{$childItem['route']}}" class="p-2 block" wire:navigate>
                                        <x-dynamic-component component="{{$childItem['icon']}}" class="w-8 h-8 inline"/>
                                        {{$childItem['label']}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endif
            @endforeach

        </ul>
    </nav>
</div>
