@props(['type'])

@php
$color = match ($type) {
    'credit', => 'green',
    default => 'red',
};
@endphp

<flux:badge size="sm" color="{{ $color }}">{{ $type }}</flux:badge>
