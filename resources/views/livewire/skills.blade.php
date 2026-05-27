<div class="p-6">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-2xl font-semibold text-zinc-900 dark:text-zinc-100">{{ __('Skills') }}</h1>
        <flux:button icon="plus" variant="primary" wire:click="create">{{ __('Add Skill') }}</flux:button>
    </div>

    <flux:table :paginate="$skills">
        <flux:table.columns>
            <flux:table.column>{{ __('#') }}</flux:table.column>
            <flux:table.column>{{ __('Name') }}</flux:table.column>
            <flux:table.column align="end">{{ __('Actions') }}</flux:table.column>
        </flux:table.columns>

        <flux:table.rows>
            @foreach ($skills as $skill)
                <flux:table.row :key="$skill->id">
                    <flux:table.cell class="text-zinc-500">{{ $loop->iteration }}</flux:table.cell>
                    <flux:table.cell class="font-medium">{{ $skill->name }}</flux:table.cell>
                    <flux:table.cell align="end">
                        <div class="flex justify-end gap-2">
                            <flux:button icon="pencil" size="sm" wire:click="edit({{ $skill->id }})" />
                            <flux:button icon="trash" size="sm" variant="danger" wire:click="confirmDelete({{ $skill->id }})" />
                        </div>
                    </flux:table.cell>
                </flux:table.row>
            @endforeach
        </flux:table.rows>
    </flux:table>

    <flux:modal wire:model="showModal" class="w-full max-w-md">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">{{ $skillId ? __('Edit Skill') : __('Add Skill') }}</flux:heading>
                <flux:subheading>{{ $skillId ? __('Update skill name') : __('Create a new skill') }}</flux:subheading>
            </div>
            <flux:input wire:model="name" label="{{ __('Name') }}" />
            <div class="flex justify-end gap-2">
                <flux:button variant="ghost" wire:click="resetForm">{{ __('Cancel') }}</flux:button>
                <flux:button variant="primary" wire:click="{{ $skillId ? 'update' : 'store' }}">
                    {{ $skillId ? __('Update') : __('Create') }}
                </flux:button>
            </div>
        </div>
    </flux:modal>

    <flux:modal wire:model="confirmingDelete" class="w-full max-w-sm">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">{{ __('Delete Skill') }}</flux:heading>
                <flux:subheading>{{ __('Are you sure?') }}</flux:subheading>
            </div>
            <div class="flex justify-end gap-2">
                <flux:button variant="ghost" wire:click="$set('confirmingDelete', false)">{{ __('Cancel') }}</flux:button>
                <flux:button variant="danger" wire:click="delete">{{ __('Delete') }}</flux:button>
            </div>
        </div>
    </flux:modal>
</div>
