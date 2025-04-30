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
            <x-mary-menu activeBgColor="bg-[#F26531]" title="" activate-by-route>

                {{-- User --}}
                @if($user = auth()->user())
                <x-mary-menu-separator />

                <x-mary-list-item :item="$user" no-separator no-hover class="-mx-2 !-my-2 rounded">
                    <x-slot:avatar>
                        <a href="{{ route('settings.profile') }}" wire:navigate>
                            <x-mary-avatar :placeholder="$user->initials()" class="!w-10" />
                        </a>
                    </x-slot:avatar>
                    <x-slot:value>
                        <a href="{{ route('settings.profile') }}" wire:navigate>
                            {{ $user->name }}
                        </a>
                    </x-slot:value>
                    <x-slot:sub-value>
                        <span title="{{ $user->email }}" class="text-zinc-200 select-all">{{ $user->email }}</span>
                    </x-slot:sub-value>
                    <x-slot:actions>
                        <x-mary-button class="btn-square btn-ghost btn-xs" tooltip-left="Dark mode">
                            <x-mary-theme-toggle darkTheme="business" />
                        </x-mary-button>
                    </x-slot:actions>
                </x-mary-list-item>

                <x-mary-menu-separator />
                @endif

                <x-mary-menu-item title="Home" icon="lucide.home" link="{{ route('dashboard') }}" route="dashboard"
                    class="hover:bg-[#F26531]" />
                <x-mary-menu-item title="User Management" icon="lucide.users-2" link="{{ route('um.index') }}"
                    route="um.index" class="hover:bg-[#F26531]" />
                <x-mary-menu-item title="Role Management" icon="lucide.user-cog-2" link="{{ route('rm.index') }}"
                    route="rm.index" class="hover:bg-[#F26531]" />
                <x-mary-menu-separator />
                <x-mary-menu-item title="Log out" icon="lucide.log-out" link="/logout" class="hover:bg-[#F26531]" />
            </x-mary-menu>
        </x-slot:sidebar>

        <x-slot:content>
            {{ $slot }}
        </x-slot:content>
    </x-mary-main>

    {{-- Toast --}}
    <x-mary-toast />
</body>

</html>
