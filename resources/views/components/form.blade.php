<div class="p-6 bg-white border-b border-gray-200">
    <form method="POST" action="{{ $action }}" enctype="multipart/form-data">
        @csrf
        @method($method)

        @foreach ($fields as $field)
            <div class="mb-4">
                <label for="{{ $field['name'] }}" class="block text-gray-600 font-bold">{{ $field['label'] }}</label>
                <input type="{{ $field['type'] }}" name="{{ $field['name'] }}" id="{{ $field['name'] }}" value="{{ old($field['name'], $field['value']) }}" class="form-input">
                @error($field['name'])
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
        @endforeach

        <div class="mt-6">
            <button type="submit" class="btn btn-primary">{{ $submitButtonLabel }}</button>
            <a href="{{ $cancelUrl }}" class="btn btn-secondary">{{ $cancelButtonLabel }}</a>
        </div>
    </form>
</div>
