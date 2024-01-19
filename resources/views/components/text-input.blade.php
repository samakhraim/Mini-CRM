<!-- resources/views/components/text-input.blade.php -->

@props(['name', 'label', 'type', 'value', 'required' => false])

<div class="mb-4">
    <label for="{{ $name }}" class="block text-gray-600 font-bold">{{ $label }}</label>
    <input
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        value="{{ $value }}"
        class="form-input"
        @if($required) required @endif
    >
    @error($name)
        <span class="text-red-500">{{ $message }}</span>
    @enderror
</div>
