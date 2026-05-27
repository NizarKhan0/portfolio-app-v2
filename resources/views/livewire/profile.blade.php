<div class="p-4 sm:p-6 max-w-2xl">
    <div class="mb-5 sm:mb-6">
        <h1 class="text-xl sm:text-2xl font-semibold text-zinc-900 dark:text-zinc-100">{{ __('Profile') }}</h1>
        <p class="mt-1 text-xs sm:text-sm text-zinc-500 dark:text-zinc-400">{{ __('Manage your portfolio profile information') }}</p>
    </div>

    <form wire:submit="save" class="space-y-4 sm:space-y-6">
        <flux:input wire:model="name" label="{{ __('Name') }}" required />

        <flux:input wire:model="avatar" label="{{ __('Avatar') }}" type="file" accept="image/*" />
        @if ($existingAvatar)
            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-2 sm:gap-3">
                <img src="{{ Storage::url($existingAvatar) }}" class="size-12 sm:size-16 rounded-full object-cover shrink-0">
                <span class="text-xs sm:text-sm text-zinc-500 break-all">{{ $existingAvatar }}</span>
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

        <div class="flex flex-col sm:flex-row justify-end">
            <flux:button variant="primary" type="submit" class="w-full sm:w-auto">{{ __('Save') }}</flux:button>
        </div>
    </form>
</div>
