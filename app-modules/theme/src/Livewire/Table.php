<?php

declare(strict_types=1);

namespace Corrivate\Theme\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

abstract class Table extends Component
{
    use WithPagination;

    public $perPage = 10;

    public $page = 1;

    public $sortBy = '';

    public $sortDirection = 'asc';

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('theme::livewire.table');
    }

    abstract public function query(): \Illuminate\Database\Eloquent\Builder;

    abstract public function columns(): array;

    public function data(): \Illuminate\Pagination\LengthAwarePaginator
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
