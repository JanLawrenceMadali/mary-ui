<div class="flex items-start max-md:flex-col">
    <div class="me-10 w-full pb-4 md:w-[220px]">
        <x-mary-menu activeBgColor="bg-zinc-500 text-white" activate-by-route>
            <x-mary-menu-item title="Profile" icon="lucide.user-circle-2" link="{{ route('settings.profile') }}"
                route="settings.profile" class="hover:bg-zinc-500 hover:text-white" />
            <x-mary-menu-item title="Password" icon="lucide.lock" link="{{ route('settings.password') }}"
                route="settings.password" class="hover:bg-zinc-500 hover:text-white" />
        </x-mary-menu>
    </div>

    <flux:separator class="md:hidden" />

    <div class="self-stretch flex-1 max-md:pt-6">
        <flux:heading>{{ $heading ?? '' }}</flux:heading>
        <flux:subheading>{{ $subheading ?? '' }}</flux:subheading>

        <div class="w-full max-w-lg mt-5">
            {{ $slot }}
        </div>
    </div>
</div>