@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 text-3xl font-semibold leading-5 text-[#cce4f0] focus:outline-none transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 text-3xl font-semibold leading-5 text-[#cce4f0] hover:text-[#cce4f0] focus:outline-none transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->class([$classes]) }}>
    {{ $slot }}
</a>
