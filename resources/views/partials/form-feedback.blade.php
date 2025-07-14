<div class="mt-2">
    @if($errors->any())
        @foreach($errors->all() as $error)
            <flux:callout variant="danger" icon="x-circle" heading="{{ $error }}" class="mt-2" />
        @endforeach
    @endif

    @if(session()->has('success'))
        <flux:callout variant="success" icon="check-circle" heading="{{ session('success') }}" />
    @endif
</div>