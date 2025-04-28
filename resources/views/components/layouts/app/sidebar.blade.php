<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
</head>

<body class="min-h-screen font-sans antialiased bg-base-200">

    {{-- NAVBAR mobile only --}}
    <x-mary-nav sticky class="lg:hidden !bg-[#1B4298] text-white">
        <x-slot:brand>
            <a href="{{ route('dashboard') }}" wire:navigate>
                <img src="{{ asset('assets/images/bmi-banner.jpg') }}" class="h-10" alt="bmi-banner">
            </a>
        </x-slot:brand>
        <x-slot:actions>
            <label for="main-drawer" class="mr-3 lg:hidden">
                <x-mary-icon name="o-bars-3" class="cursor-pointer" />
            </label>
        </x-slot:actions>
    </x-mary-nav>

    {{-- MAIN --}}
    <x-mary-main full-width>
        {{-- SIDEBAR --}}
        <x-slot:sidebar drawer="main-drawer" collapsible class="!bg-[#1B4298] lg:bg-inherit text-white">

            {{-- BRAND --}}
            <a href="{{ route('dashboard') }}" class="mary-hideable">
                <img src="{{ asset('assets/images/bmi-banner.jpg') }}" alt="bmi-banner">
            </a>
            <a href="{{ route('dashboard') }}" class="display-when-collapsed">
                <img src="{{ asset('assets/images/bmi-logo.png') }}" alt="bmi-logo">
            </a>

            {{-- MENU --}}
            <x-mary-menu activeBgColor="bg-[#F26531]" activate-by-route>
                <x-mary-menu-item title="Home" icon="lucide.home" link="{{ route('dashboard') }}" route="dashboard"
                    class="hover:bg-[#F26531]" />
                <x-mary-menu-item title="User Management" icon="lucide.users-2" link="{{ route('um.index') }}"
                    route="um.index" class="hover:bg-[#F26531]" />
                <x-mary-menu-item title="Role Management" icon="lucide.user-cog-2" link="{{ route('rm.index') }}"
                    route="rm.index" class="hover:bg-[#F26531]" />

                <x-mary-menu-sub title="Settings" icon="lucide.cog">
                    <x-mary-menu-item title="Account" icon="lucide.user-circle-2" link="{{ route('settings.profile') }}"
                        route="settings.*" />
                    <x-mary-menu-item title="Theme" icon="o-swatch" @click="$dispatch('mary-toggle-theme')" />
                    <x-mary-theme-toggle darkTheme="business" class="hidden" />
                    <x-mary-menu-item title="Logout" icon="lucide.log-out" link="/logout" />
                </x-mary-menu-sub>

            </x-mary-menu>
        </x-slot:sidebar>
        {{-- The `$slot` goes here --}}
        <x-slot:content>
            {{ $slot }}
        </x-slot:content>
    </x-mary-main>

    {{-- Toast --}}
    <x-mary-toast />
</body>

</html>
