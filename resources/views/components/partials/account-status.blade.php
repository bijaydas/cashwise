@props(['status'])

@php

$color = match ($status) {
    'inactive' => 'red',
    default => 'green',
};

$statusText = 'Inactive';

if ($status === 'active') {
    $statusText = 'Active';
}

@endphp

<flux:badge size="sm" color="{{ $color }}">{{ $statusText }}</flux:badge>
