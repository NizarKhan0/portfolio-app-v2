<div class="p-6 max-w-2xl">
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-zinc-900 dark:text-zinc-100">{{ __('Profile') }}</h1>
        <p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">{{ __('Manage your portfolio profile information') }}</p>
    </div>

    <form wire:submit="save" class="space-y-6">
        <flux:input wire:model="name" label="{{ __('Name') }}" required />

        <flux:input wire:model="avatar" label="{{ __('Avatar') }}" type="file" accept="image/*" />
        @if ($existingAvatar)
            <div class="flex items-center gap-3">
                <img src="{{ Storage::url($existingAvatar) }}" class="size-16 rounded-full object-cover">
                <span class="text-sm text-zinc-500">{{ $existingAvatar }}</span>
            </div>
        @endif

        <flux:input wire:model="tagline" label="{{ __('Tagline') }}"
            placeholder="Fullstack PHP Developer — Laravel, Livewire, Filament, DevOps" />

        <flux:input wire:model="github_url" label="{{ __('GitHub URL') }}" type="url"
            placeholder="https://github.com/username" />

        <flux:input wire:model="linkedin_url" label="{{ __('LinkedIn URL') }}" type="url"
            placeholder="https://linkedin.com/in/username" />

        <flux:input wire:model="email" label="{{ __('Email') }}" type="email"
            placeholder="hello@example.com" />

        <div class="flex justify-end">
            <flux:button variant="primary" type="submit">{{ __('Save') }}</flux:button>
        </div>
    </form>
</div>
