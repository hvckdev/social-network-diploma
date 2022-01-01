@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'sidebar-link sidebar-link-with-icon active'
                : 'sidebar-link sidebar-link-with-icon';
@endphp


<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

