@props(['href', 'active', 'label'])

@php
    $classes = 'menu-item group ' . ($active ?? false ? 'menu-item-active' : 'menu-item-inactive');
    $iconClasses = ($active ?? false ? 'menu-item-icon-active' : 'menu-item-icon-inactive') . ' size-7';
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
    <div class="{{ $iconClasses }}">
        {{ $slot }}
    </div>
    <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
        {{ $label }}
    </span>
</a>
