@props(['id', 'label' => '', 'placeholder' => '', 'type' => 'text', 'name' => '', 'value' => ''])

<label for="{{ $id }}" class="form-control flex-1">
    <span class="label">{{ $label }}</span>
    <input
        id="{{ $id }}"
        type="{{ $type }}"
        placeholder="{{ $placeholder }}"
        name="{{ $name }}"
        value="{{ $value }}"
        class="form-input @error($name) error-input @enderror"
        {{ $attributes }}
    />
    @error($name)
        <span class="error-message">{{ $message }}</span>
    @enderror
</label>
