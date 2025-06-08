@props(['href', 'label', 'active'])

@php
    $linkClasses =
        'menu-dropdown-item group ' . ($active ?? false ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive');
@endphp

<li>
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $linkClasses]) }}>
        {{ $label }}
    </a>
</li>
