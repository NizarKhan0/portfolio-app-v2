<div class="p-6">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-2xl font-semibold text-zinc-900 dark:text-zinc-100">{{ __('Projects') }}</h1>
        <flux:button icon="plus" variant="primary" wire:click="create">{{ __('Add Project') }}</flux:button>
    </div>

    <flux:table :paginate="$projects">
        <flux:table.columns>
            <flux:table.column>{{ __('#') }}</flux:table.column>
            <flux:table.column>{{ __('Title') }}</flux:table.column>
            <flux:table.column>{{ __('Image') }}</flux:table.column>
            <flux:table.column>{{ __('Tags') }}</flux:table.column>
            <flux:table.column>{{ __('Color') }}</flux:table.column>
            <flux:table.column align="end">{{ __('Actions') }}</flux:table.column>
        </flux:table.columns>

        <flux:table.rows>
            @foreach ($projects as $project)
                <flux:table.row :key="$project->id">
                    <flux:table.cell class="text-zinc-500">{{ $loop->iteration }}</flux:table.cell>
                    <flux:table.cell class="font-medium">{{ $project->title }}</flux:table.cell>
                    <flux:table.cell>
                        @if ($project->image)
                            <img src="{{ Storage::url($project->image) }}" class="size-10 rounded object-cover">
                        @else
                            <span class="text-xs text-zinc-500">—</span>
                        @endif
                    </flux:table.cell>
                    <flux:table.cell>
                        <div class="flex flex-wrap gap-1">
                            @foreach ($project->tags ?? [] as $tag)
                                <span class="rounded-full bg-zinc-100 dark:bg-zinc-800 px-2 py-0.5 text-xs">{{ $tag }}</span>
                            @endforeach
                        </div>
                    </flux:table.cell>
                    <flux:table.cell>
                        <span class="block size-5 rounded bg-gradient-to-r {{ $project->color }}"></span>
                    </flux:table.cell>
                    <flux:table.cell align="end">
                        <div class="flex justify-end gap-1">
                            <flux:button icon="chevron-up" size="sm" variant="ghost" wire:click="moveUp({{ $project->id }})" :disabled="$loop->first" />
                            <flux:button icon="chevron-down" size="sm" variant="ghost" wire:click="moveDown({{ $project->id }})" :disabled="$loop->last" />
                            <flux:button icon="pencil" size="sm" wire:click="edit({{ $project->id }})" />
                            <flux:button icon="trash" size="sm" variant="danger" wire:click="confirmDelete({{ $project->id }})" />
                        </div>
                    </flux:table.cell>
                </flux:table.row>
            @endforeach
        </flux:table.rows>
    </flux:table>

    <flux:modal wire:model="showModal" class="w-full max-w-lg">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">{{ $projectId ? __('Edit Project') : __('Add Project') }}</flux:heading>
                <flux:subheading>{{ $projectId ? __('Update project details') : __('Create a new project') }}</flux:subheading>
            </div>
            <flux:input wire:model="title" label="{{ __('Title') }}" />
            <flux:textarea wire:model="description" label="{{ __('Description') }}" />
            <flux:input wire:model="image" label="{{ __('Image') }}" type="file" accept="image/*" />
            @if ($existingImage)
                <div class="flex items-center gap-3">
                    <img src="{{ Storage::url($existingImage) }}" class="size-16 rounded-lg object-cover">
                    <span class="text-sm text-zinc-500">{{ $existingImage }}</span>
                </div>
            @endif

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

            @php
                $gradients = [
                    'from-indigo-500 to-purple-500',
                    'from-emerald-500 to-teal-500',
                    'from-orange-500 to-red-500',
                    'from-cyan-500 to-blue-500',
                    'from-pink-500 to-rose-500',
                    'from-yellow-500 to-orange-500',
                    'from-violet-500 to-fuchsia-500',
                    'from-sky-500 to-indigo-500',
                ];
            @endphp
            <flux:field label="{{ __('Gradient Color') }}">
                <div class="flex flex-wrap gap-2">
                    @foreach ($gradients as $g)
                        <button type="button" wire:click="$set('color', '{{ $g }}')"
                            class="size-8 rounded-lg bg-gradient-to-r {{ $g }} border-2 transition-all duration-150 {{ $color === $g ? 'border-white scale-110 ring-2 ring-indigo-500' : 'border-zinc-700 hover:scale-105' }}">
                        </button>
                    @endforeach
                </div>
            </flux:field>

            <flux:input wire:model="demo_url" label="{{ __('Demo URL') }}" type="url" />
            <div class="flex justify-end gap-2">
                <flux:button variant="ghost" wire:click="resetForm">{{ __('Cancel') }}</flux:button>
                <flux:button variant="primary" wire:click="{{ $projectId ? 'update' : 'store' }}">
                    {{ $projectId ? __('Update') : __('Create') }}
                </flux:button>
            </div>
        </div>
    </flux:modal>

    <flux:modal wire:model="confirmingDelete" class="w-full max-w-sm">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">{{ __('Delete Project') }}</flux:heading>
                <flux:subheading>{{ __('Are you sure?') }}</flux:subheading>
            </div>
            <div class="flex justify-end gap-2">
                <flux:button variant="ghost" wire:click="$set('confirmingDelete', false)">{{ __('Cancel') }}</flux:button>
                <flux:button variant="danger" wire:click="delete">{{ __('Delete') }}</flux:button>
            </div>
        </div>
    </flux:modal>
</div>
