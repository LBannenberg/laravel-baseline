<?php

declare(strict_types=1);

namespace Corrivate\Theme\Livewire;

use Corrivate\Theme\Table\Column;
use Corrivate\Theme\Table\SearchType;
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

    public array $searchBy = [
        // override for specific tables
    ];

    public function render(): View
    {
        return view('theme::livewire.table');
    }

    abstract public function query(): Builder;

    /**
     * @return Column[]
     */
    abstract public function columns(): array;

    public function data(): LengthAwarePaginator
    {
        return $this
            ->searchBy()
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

    protected function searchBy(): Builder
    {
        $query = $this->query();
        foreach ($this->columns() as $column) {
            if ($column->searchType == SearchType::Is && ! empty($this->searchBy[$column->key])) {
                $value = trim($this->searchBy[$column->key]);
                $query->where($column->key, $value);
            }
            if ($column->searchType == SearchType::Like && ! empty($this->searchBy[$column->key])) {
                $value = trim($this->searchBy[$column->key]);
                $query->where($column->key, 'LIKE', "%$value%");
            }
            if ($column->searchType == SearchType::FromDateTo && ! empty($this->searchBy[$column->key]['from'])) {
                $value = trim($this->searchBy[$column->key]['from']);
                $query->where($column->key, '>=', $value);
            }
            if ($column->searchType == SearchType::FromDateTo && ! empty($this->searchBy[$column->key]['to'])) {
                $value = trim($this->searchBy[$column->key]['to']);
                $query->where($column->key, '<=', $value);
            }
            if ($column->searchType == SearchType::FromNumTo && ! empty($this->searchBy[$column->key]['to'])) {
                $value = trim($this->searchBy[$column->key]['to']);
                $query->where($column->key, '<=', $value);
            }
            if ($column->searchType == SearchType::SelectOne && ! empty($this->searchBy[$column->key])) {
                $value = trim($this->searchBy[$column->key]);
                $query->where($column->key, $value);
            }

        }

        return $query;
    }
}
