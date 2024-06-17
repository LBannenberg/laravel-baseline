@props([
    'value'
])

<div class="grow text-end">
    {{ \Carbon\Carbon::make($value)->diffForHumans() }}
</div>

