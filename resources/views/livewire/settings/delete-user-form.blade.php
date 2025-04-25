<?php

use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;
use Livewire\Volt\Component;

new class extends Component {
    public string $password = '';
    public bool $deleteModal = false;
    /**
     * Delete the currently authenticated user.
     */
    public function deleteUser(Logout $logout): void
    {
        $this->validate([
            'password' => ['required', 'string', 'current_password'],
        ]);

        tap(Auth::user(), $logout(...))->delete();

        $this->redirect('/', navigate: true);
    }
}; ?>

<section class="mt-10 space-y-6">
    <x-mary-header title="Delete account" size="text-sm" class="!mb-5" subtitle="Delete your account and all of its resources" />

    <x-mary-modal wire:model="deleteModal" title="Are you sure you want to delete your account?"
        subtitle="Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.">
        <x-mary-form wire:submit="deleteUser" no-separator>
            <x-mary-password label="Password" wire:model="password" right />

            {{-- Notice we are using now the `actions` slot from `x-form`, not from modal --}}
            <x-slot:actions>
                <x-mary-button label="Cancel" @click="$wire.deleteModal = false" />
                <x-mary-button label="Confirm" type="submit" spinner="deleteUser"
                    class="text-white bg-red-500 hover:bg-red-600" />
            </x-slot:actions>
        </x-mary-form>
    </x-mary-modal>

    <x-mary-button label="Delete account" @click="$wire.deleteModal = true"
        class="text-white bg-red-500 hover:bg-red-600" />
</section>