<div>
    @if(session()->has('success'))
        <x-alert text="{{ session()->get('success') }}" type="success" />
    @endif

    @if($errors->any())
        <div class="flex flex-col space-y-3">
            @foreach($errors->all() as $error)
                <x-alert text="{{ $error }}" type="error" />
            @endforeach
        </div>
    @endif
</div>
