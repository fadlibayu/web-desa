@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-[#41431B]']) }}>
    {{ $value ?? $slot }}
</label>
