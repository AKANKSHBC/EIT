@props(['active'])

@php
$classes = ($active ?? false)
            ? 'mx-2 py-2 px-8 bg-indigo-100 text-indigo-700 rounded-full focus:outline-none focus:ring-2  focus:bg-indigo-50 focus:ring-indigo-800'
            : 'mx-2 py-2 px-8 text-gray-700 rounded-full hover:bg-indigo-50 focus:outline-none focus:ring-2 focus:bg-indigo-50 focus:ring-indigo-800';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>