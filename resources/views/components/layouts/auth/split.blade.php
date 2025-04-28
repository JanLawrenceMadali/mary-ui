<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
</head>

<body class="min-h-screen antialiased">
    <div
        class="relative grid h-dvh flex-col items-center justify-center px-8 sm:px-0 lg:max-w-none lg:grid-cols-2 lg:px-0">
        <div class="relative hidden h-full flex-col p-10 text-white lg:flex">
            <x-carousel />

            {{-- @php
            [$message, $author] = str(Illuminate\Foundation\Inspiring::quotes()->random())->explode('-');
            @endphp

            <div class="absolute bottom-20 left-20">
                <blockquote class="space-y-2">
                    <x-mary-header size="text-lg" class="!mb-5" :title="trim($message)" />
                    <footer>
                        <x-mary-header size="text-md" class="!mb-0" :title="trim($author)" />
                    </footer>
                </blockquote>
            </div> --}}
        </div>
        <div class="w-full lg:p-8">
            <div class="mx-auto flex w-full flex-col justify-center sm:w-[350px]">
                <a href="{{ route('home') }}" class="z-20 flex flex-col items-center gap-2 font-medium lg:hidden"
                    wire:navigate>
                    <x-app-logo-icon class="" />

                </a>
                {{ $slot }}
            </div>
        </div>
    </div>
    @fluxScripts
</body>

</html>
