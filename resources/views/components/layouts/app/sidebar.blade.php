<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
</head>

<body class="min-h-screen font-sans antialiased bg-base-200">

    {{-- NAVBAR mobile only --}}
    <x-mary-nav sticky class="lg:hidden !bg-[#1B4298] text-white">
        <x-slot:brand>
            <img src="{{ asset('assets/images/bmi-banner.jpg') }}" class="w-70" alt="bmi-banner">
        </x-slot:brand>
        <x-slot:actions>
            <label for="main-drawer" class="lg:hidden mr-3">
                <x-mary-icon name="o-bars-3" class="cursor-pointer" />
            </label>
        </x-slot:actions>
    </x-mary-nav>

    {{-- MAIN --}}
    <x-mary-main full-width>
        {{-- SIDEBAR --}}
        <x-slot:sidebar drawer="main-drawer" collapsible class="!bg-[#1B4298] lg:bg-inherit text-white">

            {{-- BRAND --}}

            <img src="{{ asset('assets/images/bmi-banner.jpg') }}" class="w-full mary-hideable" alt="bmi-benner">
            <img src="{{ asset('assets/images/bmi-logo.png') }}" class="h-15 display-when-collapsed" alt="bmi-logo">

            {{-- MENU --}}
            <x-mary-menu activeBgColor="bg-[#F26531]" title="" activate-by-route>
                <x-mary-menu-item title="Home" icon="lucide.home" link="{{ route('dashboard') }}" route="dashboard" class="hover:bg-[#F26531]" />
                <x-mary-menu-item title="User Management" icon="lucide.users-2" link="###" class="hover:bg-[#F26531]" />
                <x-mary-menu-item title="Role Management" icon="lucide.user-cog-2" link="###" class="hover:bg-[#F26531]" />
                <x-mary-menu-item title="Settings" icon="lucide.cog" link="{{ route('settings.profile') }}" route="settings.profile" class="hover:bg-[#F26531]" />
            </x-mary-menu>
        </x-slot:sidebar>
        hello
        {{-- The `$slot` goes here --}}
        <x-slot:content>
            {{ $slot }}
        </x-slot:content>
    </x-mary-main>

    {{-- Toast --}}
    <x-mary-toast />
</body>

</html>