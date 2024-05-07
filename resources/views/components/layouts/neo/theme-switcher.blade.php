<script>
    setDarkClass = () => {

        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark')
        } else {
            document.documentElement.classList.remove('dark')
        }
    }

    setDarkClass()

    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', setDarkClass)
</script>

<div x-data="{
        theme: localStorage.theme,
        darkMode() {
            this.theme = 'dark'
            localStorage.theme = 'dark'
            setDarkClass()
        },
        lightMode() {
            this.theme = 'light'
            localStorage.theme = 'light'
            setDarkClass()
        },
        systemMode() {
            this.theme = undefined
            localStorage.removeItem('theme')
            setDarkClass()
        },
    }">
    <x-dropdown align="right" width="48">
        <x-slot name="trigger">
            <button
                x-cloak
                class="block p-1 rounded hover:bg-gray-100 dark:hover:bg-gray-800"
                :class="theme ? 'text-gray-700 dark:text-gray-300' : 'text-gray-400 dark:text-gray-600 hover:text-gray-500 focus:text-gray-500 dark:hover:text-gray-500 dark:focus:text-gray-500'"
            >
                <x-heroicon-c-sun class="block dark:hidden w-5 h-5"/>
                <x-heroicon-c-moon class="hidden dark:block w-5 h-5"/>
            </button>
        </x-slot>

        <x-slot name="content">
            <button class="flex items-center px-4 py-2 gap-3 hover:bg-gray-100 dark:hover:bg-gray-700"
                    :class="theme === 'light' ? 'text-gray-900 dark:text-gray-100' : 'text-gray-500 dark:text-gray-400'"
                    @click="lightMode()">
                <x-heroicon-c-sun class="w-5 h-5"/>
                Light
            </button>
            <button class="flex items-center px-4 py-2 gap-3 hover:bg-gray-100 dark:hover:bg-gray-700"
                    :class="theme === 'dark' ? 'text-gray-900 dark:text-gray-100' : 'text-gray-500 dark:text-gray-400'"
                    @click="darkMode()">
                <x-heroicon-c-moon class="w-5 h-5"/>
                Dark
            </button>
            <button class="flex items-center px-4 py-2 gap-3 hover:bg-gray-100 dark:hover:bg-gray-700"
                    :class="theme === undefined ? 'text-gray-900 dark:text-gray-100' : 'text-gray-500 dark:text-gray-400'"
                    @click="systemMode()">
                <x-heroicon-c-computer-desktop class="w-5 h-5"/>
                System
            </button>
        </x-slot>
    </x-dropdown>
</div>
