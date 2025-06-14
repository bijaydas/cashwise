@props(['label', 'name', 'data' => [], 'initialOption' => 'Not selected', 'containerClass' => ''])

<div class="form-control {{ $containerClass }}">
    <span class="label">{{ $label }}</span>

    <select class="form-input cursor-pointer @error($name) error-input @enderror" {{ $attributes }}>
        <option>{{ $initialOption }}</option>

        @foreach ($data as $item)
            <option value="{{ $item }}">{{ $item }}</option>
        @endforeach
    </select>

    @error($name)
        <span class="error-message">{{ $message }}</span>
    @enderror
</div>
