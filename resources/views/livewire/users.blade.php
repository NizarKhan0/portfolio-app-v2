<div class="p-6">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-2xl font-semibold text-zinc-900 dark:text-zinc-100">{{ __('Users') }}</h1>
        <flux:button icon="plus" variant="primary" wire:click="create">{{ __('Add User') }}</flux:button>
    </div>

    <div class="mb-4">
        <flux:input wire:model.live="search" placeholder="{{ __('Search users...') }}" icon="magnifying-glass" />
    </div>

    <flux:table :paginate="$this->users">
        <flux:table.columns>
            <flux:table.column
                sortable
                :sorted="$sortBy === 'name'"
                :direction="$sortDirection"
                wire:click="sort('name')"
            >
                {{ __('Name') }}
            </flux:table.column>
            <flux:table.column
                sortable
                :sorted="$sortBy === 'email'"
                :direction="$sortDirection"
                wire:click="sort('email')"
            >
                {{ __('Email') }}
            </flux:table.column>
            <flux:table.column
                sortable
                :sorted="$sortBy === 'created_at'"
                :direction="$sortDirection"
                wire:click="sort('created_at')"
            >
                {{ __('Created At') }}
            </flux:table.column>
            <flux:table.column align="end">{{ __('Actions') }}</flux:table.column>
        </flux:table.columns>

        <flux:table.rows>
            @foreach ($this->users as $user)
                <flux:table.row :key="$user->id">
                    <flux:table.cell>{{ $user->name }}</flux:table.cell>
                    <flux:table.cell>{{ $user->email }}</flux:table.cell>
                    <flux:table.cell class="whitespace-nowrap">{{ $user->created_at->format('d M Y') }}</flux:table.cell>
                    <flux:table.cell align="end">
                        <div class="flex justify-end gap-2">
                            <flux:button icon="pencil" size="sm" wire:click="edit({{ $user->id }})" />
                            <flux:button icon="trash" size="sm" variant="danger"
                                wire:click="confirmDelete({{ $user->id }})" />
                        </div>
                    </flux:table.cell>
                </flux:table.row>
            @endforeach
        </flux:table.rows>
    </flux:table>

    <flux:modal wire:model="showModal" class="w-full max-w-md">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">{{ $userId ? __('Edit User') : __('Add User') }}</flux:heading>
                <flux:subheading>{{ $userId ? __('Update user details') : __('Create a new user') }}</flux:subheading>
            </div>

            <flux:input wire:model="name" label="{{ __('Name') }}" placeholder="{{ __('John Doe') }}" />
            <flux:input wire:model="email" label="{{ __('Email') }}" type="email"
                placeholder="{{ __('john@example.com') }}" />
            <flux:input wire:model="password" label="{{ __('Password') }}" type="password"
                placeholder="{{ __('Min 8 characters') }}" />

            <div class="flex justify-end gap-2">
                <flux:button variant="ghost" wire:click="resetForm">{{ __('Cancel') }}</flux:button>
                <flux:button variant="primary" wire:click="{{ $userId ? 'update' : 'store' }}">
                    {{ $userId ? __('Update') : __('Create') }}
                </flux:button>
            </div>
        </div>
    </flux:modal>

    <flux:modal wire:model="confirmingDelete" class="w-full max-w-sm">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">{{ __('Delete User') }}</flux:heading>
                <flux:subheading>{{ __('Are you sure you want to delete this user?') }}</flux:subheading>
            </div>

            <div class="flex justify-end gap-2">
                <flux:button variant="ghost" wire:click="$set('confirmingDelete', false)">{{ __('Cancel') }}
                </flux:button>
                <flux:button variant="danger" wire:click="delete">{{ __('Delete') }}</flux:button>
            </div>
        </div>
    </flux:modal>
</div>
