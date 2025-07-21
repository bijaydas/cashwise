@props(['role'])

@php

$color = match ($role) {
    'admin' => 'blue',
    'user' => 'orange',
    default => 'gray',
};

$statusText = 'Not set';

if ($role == 'admin') {
    $statusText = 'admin';
}

if ($role == 'user') {
    $statusText = 'user';
}

@endphp

<flux:badge size="sm" color="{{ $color }}">{{ $statusText }}</flux:badge>
