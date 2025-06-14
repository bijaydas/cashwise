@props(['for', 'name', 'id', 'value', 'label'])

<label for="{{ $for }}" class="radio-group flex-grow">
    <input name="{{ $name }}" type="radio" id="{{ $id }}" value="{{ $value }}" {{ $attributes }} />
    <span>{{ $label }}</span>
</label>
