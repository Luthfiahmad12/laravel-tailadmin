@props(['label'])

@php
    $iconClasses = $active ?? false ? 'menu-item-icon-active' : 'menu-item-icon-inactive';
@endphp

<li x-data="{
    open: false,
    hasActiveSubLink: false,
    init() {
        // Cek jika ada sub-link yang aktif saat inisialisasi Alpine.js
        // Ini akan bergantung pada data yang dilewatkan dari sub-link melalui slot
        this.hasActiveSubLink = this.$el.querySelector('.menu-dropdown-item-active') !== null;
        if (this.hasActiveSubLink) {
            this.open = true; // Buka dropdown jika ada sub-link yang aktif
            this.$dispatch('set-selected', '{{ $label }}'); // Beri tahu parent bahwa menu ini harus dipilih
        }
        // Atur status 'selected' awal jika perlu, atau ini akan dihandle oleh click event
        if ('{{ $selected ?? '' }}' === '{{ $label }}') {
            this.open = true;
        }
    }
}">
    <a href="#" @click.prevent="open = !open; selected = (open ? '{{ $label }}' : '');"
        class="menu-item group"
        :class="{
            ' menu-item-active': (open || hasActiveSubLink),
            ' menu-item-inactive': !(open || hasActiveSubLink)
        }">

        {{-- Slot for icon --}}
        <div class="{{ $iconClasses }}">
            {{ $slot }}
        </div>

        <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
            {{ $label }}
        </span>

        {{-- Icon panah --}}
        <div class="menu-item-arrow ml-auto" :class="[open ? 'rotate-180' : '', sidebarToggle ? 'lg:hidden' : '']">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4.79175 7.39584L10.0001 12.6042L15.2084 7.39585" stroke="currentColor" stroke-width="1.5"
                    stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </div>
    </a>

    <div class="overflow-hidden transform transition-all duration-300 ease-in-out" x-ref="dropdownPanel" x-show="open"
        x-collapse.duration.300ms>
        <ul :class="sidebarToggle ? 'lg:hidden' : 'flex'" class="flex flex-col gap-1 mt-2 menu-dropdown pl-9">
            {{ $dropdownItems }}
        </ul>
    </div>
</li>
