<div x-data="{open: false}" class="inline-block sm:hidden relative">
    <!-- Hamburger -->
    <button @click.stop="open = ! open"
            class="inline-flex items-center justify-center p-2 rounded-md text-light dark:text-secondaryDark focus:outline-none focus:bg-light dark:focus:bg-lightDark focus:text-primary dark:focus:text-primaryDark transition duration-150 ease-in-out">
        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                  stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M4 6h16M4 12h16M4 18h16"/>
            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                  stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
        </svg>
    </button>

    <!-- Menu -->
    <div class="absolute top-16 left-0 min-w-72 max-w-80" @click.outside="open = false">
        <div :class="{'block': open, 'hidden': ! open}"
             x-transition
             class="hidden sm:hidden bg-dark text-light dark:bg-darkDark dark:text-lightDark border-2 border-white rounded-md ">

            @foreach($items as $item)
                <div class="pt-2 pb-3 space-y-1">

                    @if(isset($item['route']))

                        <x-responsive-nav-link :href="$item['route']" wire:navigate @class([
                                                'bg-light dark:bg-lightDark text-primary dark:text-primaryDark' => $item['active']
                                                ])>
                            <x-dynamic-component component="{{$item['icon']}}" class="w-8 h-8 inline"/>
                            {{ $item['label'] }}
                        </x-responsive-nav-link>

                    @else
                        <x-responsive-nav-sub-menu :$item/>
                    @endif
                </div>
            @endforeach


            <!-- Responsive Settings Options -->
            <div class="pt-2 pb-1 border-t border-gray-200 dark:border-gray-600">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800 dark:text-gray-200"
                         x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name"
                         x-on:profile-updated.window="name = $event.detail.name"></div>
                    <div class="font-medium text-sm text-gray-500">{{ auth()->user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile')" wire:navigate @class([
    'bg-light dark:bg-lightDark text-primary dark:text-primaryDark' => request()->routeIs('profile')
                                            ])>
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <button wire:click="logout" class="w-full text-start">
                        <x-responsive-nav-link>
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
