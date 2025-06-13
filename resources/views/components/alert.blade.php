@props(['text', 'type' => 'error'])

<div @class([
    'alert',
    'alert-success' => $type === 'success',
    'alert-error' => $type === 'error',
])>
    <span class="w-8">
        @if($type === 'error')
            <x-heroicon-o-exclamation-circle />
        @endif
        @if($type === 'success')
            <x-heroicon-o-check-circle />
        @endif
    </span>

    <span>{{ $text }}</span>
</div>
