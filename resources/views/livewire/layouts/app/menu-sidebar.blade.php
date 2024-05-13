<!-- Left Column -->
<div class="hidden lg:block fixed top-20 left-0 bottom-0 right-auto w-[18rem] px-3 overflow-y-auto">
    <nav id="nav" class="">
        <ul class="grid grid-cols-1 gap-2">
            @foreach($items as $item)
                @if($item['route'])
                    <li @class([
                                'rounded-md border-2 bg-dark dark:bg-darkDark hover:border-info hover:text-info dark:hover:text-infoDark',
                                'border-primary dark:border-primaryDark text-primary dark:text-primaryDark' => $item['active'],
                                'border-secondary dark:border-lightDark text-light dark:text-secondaryDark' => !$item['active']
                                ])>
                        <a href="{{$item['route']}}" class="p-2 block">
                            <x-dynamic-component component="{{$item['icon']}}" class="w-8 h-8 inline"/>
                            {{$item['label']}}</a>
                    </li>
                @else
                    <!-- nested items -->
                @endif
            @endforeach

        </ul>
    </nav>
</div>
