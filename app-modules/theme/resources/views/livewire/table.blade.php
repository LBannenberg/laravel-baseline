@php use Corrivate\Theme\Table\SearchType; @endphp
<div>
    <div class="overflow-x-auto shadow-md rounded-lg">
        <table class="table-fixed w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                @foreach($this->columns() as $column)
                    <th wire:click="sort('{{ $column->key }}')" class="{{$column->classes}}">
                        <div class="py-3 px-6 cursor-pointer">
                            {{ $column->label }}
                            @if($sortBy === $column->key)
                                @if ($sortDirection === 'asc')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                         fill="currentColor">
                                        <path fill-rule="evenodd"
                                              d="M14.707 10.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 12.586V5a1 1 0 012 0v7.586l2.293-2.293a1 1 0 011.414 0z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                         fill="currentColor">
                                        <path fill-rule="evenodd"
                                              d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                @endif
                            @endif
                        </div>
                    </th>

                @endforeach
            </tr>
            <tr>
                @foreach($this->columns() as $column)
                    <th>
                        <div class="py-3 px-6 flex items-center">
                            @if($column->searchType == SearchType::Is || $column->searchType == SearchType::Like)
                                <input type="text" wire:model.live.debounce.250ms="searchBy.{{$column->key}}" class="rounded-lg">
                            @elseif($column->searchType == SearchType::FromDateTo)
                                <div class="grow flex flex-col">
                                    <div class="flex flex-row items-center gap-2"><label class="grow text-end">From</label><input class="flex-none rounded-lg" type="date" wire:model.live.debounce.250ms="searchBy.{{$column->key}}.from"></div>

                                    <div class="flex flex-row items-center gap-2"><label class="grow text-end">To</label><input class="flex-none rounded-lg" type="date" wire:model.live.debounce.250ms="searchBy.{{$column->key}}.to"></div>
                                </div>
                            @elseif($column->searchType == SearchType::FromNumTo)
                                <div class="flex flex-col">
                                    <div class="flex flex-row items-center gap-2"><label class="grow text-end">From</label><input class="rounded-lg w-32" type="number" wire:model.live.debounce.250ms="searchBy.{{$column->key}}.from"></div>

                                    <div class="flex flex-row items-center gap-2"><label class="grow text-end">To</label><input class="rounded-lg w-32" type="number" wire:model.live.debounce.250ms="searchBy.{{$column->key}}.to"></div>
                                </div>
                            @elseif($column->searchType == SearchType::SelectOne)
                                <select wire:model.change="searchBy.{{$column->key}}" class="rounded-lg">
                                    @foreach($column->options as $option)
                                        <option value="{{$option->value}}" class="{{$option->class}}">{{$option->label}}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>
                    </th>
                @endforeach
            </tr>
            </thead>
            <tbody>
            @foreach($this->data() as $row)
                <tr class="bg-white border-b hover:bg-gray-50">
                    @foreach($this->columns() as $column)
                        <td>
                            <div class="py-3 px-6 flex items-center cursor-pointer">
                                <x-dynamic-component
                                    :component="$column->component"
                                    :value="$row[$column->key]"
                                >
                                </x-dynamic-component>
                            </div>
                        </td>
                    @endforeach
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{ $this->data()->links() }}
</div>

