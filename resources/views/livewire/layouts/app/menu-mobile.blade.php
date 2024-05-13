<!-- Responsive Navigation Menu -->
<div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-light dark:bg-lightDark">
    @foreach($items as $item)
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="$item['route']" :active="$item['active']" wire:navigate>
                {{ $item['label'] }}
            </x-responsive-nav-link>
        </div>
    @endforeach

    <!-- Responsive Settings Options -->
    <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
        <div class="px-4">
            <div class="font-medium text-base text-gray-800 dark:text-gray-200"
                 x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name"
                 x-on:profile-updated.window="name = $event.detail.name"></div>
            <div class="font-medium text-sm text-gray-500">{{ auth()->user()->email }}</div>
        </div>

        <div class="mt-3 space-y-1">
            <x-responsive-nav-link :href="route('profile')" wire:navigate>
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
    <div class="block h-2 bg-gray-100 dark:bg-gray-900"></div>
</div>
