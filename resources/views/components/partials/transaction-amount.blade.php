@props(['amount', 'type'])

@php

$color = match ($type) {
    'debit' => 'red',
    default => 'green',
};

$text = '';

if ($type === 'debit') {
    $label = '- ' . $amount;
} else {
    $label = '+ ' . $amount;
}

@endphp

<flux:badge size="sm" color="{{ $color }}">{{ $label }}</flux:badge>
