@props(['category'])

@php
$color = match ($category) {
    'food', 'petrol' => 'blue',
    'rent', 'grocery' => 'yellow',
    'maintenance', 'misc' => 'orange',
    'salary', => 'green',
    default => 'gray',
};
@endphp

<flux:badge size="sm" color="{{ $color }}">{{ $category }}</flux:badge>
