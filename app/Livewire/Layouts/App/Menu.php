<?php

declare(strict_types=1);

namespace App\Livewire\Layouts\App;

use App\Livewire\Actions\Logout;
use App\Values\MenuItem;
use Livewire\Attributes\Locked;
use Livewire\Component;

class Menu extends Component
{
    #[Locked]
    public string $menuType;

    /**
     * @var MenuItem[]
     */
    public array $items = [];

    public function mount(string $menuType): void
    {
        $this->menuType = $menuType;

        /** @var MenuItem[] $items */
        $items = config('menu.app');
        $items = $this->applyGates($items);
        $items = $this->applyTranslations($items);
        $items = $this->applyRoutes($items);
        $this->items = $items;
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return match ($this->menuType) {
            'sidebar' => view('livewire.layouts.app.menu-sidebar'),
            'mobile' => view('livewire.layouts.app.menu-mobile'),
            default => throw new \InvalidArgumentException("No view defined for menuType $this->menuType")
        };
    }

    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }

    /**
     * @param  MenuItem[]  $items
     * @return MenuItem[]
     */
    private function applyGates(array $items): array
    {
        $result = [];
        foreach ($items as $item) {
            if (! $item->roles) {
                $result[] = $item;

                continue;
            }

            // @phpstan-ignore-next-line (doesn't understand that user->role is a cast to enum)
            if (in_array(auth()->user()?->role, $item->roles)) {
                $result[] = $item;
            }
        }

        return $result;
    }

    /**
     * @param  MenuItem[]  $items
     * @return MenuItem[]
     */
    private function applyTranslations(array $items): array
    {
        foreach ($items as $item) {
            $item->label = (string) __($item->label);
        }

        return $items;
    }

    /**
     * @param  MenuItem[]  $items
     * @return MenuItem[]
     */
    private function applyRoutes(array $items): array
    {
        foreach ($items as $item) {
            if (! $item->route) {
                continue;
            }
            $item->active = request()->routeIs($item->route);
            $item->url = route($item->route);
        }

        return $items;
    }
}
