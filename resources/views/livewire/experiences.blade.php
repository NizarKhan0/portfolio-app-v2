<div class="p-6">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-2xl font-semibold text-zinc-900 dark:text-zinc-100">{{ __('Experiences') }}</h1>
        <flux:button icon="plus" variant="primary" wire:click="create">{{ __('Add Experience') }}</flux:button>
    </div>

    <flux:table :paginate="$experiences">
        <flux:table.columns>
            <flux:table.column>{{ __('#') }}</flux:table.column>
            <flux:table.column>{{ __('Role') }}</flux:table.column>
            <flux:table.column>{{ __('Company') }}</flux:table.column>
            <flux:table.column>{{ __('Period') }}</flux:table.column>
            <flux:table.column align="end">{{ __('Actions') }}</flux:table.column>
        </flux:table.columns>

        <flux:table.rows>
            @foreach ($experiences as $exp)
                <flux:table.row :key="$exp->id">
                    <flux:table.cell class="text-zinc-500">{{ $loop->iteration }}</flux:table.cell>
                    <flux:table.cell class="font-medium">{{ $exp->role }}</flux:table.cell>
                    <flux:table.cell>{{ $exp->company }}</flux:table.cell>
                    <flux:table.cell>{{ $exp->period }}</flux:table.cell>
                    <flux:table.cell align="end">
                        <div class="flex justify-end gap-1">
                            <flux:button icon="chevron-up" size="sm" variant="ghost" wire:click="moveUp({{ $exp->id }})" :disabled="$loop->first" />
                            <flux:button icon="chevron-down" size="sm" variant="ghost" wire:click="moveDown({{ $exp->id }})" :disabled="$loop->last" />
                            <flux:button icon="pencil" size="sm" wire:click="edit({{ $exp->id }})" />
                            <flux:button icon="trash" size="sm" variant="danger" wire:click="confirmDelete({{ $exp->id }})" />
                        </div>
                    </flux:table.cell>
                </flux:table.row>
            @endforeach
        </flux:table.rows>
    </flux:table>

    <flux:modal wire:model="showModal" class="w-full max-w-lg">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">{{ $experienceId ? __('Edit Experience') : __('Add Experience') }}</flux:heading>
                <flux:subheading>{{ $experienceId ? __('Update experience details') : __('Create a new experience') }}</flux:subheading>
            </div>
            <flux:input wire:model="role" label="{{ __('Role') }}" />
            <flux:input wire:model="company" label="{{ __('Company') }}" />
            <flux:input wire:model="period" label="{{ __('Period') }}" placeholder="e.g. Jan 2024 - Present" />
            <flux:textarea wire:model="description" label="{{ __('Description') }}" />

            <flux:field label="{{ __('Tags') }}">
                <div class="flex flex-wrap gap-2 mb-3">
                    @foreach ($allSkills as $skill)
                        <label class="flex items-center gap-2 rounded-lg border border-zinc-700 px-3 py-2 text-sm cursor-pointer transition-all hover:border-indigo-500 has-[:checked]:border-indigo-500 has-[:checked]:bg-indigo-500/10">
                            <input type="checkbox" value="{{ $skill }}" wire:model="tags" class="size-4 rounded border-zinc-600 text-indigo-600 focus:ring-indigo-500">
                            {{ $skill }}
                        </label>
                    @endforeach
                </div>
                <flux:input wire:model="customTags" placeholder="Or type custom tags, comma separated" />
            </flux:field>

            <div class="flex justify-end gap-2">
                <flux:button variant="ghost" wire:click="resetForm">{{ __('Cancel') }}</flux:button>
                <flux:button variant="primary" wire:click="{{ $experienceId ? 'update' : 'store' }}">
                    {{ $experienceId ? __('Update') : __('Create') }}
                </flux:button>
            </div>
        </div>
    </flux:modal>

    <flux:modal wire:model="confirmingDelete" class="w-full max-w-sm">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">{{ __('Delete Experience') }}</flux:heading>
                <flux:subheading>{{ __('Are you sure?') }}</flux:subheading>
            </div>
            <div class="flex justify-end gap-2">
                <flux:button variant="ghost" wire:click="$set('confirmingDelete', false)">{{ __('Cancel') }}</flux:button>
                <flux:button variant="danger" wire:click="delete">{{ __('Delete') }}</flux:button>
            </div>
        </div>
    </flux:modal>
</div>
