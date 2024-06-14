<?php

declare(strict_types=1);

namespace Corrivate\Theme\Livewire;

use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;

/**
 * Based on https://fly.io/laravel-bytes/reusable-dynamic-tables-with-laravel-livewire/
 */
abstract class Table extends Component
{
    use WithPagination;

    public int $perPage = 10;

    public int $page = 1;

    public string $sortBy = '';

    public string $sortDirection = 'asc';

    public function render(): View
    {
        return view('theme::livewire.table');
    }

    abstract public function query(): Builder;

    abstract public function columns(): array;

    public function data(): LengthAwarePaginator
    {
        return $this
            ->query()
            ->when($this->sortBy !== '', function ($query) {
                $query->orderBy($this->sortBy, $this->sortDirection);
            })
            ->paginate($this->perPage);
    }

    public function sort($key): void
    {
        $this->resetPage();

        if ($this->sortBy === $key) {
            $direction = $this->sortDirection === 'asc' ? 'desc' : 'asc';
            $this->sortDirection = $direction;

            return;
        }

        $this->sortBy = $key;
        $this->sortDirection = 'asc';
    }
}
