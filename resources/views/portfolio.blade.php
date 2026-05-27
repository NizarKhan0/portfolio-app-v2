<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Inter', sans-serif; scroll-behavior: smooth; }
        .gradient-text {
            background: linear-gradient(135deg, #6366f1, #a855f7, #ec4899);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .hero-bg {
            background: radial-gradient(ellipse at top, rgba(99,102,241,0.1), transparent 50%),
                        radial-gradient(ellipse at bottom, rgba(168,85,247,0.1), transparent 50%);
        }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-zinc-950 text-zinc-100 antialiased">
    <div class="hero-bg min-h-screen">
        {{-- Nav --}}
        <nav class="sticky top-0 z-50 border-b border-transparent transition-all duration-300"
            x-data="{ scrolled: false, active: '', mobileOpen: false }"
            x-init="() => {
                active = window.location.hash || '#home';
                window.addEventListener('scroll', () => {
                    scrolled = window.scrollY > 50;
                    document.querySelectorAll('section[id]').forEach(s => {
                        const top = s.getBoundingClientRect().top;
                        if (top < 200) active = '#' + s.id;
                    });
                });
            }"
            :class="scrolled ? 'bg-zinc-950/90 backdrop-blur-xl border-zinc-800/50 shadow-lg shadow-black/20' : 'bg-transparent'"
        >
            <div class="flex items-center justify-between px-4 md:px-6 py-4 max-w-5xl mx-auto">
                <a href="#" class="group flex items-center gap-3">
                    <span class="flex size-9 items-center justify-center rounded-lg bg-gradient-to-br from-indigo-500 to-pink-500 text-sm font-bold text-white shadow-lg shadow-indigo-500/20 transition-transform duration-300 group-hover:scale-110 overflow-hidden">
                        @if ($profile->avatar)
                            <img src="{{ Storage::url($profile->avatar) }}" alt="{{ $profile->name }}" class="size-full object-cover">
                        @else
                            {{ $profile ? collect(preg_split('/\s+/', $profile->name))->map(fn($w) => strtoupper(substr($w, 0, 1)))->implode('') : 'P' }}
                        @endif
                    </span>
                    <span class="text-lg font-bold">
                        <span class="bg-gradient-to-r from-indigo-400 to-pink-400 bg-clip-text text-transparent">Portfolio</span>
                    </span>
                </a>
                <div class="hidden md:flex items-center gap-1">
                    <a href="#home"
                        class="relative px-4 py-2 text-sm font-medium transition-colors duration-300 rounded-lg"
                        :class="active === '#home' ? 'text-white bg-indigo-500/10' : 'text-zinc-400 hover:text-white hover:bg-zinc-800/50'">
                        Home
                        <span class="absolute bottom-0 left-1/2 h-0.5 bg-gradient-to-r from-indigo-500 to-pink-500 transition-all duration-300 -translate-x-1/2 rounded-full"
                            :class="active === '#home' ? 'w-6 opacity-100' : 'w-0 opacity-0'"></span>
                    </a>
                    <a href="#projects"
                        class="relative px-4 py-2 text-sm font-medium transition-colors duration-300 rounded-lg"
                        :class="active === '#projects' ? 'text-white bg-indigo-500/10' : 'text-zinc-400 hover:text-white hover:bg-zinc-800/50'">
                        Projects
                        <span class="absolute bottom-0 left-1/2 h-0.5 bg-gradient-to-r from-indigo-500 to-pink-500 transition-all duration-300 -translate-x-1/2 rounded-full"
                            :class="active === '#projects' ? 'w-6 opacity-100' : 'w-0 opacity-0'"></span>
                    </a>
                    <a href="#experience"
                        class="relative px-4 py-2 text-sm font-medium transition-colors duration-300 rounded-lg"
                        :class="active === '#experience' ? 'text-white bg-indigo-500/10' : 'text-zinc-400 hover:text-white hover:bg-zinc-800/50'">
                        Experience
                        <span class="absolute bottom-0 left-1/2 h-0.5 bg-gradient-to-r from-indigo-500 to-pink-500 transition-all duration-300 -translate-x-1/2 rounded-full"
                            :class="active === '#experience' ? 'w-6 opacity-100' : 'w-0 opacity-0'"></span>
                    </a>
                    <a href="#skills"
                        class="relative px-4 py-2 text-sm font-medium transition-colors duration-300 rounded-lg"
                        :class="active === '#skills' ? 'text-white bg-indigo-500/10' : 'text-zinc-400 hover:text-white hover:bg-zinc-800/50'">
                        Skills
                        <span class="absolute bottom-0 left-1/2 h-0.5 bg-gradient-to-r from-indigo-500 to-pink-500 transition-all duration-300 -translate-x-1/2 rounded-full"
                            :class="active === '#skills' ? 'w-6 opacity-100' : 'w-0 opacity-0'"></span>
                    </a>
                    <a href="#contact"
                        class="relative px-4 py-2 text-sm font-medium transition-colors duration-300 rounded-lg"
                        :class="active === '#contact' ? 'text-white bg-indigo-500/10' : 'text-zinc-400 hover:text-white hover:bg-zinc-800/50'">
                        Contact
                        <span class="absolute bottom-0 left-1/2 h-0.5 bg-gradient-to-r from-indigo-500 to-pink-500 transition-all duration-300 -translate-x-1/2 rounded-full"
                            :class="active === '#contact' ? 'w-6 opacity-100' : 'w-0 opacity-0'"></span>
                    </a>
                </div>
                <button @click="mobileOpen = !mobileOpen" class="md:hidden flex size-10 items-center justify-center rounded-lg text-zinc-400 hover:text-white hover:bg-zinc-800/50 transition">
                    <svg x-show="!mobileOpen" class="size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <svg x-show="mobileOpen" class="size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div x-show="mobileOpen" x-transition class="md:hidden border-t border-zinc-800/50 bg-zinc-950/95 backdrop-blur-xl">
                <div class="flex flex-col px-4 py-2">
                    <a href="#home" @click="mobileOpen = false" class="rounded-lg px-4 py-3 text-sm font-medium transition-colors duration-300" :class="active === '#home' ? 'text-white bg-indigo-500/10' : 'text-zinc-400 hover:text-white hover:bg-zinc-800/50'">Home</a>
                    <a href="#projects" @click="mobileOpen = false" class="rounded-lg px-4 py-3 text-sm font-medium transition-colors duration-300" :class="active === '#projects' ? 'text-white bg-indigo-500/10' : 'text-zinc-400 hover:text-white hover:bg-zinc-800/50'">Projects</a>
                    <a href="#experience" @click="mobileOpen = false" class="rounded-lg px-4 py-3 text-sm font-medium transition-colors duration-300" :class="active === '#experience' ? 'text-white bg-indigo-500/10' : 'text-zinc-400 hover:text-white hover:bg-zinc-800/50'">Experience</a>
                    <a href="#skills" @click="mobileOpen = false" class="rounded-lg px-4 py-3 text-sm font-medium transition-colors duration-300" :class="active === '#skills' ? 'text-white bg-indigo-500/10' : 'text-zinc-400 hover:text-white hover:bg-zinc-800/50'">Skills</a>
                    <a href="#contact" @click="mobileOpen = false" class="rounded-lg px-4 py-3 text-sm font-medium transition-colors duration-300" :class="active === '#contact' ? 'text-white bg-indigo-500/10' : 'text-zinc-400 hover:text-white hover:bg-zinc-800/50'">Contact</a>
                </div>
            </div>
        </nav>

        {{-- Hero --}}
        @if ($profile)
        <section id="home" class="relative flex flex-col items-center justify-center px-4 md:px-6 pt-20 md:pt-28 pb-20 text-center overflow-hidden">
            {{-- Decorative orbs --}}
            <div class="pointer-events-none absolute -top-40 -left-40 size-80 rounded-full bg-indigo-500/10 blur-[120px]"></div>
            <div class="pointer-events-none absolute -bottom-40 -right-40 size-80 rounded-full bg-pink-500/10 blur-[120px]"></div>

            {{-- Avatar with glow ring --}}
            <div class="group relative mb-8">
                <div class="absolute -inset-2 rounded-full bg-gradient-to-br from-indigo-500 via-purple-500 to-pink-500 opacity-40 blur-xl transition-all duration-700 group-hover:opacity-70 group-hover:scale-110"></div>
                <div class="absolute -inset-1 rounded-full bg-gradient-to-br from-indigo-500 via-purple-500 to-pink-500 opacity-60"></div>
                <div class="relative size-28 md:size-36 rounded-full bg-gradient-to-br from-indigo-500 to-pink-500 flex items-center justify-center overflow-hidden ring-4 ring-zinc-950 shadow-2xl shadow-indigo-500/30 transition-transform duration-500 hover:scale-105">
                    @if ($profile->avatar)
                        <img src="{{ Storage::url($profile->avatar) }}" alt="{{ $profile->name }}" class="size-full object-cover">
                    @else
                        <span class="text-3xl md:text-4xl font-bold text-white">{{ collect(preg_split('/\s+/', $profile->name))->map(fn($w) => strtoupper(substr($w, 0, 1)))->implode('') }}</span>
                    @endif
                </div>
            </div>

            {{-- Name --}}
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold mb-4 tracking-tight">
                <span class="text-zinc-100">Hi, I'm</span>
                <br class="md:hidden">
                <span class="bg-gradient-to-r from-indigo-400 via-purple-400 to-pink-400 bg-clip-text text-transparent">{{ $profile->name }}</span>
            </h1>

            {{-- Tagline --}}
            @php($tagline = $profile->tagline ?: 'Fullstack PHP Developer — Laravel, Livewire, Filament, DevOps')
            <p class="text-lg md:text-xl text-zinc-400 max-w-2xl mb-10 leading-relaxed">
                {{ $tagline }}
            </p>

            {{-- Buttons --}}
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="#contact" class="group relative inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-indigo-600 to-purple-600 px-8 py-3.5 text-sm font-semibold text-white transition-all duration-300 hover:scale-105 hover:shadow-lg hover:shadow-indigo-500/25">
                    Contact Me
                    <svg class="size-4 transition-transform duration-300 group-hover:translate-x-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                    </svg>
                </a>
                <a href="#projects" class="group relative inline-flex items-center gap-2 rounded-xl border border-zinc-700 bg-zinc-900/50 px-8 py-3.5 text-sm font-semibold text-zinc-300 transition-all duration-300 hover:scale-105 hover:border-indigo-500/50 hover:bg-zinc-800/80 hover:text-white">
                    View Projects
                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3.75v4.5m0-4.5h4.5m-4.5 0L9 9M3.75 20.25v-4.5m0 4.5h4.5m-4.5 0L9 15M20.25 3.75h-4.5m4.5 0v4.5m0-4.5L15 9m5.25 11.25h-4.5m4.5 0v-4.5m0 4.5L15 15" />
                    </svg>
                </a>
            </div>

            {{-- Social links --}}
            @if ($profile->github_url || $profile->linkedin_url || $profile->email)
            <div class="flex items-center gap-3 mt-10">
                <div class="h-px w-12 bg-gradient-to-r from-transparent to-zinc-700"></div>
                @if ($profile->github_url)
                    <a href="{{ $profile->github_url }}" target="_blank" class="flex size-10 items-center justify-center rounded-lg border border-zinc-800 bg-zinc-900/50 text-zinc-500 transition-all duration-300 hover:scale-110 hover:border-indigo-500 hover:bg-indigo-500/10 hover:text-indigo-400" title="GitHub">
                        <svg class="size-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
                    </a>
                @endif
                @if ($profile->linkedin_url)
                    <a href="{{ $profile->linkedin_url }}" target="_blank" class="flex size-10 items-center justify-center rounded-lg border border-zinc-800 bg-zinc-900/50 text-zinc-500 transition-all duration-300 hover:scale-110 hover:border-indigo-500 hover:bg-indigo-500/10 hover:text-indigo-400" title="LinkedIn">
                        <svg class="size-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"><path d="M22.23 0H1.77C.79 0 0 .77 0 1.72v20.56C0 23.23.79 24 1.77 24h20.46c.98 0 1.77-.77 1.77-1.72V1.72C24 .77 23.21 0 22.23 0zM7.12 20.45H3.56V9.01h3.56v11.44zM5.34 7.52a2.06 2.06 0 110-4.12 2.06 2.06 0 010 4.12zM20.45 20.45h-3.56v-5.57c0-1.33-.03-3.04-1.85-3.04-1.85 0-2.13 1.45-2.13 2.94v5.67H9.35V9.01h3.41v1.56h.05c.48-.9 1.64-1.85 3.37-1.85 3.6 0 4.27 2.37 4.27 5.46v6.27z"/></svg>
                    </a>
                @endif
                @if ($profile->email)
                    <a href="mailto:{{ $profile->email }}" class="flex size-10 items-center justify-center rounded-lg border border-zinc-800 bg-zinc-900/50 text-zinc-500 transition-all duration-300 hover:scale-110 hover:border-indigo-500 hover:bg-indigo-500/10 hover:text-indigo-400" title="Email">
                        <svg class="size-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" /></svg>
                    </a>
                @endif
                <div class="h-px w-12 bg-gradient-to-r from-zinc-700 to-transparent"></div>
            </div>
            @endif
        </section>
        @endif

        {{-- Projects --}}
        @if ($projects->isNotEmpty())
        <section id="projects" class="px-4 md:px-6 py-16 max-w-5xl mx-auto" x-data="{ showAll: false }">
            <h2 class="text-xl md:text-2xl font-bold mb-8 text-center">
                <span class="gradient-text">Projects</span>
            </h2>
            <div class="grid md:grid-cols-2 gap-6">
                @foreach ($projects as $i => $project)
                <div
                    class="group/card relative rounded-xl border border-zinc-800 bg-zinc-900/50 p-6 transition-all duration-300 hover:scale-[1.02] hover:border-zinc-700 hover:shadow-xl hover:shadow-zinc-900/50 overflow-hidden"
                    x-show="showAll || {{ $i < 2 ? 'true' : 'false' }}"
                >
                    <div class="absolute inset-x-0 top-0 h-1 bg-gradient-to-r {{ $project->color }} opacity-0 transition-opacity duration-300 group-hover/card:opacity-100"></div>
                    <div class="relative h-40 rounded-lg bg-gradient-to-br {{ $project->color }} mb-4 flex items-center justify-center overflow-hidden">
                        @if ($project->image)
                            <img src="{{ Storage::url($project->image) }}" alt="{{ $project->title }}" class="size-full object-cover">
                        @else
                        <div class="absolute inset-0 bg-black/20"></div>
                        <svg class="relative size-12 text-white/50" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909M3.75 21h16.5A2.25 2.25 0 0022.5 18.75V5.25A2.25 2.25 0 0020.25 3H3.75A2.25 2.25 0 001.5 5.25v13.5A2.25 2.25 0 003.75 21z" />
                        </svg>
                        @endif
                    </div>
                    <h3 class="font-semibold text-lg mb-2 text-zinc-100 group-hover/card:text-white transition-colors">{{ $project->title }}</h3>
                    <p class="text-sm text-zinc-400 mb-4 leading-relaxed">{{ $project->description }}</p>
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                        <div class="flex flex-wrap gap-2">
                            @foreach ($project->tags ?? [] as $tag)
                                <span class="rounded-full border border-zinc-700/50 bg-zinc-800/50 px-3 py-1 text-xs text-zinc-300 transition-colors group-hover/card:border-indigo-500/30 group-hover/card:text-indigo-300">{{ $tag }}</span>
                            @endforeach
                        </div>
                        @if ($project->demo_url)
                        <a href="{{ $project->demo_url }}" target="_blank" class="self-start sm:self-auto shrink-0 rounded-lg border border-zinc-700 px-4 py-2 text-xs font-medium text-zinc-300 transition-all hover:border-indigo-500 hover:bg-indigo-500/10 hover:text-indigo-400">
                            Demo →
                        </a>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center mt-8">
                <button
                    @click="showAll = !showAll"
                    class="rounded-lg border border-zinc-700 px-6 py-3 text-sm font-medium hover:border-indigo-500 hover:text-indigo-400 transition-all"
                    x-text="showAll ? 'Show Less' : 'Show All Projects ({{ $projects->count() }})'"
                ></button>
            </div>
        </section>
        @endif

        {{-- Experience --}}
        @if ($experiences->isNotEmpty())
        <section id="experience" class="px-4 md:px-6 py-16 max-w-3xl mx-auto">
            <h2 class="text-xl md:text-2xl font-bold mb-8 text-center">
                <span class="gradient-text">Experience</span>
            </h2>
            <div class="space-y-8">
                @foreach ($experiences as $i => $exp)
                <div class="relative flex gap-6 group transition-all duration-500" style="transition-delay: {{ $i * 150 }}ms">
                    <div class="relative flex flex-col items-center">
                        <div class="z-10 flex size-10 shrink-0 items-center justify-center rounded-full bg-gradient-to-br from-indigo-500 to-pink-500 text-sm font-bold text-white shadow-lg shadow-indigo-500/20">
                            {{ substr($exp->company, 0, 1) }}
                        </div>
                        @if (!$loop->last)
                            <div class="mt-2 w-0.5 flex-1 bg-gradient-to-b from-indigo-500/50 to-transparent"></div>
                        @endif
                    </div>
                    <div class="group/card relative mb-8 flex-1 rounded-xl border border-zinc-800 bg-zinc-900/80 p-4 md:p-5 backdrop-blur-sm transition-all duration-300 hover:scale-[1.02] hover:border-indigo-500/50 hover:shadow-xl hover:shadow-indigo-500/5">
                        <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-2 mb-3">
                            <div>
                                <h3 class="text-base md:text-lg font-bold bg-gradient-to-r from-indigo-400 to-pink-400 bg-clip-text text-transparent">{{ $exp->role }}</h3>
                                <p class="text-sm text-zinc-300">{{ $exp->company }}</p>
                            </div>
                            <span class="self-start shrink-0 rounded-full bg-zinc-800/80 px-3 py-1 text-xs text-zinc-500">{{ $exp->period }}</span>
                        </div>
                        <p class="mb-4 text-sm leading-relaxed text-zinc-400">{{ $exp->description }}</p>
                        <div class="flex flex-wrap gap-2">
                            @foreach ($exp->tags ?? [] as $tag)
                                <span class="rounded-full border border-zinc-700/50 bg-zinc-800/50 px-3 py-1 text-xs text-zinc-300 transition-colors group-hover/card:border-indigo-500/30 group-hover/card:text-indigo-300">{{ $tag }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
        @endif

        {{-- Skills --}}
        @if (!empty($skills))
        <section id="skills" class="px-4 md:px-6 py-16 max-w-5xl mx-auto">
            <h2 class="text-xl md:text-2xl font-bold mb-8 text-center">
                <span class="gradient-text">Skills</span>
            </h2>
            <div class="flex flex-wrap justify-center gap-4">
                @foreach ($skills as $skill)
                    <span class="rounded-lg border border-zinc-800 bg-zinc-900 px-5 py-3 text-sm font-medium transition-all duration-300 hover:scale-105 hover:border-indigo-500 hover:text-indigo-400 hover:shadow-lg hover:shadow-indigo-500/5">{{ $skill }}</span>
                @endforeach
            </div>
        </section>
        @endif

        {{-- Contact --}}
        <section id="contact" class="px-4 md:px-6 py-16 max-w-xl mx-auto text-center">
            <h2 class="text-2xl font-bold mb-4">Get In Touch</h2>
            <p class="text-zinc-400 mb-8">Have a project in mind? Let's talk.</p>
            <livewire:contact-form />
        </section>

        {{-- Footer --}}
        @if ($profile)
        <footer class="border-t border-zinc-800 px-6 py-6 text-center text-sm text-zinc-500">
            &copy; {{ date('Y') }} {{ $profile->name }}. Built with Laravel + Livewire.
        </footer>
        @endif
    </div>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- Back to Top --}}
    <button
        x-data="{ visible: false }"
        x-init="window.addEventListener('scroll', () => visible = window.scrollY > 400)"
        x-show="visible"
        x-transition
        @click="window.scrollTo({ top: 0, behavior: 'smooth' })"
        class="fixed bottom-6 right-6 z-50 flex size-12 items-center justify-center rounded-full bg-gradient-to-br from-indigo-500 to-pink-500 text-white shadow-lg shadow-indigo-500/30 transition-all duration-300 hover:scale-110 hover:shadow-xl hover:shadow-indigo-500/40"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
        </svg>
    </button>
</body>
</html>
