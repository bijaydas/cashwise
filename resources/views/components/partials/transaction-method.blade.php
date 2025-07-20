@props(['method'])

@php
$color = match ($method) {
    'cash', 'upi' => 'orange',
    'credit_card', 'debit_card' => 'red',
    default => 'gray',
};
@endphp

<flux:badge size="sm" color="{{ $color }}">{{ $method }}</flux:badge>
