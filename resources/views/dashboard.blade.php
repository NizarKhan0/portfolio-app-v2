<x-layouts::app :title="__('Dashboard')">
    <div class="p-6">
        <div class="mb-8">
            <h1 class="text-2xl font-semibold text-zinc-900 dark:text-zinc-100">{{ __('Dashboard') }}</h1>
            <p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">{{ __('Overview of your portfolio') }}</p>
        </div>

        @php
            $projectCount = \App\Models\Project::count();
            $experienceCount = \App\Models\Experience::count();
            $skillCount = \App\Models\Skill::count();
            $profile = \App\Models\Profile::first();
        @endphp

        {{-- Stats --}}
        <div class="grid gap-4 md:grid-cols-4 mb-8">
            <div class="rounded-xl border border-zinc-200 dark:border-zinc-700 bg-white dark:bg-zinc-900 p-5">
                <div class="flex items-center gap-3">
                    <div class="flex size-10 items-center justify-center rounded-lg bg-indigo-100 dark:bg-indigo-500/10">
                        <x-flux::icon.folder class="size-5 text-indigo-600 dark:text-indigo-400" />
                    </div>
                    <div>
                        <p class="text-sm text-zinc-500 dark:text-zinc-400">{{ __('Projects') }}</p>
                        <p class="text-2xl font-bold text-zinc-900 dark:text-zinc-100">{{ $projectCount }}</p>
                    </div>
                </div>
            </div>

            <div class="rounded-xl border border-zinc-200 dark:border-zinc-700 bg-white dark:bg-zinc-900 p-5">
                <div class="flex items-center gap-3">
                    <div class="flex size-10 items-center justify-center rounded-lg bg-emerald-100 dark:bg-emerald-500/10">
                        <x-flux::icon.briefcase class="size-5 text-emerald-600 dark:text-emerald-400" />
                    </div>
                    <div>
                        <p class="text-sm text-zinc-500 dark:text-zinc-400">{{ __('Experiences') }}</p>
                        <p class="text-2xl font-bold text-zinc-900 dark:text-zinc-100">{{ $experienceCount }}</p>
                    </div>
                </div>
            </div>

            <div class="rounded-xl border border-zinc-200 dark:border-zinc-700 bg-white dark:bg-zinc-900 p-5">
                <div class="flex items-center gap-3">
                    <div class="flex size-10 items-center justify-center rounded-lg bg-amber-100 dark:bg-amber-500/10">
                        <x-flux::icon.light-bulb class="size-5 text-amber-600 dark:text-amber-400" />
                    </div>
                    <div>
                        <p class="text-sm text-zinc-500 dark:text-zinc-400">{{ __('Skills') }}</p>
                        <p class="text-2xl font-bold text-zinc-900 dark:text-zinc-100">{{ $skillCount }}</p>
                    </div>
                </div>
            </div>

            <div class="rounded-xl border border-zinc-200 dark:border-zinc-700 bg-white dark:bg-zinc-900 p-5">
                <div class="flex items-center gap-3">
                    <div class="flex size-10 items-center justify-center rounded-lg bg-pink-100 dark:bg-pink-500/10">
                        <x-flux::icon.user-circle class="size-5 text-pink-600 dark:text-pink-400" />
                    </div>
                    <div>
                        <p class="text-sm text-zinc-500 dark:text-zinc-400">{{ __('Profile') }}</p>
                        <p class="text-base font-semibold text-zinc-900 dark:text-zinc-100 truncate">{{ $profile?->name ?? '—' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid gap-6 md:grid-cols-2">
            {{-- Recent Projects --}}
            <div class="rounded-xl border border-zinc-200 dark:border-zinc-700 bg-white dark:bg-zinc-900 p-5">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-sm font-semibold text-zinc-900 dark:text-zinc-100">{{ __('Recent Projects') }}</h2>
                    <a href="{{ route('projects.index') }}" wire:navigate class="text-xs text-indigo-500 hover:text-indigo-400 transition">{{ __('View all') }} →</a>
                </div>
                @php $recentProjects = \App\Models\Project::latest()->take(5)->get(); @endphp
                @if ($recentProjects->isNotEmpty())
                    <div class="space-y-3">
                        @foreach ($recentProjects as $project)
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3 min-w-0">
                                    <span class="block size-2 shrink-0 rounded-full bg-gradient-to-r {{ $project->color }}"></span>
                                    <span class="text-sm text-zinc-700 dark:text-zinc-300 truncate">{{ $project->title }}</span>
                                </div>
                                <span class="text-xs text-zinc-500 shrink-0">{{ $project->created_at->diffForHumans() }}</span>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-sm text-zinc-500">{{ __('No projects yet.') }}</p>
                @endif
            </div>

            {{-- Recent Experiences --}}
            <div class="rounded-xl border border-zinc-200 dark:border-zinc-700 bg-white dark:bg-zinc-900 p-5">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-sm font-semibold text-zinc-900 dark:text-zinc-100">{{ __('Recent Experiences') }}</h2>
                    <a href="{{ route('experiences.index') }}" wire:navigate class="text-xs text-indigo-500 hover:text-indigo-400 transition">{{ __('View all') }} →</a>
                </div>
                @php $recentExperiences = \App\Models\Experience::latest()->take(5)->get(); @endphp
                @if ($recentExperiences->isNotEmpty())
                    <div class="space-y-3">
                        @foreach ($recentExperiences as $exp)
                            <div class="flex items-center justify-between">
                                <div class="min-w-0">
                                    <p class="text-sm text-zinc-700 dark:text-zinc-300 truncate">{{ $exp->role }}</p>
                                    <p class="text-xs text-zinc-500 truncate">{{ $exp->company }}</p>
                                </div>
                                <span class="text-xs text-zinc-500 shrink-0 ml-3">{{ $exp->period }}</span>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-sm text-zinc-500">{{ __('No experiences yet.') }}</p>
                @endif
            </div>
        </div>

        {{-- Skills Cloud --}}
        <div class="mt-6 rounded-xl border border-zinc-200 dark:border-zinc-700 bg-white dark:bg-zinc-900 p-5">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-sm font-semibold text-zinc-900 dark:text-zinc-100">{{ __('Skills') }}</h2>
                <a href="{{ route('skills.index') }}" wire:navigate class="text-xs text-indigo-500 hover:text-indigo-400 transition">{{ __('Manage') }} →</a>
            </div>
            @php $allSkills = \App\Models\Skill::orderBy('sort_order')->pluck('name'); @endphp
            @if ($allSkills->isNotEmpty())
                <div class="flex flex-wrap gap-2">
                    @foreach ($allSkills as $skill)
                        <span class="rounded-full border border-zinc-200 dark:border-zinc-700 bg-zinc-50 dark:bg-zinc-800 px-3 py-1 text-xs text-zinc-600 dark:text-zinc-400">{{ $skill }}</span>
                    @endforeach
                </div>
            @else
                <p class="text-sm text-zinc-500">{{ __('No skills yet.') }}</p>
            @endif
        </div>
    </div>
</x-layouts::app>
