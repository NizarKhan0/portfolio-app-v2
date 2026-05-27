<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
    body {
        font-family: 'Inter', sans-serif;
        scroll-behavior: smooth;
    }

    .gradient-text {
        background: linear-gradient(135deg, #6366f1, #a855f7, #ec4899);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .hero-bg {
        background: radial-gradient(ellipse at top, rgba(99, 102, 241, 0.1), transparent 50%),
            radial-gradient(ellipse at bottom, rgba(168, 85, 247, 0.1), transparent 50%);
    }

    [x-cloak] {
        display: none !important;
    }
    </style>
</head>

<body class="bg-zinc-950 text-zinc-100 antialiased">
    <div class="hero-bg min-h-screen">
        {{-- Nav --}}
        <nav class="sticky top-0 z-50 border-b border-transparent transition-all duration-300"
            x-data="{ scrolled: false, active: '', mobileOpen: false }" x-init="() => {
                active = window.location.hash || '#home';
                window.addEventListener('scroll', () => {
                    scrolled = window.scrollY > 50;
                    document.querySelectorAll('section[id]').forEach(s => {
                        const top = s.getBoundingClientRect().top;
                        if (top < 200) active = '#' + s.id;
                    });
                });
            }"
            :class="scrolled ? 'bg-zinc-950/90 backdrop-blur-xl border-zinc-800/50 shadow-lg shadow-black/20' : 'bg-transparent'">
            <div class="flex items-center justify-between px-4 md:px-6 py-4 max-w-5xl mx-auto">
                <a href="#" class="group flex items-center gap-3">
                    <span
                        class="flex size-9 items-center justify-center rounded-lg bg-gradient-to-br from-indigo-500 to-pink-500 text-sm font-bold text-white shadow-lg shadow-indigo-500/20 transition-transform duration-300 group-hover:scale-110">AK</span>
                    <span class="text-lg font-bold">
                        <span
                            class="bg-gradient-to-r from-indigo-400 to-pink-400 bg-clip-text text-transparent">Portfolio</span>
                    </span>
                </a>
                <div class="hidden md:flex items-center gap-1">
                    <a href="#home"
                        class="relative px-4 py-2 text-sm font-medium transition-colors duration-300 rounded-lg"
                        :class="active === '#home' ? 'text-white bg-indigo-500/10' : 'text-zinc-400 hover:text-white hover:bg-zinc-800/50'">
                        Home
                        <span
                            class="absolute bottom-0 left-1/2 h-0.5 bg-gradient-to-r from-indigo-500 to-pink-500 transition-all duration-300 -translate-x-1/2 rounded-full"
                            :class="active === '#home' ? 'w-6 opacity-100' : 'w-0 opacity-0'"></span>
                    </a>
                    <a href="#projects"
                        class="relative px-4 py-2 text-sm font-medium transition-colors duration-300 rounded-lg"
                        :class="active === '#projects' ? 'text-white bg-indigo-500/10' : 'text-zinc-400 hover:text-white hover:bg-zinc-800/50'">
                        Projects
                        <span
                            class="absolute bottom-0 left-1/2 h-0.5 bg-gradient-to-r from-indigo-500 to-pink-500 transition-all duration-300 -translate-x-1/2 rounded-full"
                            :class="active === '#projects' ? 'w-6 opacity-100' : 'w-0 opacity-0'"></span>
                    </a>
                    <a href="#experience"
                        class="relative px-4 py-2 text-sm font-medium transition-colors duration-300 rounded-lg"
                        :class="active === '#experience' ? 'text-white bg-indigo-500/10' : 'text-zinc-400 hover:text-white hover:bg-zinc-800/50'">
                        Experience
                        <span
                            class="absolute bottom-0 left-1/2 h-0.5 bg-gradient-to-r from-indigo-500 to-pink-500 transition-all duration-300 -translate-x-1/2 rounded-full"
                            :class="active === '#experience' ? 'w-6 opacity-100' : 'w-0 opacity-0'"></span>
                    </a>
                    <a href="#skills"
                        class="relative px-4 py-2 text-sm font-medium transition-colors duration-300 rounded-lg"
                        :class="active === '#skills' ? 'text-white bg-indigo-500/10' : 'text-zinc-400 hover:text-white hover:bg-zinc-800/50'">
                        Skills
                        <span
                            class="absolute bottom-0 left-1/2 h-0.5 bg-gradient-to-r from-indigo-500 to-pink-500 transition-all duration-300 -translate-x-1/2 rounded-full"
                            :class="active === '#skills' ? 'w-6 opacity-100' : 'w-0 opacity-0'"></span>
                    </a>
                    <a href="#contact"
                        class="relative px-4 py-2 text-sm font-medium transition-colors duration-300 rounded-lg"
                        :class="active === '#contact' ? 'text-white bg-indigo-500/10' : 'text-zinc-400 hover:text-white hover:bg-zinc-800/50'">
                        Contact
                        <span
                            class="absolute bottom-0 left-1/2 h-0.5 bg-gradient-to-r from-indigo-500 to-pink-500 transition-all duration-300 -translate-x-1/2 rounded-full"
                            :class="active === '#contact' ? 'w-6 opacity-100' : 'w-0 opacity-0'"></span>
                    </a>
                </div>
                <button @click="mobileOpen = !mobileOpen"
                    class="md:hidden flex size-10 items-center justify-center rounded-lg text-zinc-400 hover:text-white hover:bg-zinc-800/50 transition">
                    <svg x-show="!mobileOpen" class="size-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <svg x-show="mobileOpen" class="size-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div x-show="mobileOpen" x-transition
                class="md:hidden border-t border-zinc-800/50 bg-zinc-950/95 backdrop-blur-xl">
                <div class="flex flex-col px-4 py-2">
                    <a href="#home" @click="mobileOpen = false"
                        class="rounded-lg px-4 py-3 text-sm font-medium transition-colors duration-300"
                        :class="active === '#home' ? 'text-white bg-indigo-500/10' : 'text-zinc-400 hover:text-white hover:bg-zinc-800/50'">Home</a>
                    <a href="#projects" @click="mobileOpen = false"
                        class="rounded-lg px-4 py-3 text-sm font-medium transition-colors duration-300"
                        :class="active === '#projects' ? 'text-white bg-indigo-500/10' : 'text-zinc-400 hover:text-white hover:bg-zinc-800/50'">Projects</a>
                    <a href="#experience" @click="mobileOpen = false"
                        class="rounded-lg px-4 py-3 text-sm font-medium transition-colors duration-300"
                        :class="active === '#experience' ? 'text-white bg-indigo-500/10' : 'text-zinc-400 hover:text-white hover:bg-zinc-800/50'">Experience</a>
                    <a href="#skills" @click="mobileOpen = false"
                        class="rounded-lg px-4 py-3 text-sm font-medium transition-colors duration-300"
                        :class="active === '#skills' ? 'text-white bg-indigo-500/10' : 'text-zinc-400 hover:text-white hover:bg-zinc-800/50'">Skills</a>
                    <a href="#contact" @click="mobileOpen = false"
                        class="rounded-lg px-4 py-3 text-sm font-medium transition-colors duration-300"
                        :class="active === '#contact' ? 'text-white bg-indigo-500/10' : 'text-zinc-400 hover:text-white hover:bg-zinc-800/50'">Contact</a>
                </div>
            </div>
        </nav>

        {{-- Hero --}}
        <section id="home"
            class="flex flex-col items-center justify-center px-4 md:px-6 pt-16 md:pt-20 pb-16 text-center">
            <div
                class="mb-6 size-20 rounded-full bg-gradient-to-br from-indigo-500 to-pink-500 flex items-center justify-center text-3xl font-bold">
                AK
            </div>
            <h1 class="text-4xl md:text-6xl font-bold mb-4">
                Hi, I'm <span class="gradient-text">Your Name</span>
            </h1>
            <p class="text-lg md:text-xl text-zinc-400 max-w-xl mb-8">
                Fullstack PHP Developer — Laravel, Livewire, Filament, DevOps
            </p>
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="#contact"
                    class="rounded-lg bg-indigo-600 px-6 py-3 text-sm font-medium hover:bg-indigo-500 transition">Contact
                    Me</a>
                <a href="#projects"
                    class="rounded-lg border border-zinc-700 px-6 py-3 text-sm font-medium hover:border-zinc-500 transition">View
                    Projects</a>
            </div>
            <div class="flex gap-4 mt-8 text-zinc-500">
                <a href="#" class="hover:text-white transition">GitHub</a>
                <a href="#" class="hover:text-white transition">LinkedIn</a>
                <a href="#" class="hover:text-white transition">Email</a>
            </div>
        </section>

        {{-- Projects --}}
        <section id="projects" class="px-4 md:px-6 py-16 max-w-5xl mx-auto" x-data="{ showAll: false }">
            <h2 class="text-xl md:text-2xl font-bold mb-8 text-center">
                <span class="gradient-text">Projects</span>
            </h2>
            <div class="grid md:grid-cols-2 gap-6">
                @php
                $projects = [
                ['title' => 'Project 1', 'desc' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit.', 'tags' =>
                ['Laravel', 'Livewire', 'MySQL'], 'color' => 'from-indigo-500 to-purple-500'],
                ['title' => 'Project 2', 'desc' => 'Sed do eiusmod tempor incididunt ut labore et dolore.', 'tags' =>
                ['Filament', 'Tailwind', 'PostgreSQL'], 'color' => 'from-emerald-500 to-teal-500'],
                ['title' => 'Project 3', 'desc' => 'Duis aute irure dolor in reprehenderit in voluptate.', 'tags' =>
                ['Livewire', 'Alpine.js', 'Docker'], 'color' => 'from-orange-500 to-red-500'],
                ['title' => 'Project 4', 'desc' => 'Excepteur sint occaecat cupidatat non proident.', 'tags' =>
                ['Laravel', 'REST API', 'CI/CD'], 'color' => 'from-cyan-500 to-blue-500'],
                ];
                @endphp
                @foreach ($projects as $i => $project)
                <div class="group/card relative rounded-xl border border-zinc-800 bg-zinc-900/50 p-6 transition-all duration-300 hover:scale-[1.02] hover:border-zinc-700 hover:shadow-xl hover:shadow-zinc-900/50 overflow-hidden"
                    x-show="showAll || {{ $i < 2 ? 'true' : 'false' }}">
                    {{-- Gradient top accent --}}
                    <div
                        class="absolute inset-x-0 top-0 h-1 bg-gradient-to-r {{ $project['color'] }} opacity-0 transition-opacity duration-300 group-hover/card:opacity-100">
                    </div>
                    {{-- Image --}}
                    <div
                        class="relative h-40 rounded-lg bg-gradient-to-br {{ $project['color'] }} mb-4 flex items-center justify-center overflow-hidden">
                        <div class="absolute inset-0 bg-black/20"></div>
                        <svg class="relative size-12 text-white/50" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909M3.75 21h16.5A2.25 2.25 0 0022.5 18.75V5.25A2.25 2.25 0 0020.25 3H3.75A2.25 2.25 0 001.5 5.25v13.5A2.25 2.25 0 003.75 21z" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-lg mb-2 text-zinc-100 group-hover/card:text-white transition-colors">
                        {{ $project['title'] }}</h3>
                    <p class="text-sm text-zinc-400 mb-4 leading-relaxed">{{ $project['desc'] }}</p>
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                        <div class="flex flex-wrap gap-2">
                            @foreach ($project['tags'] as $tag)
                            <span
                                class="rounded-full border border-zinc-700/50 bg-zinc-800/50 px-3 py-1 text-xs text-zinc-300 transition-colors group-hover/card:border-indigo-500/30 group-hover/card:text-indigo-300">{{ $tag }}</span>
                            @endforeach
                        </div>
                        <a href="#"
                            class="self-start sm:self-auto shrink-0 rounded-lg border border-zinc-700 px-4 py-2 text-xs font-medium text-zinc-300 transition-all hover:border-indigo-500 hover:bg-indigo-500/10 hover:text-indigo-400">
                            Demo →
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center mt-8">
                <button @click="showAll = !showAll"
                    class="rounded-lg border border-zinc-700 px-6 py-3 text-sm font-medium hover:border-indigo-500 hover:text-indigo-400 transition-all"
                    x-text="showAll ? 'Show Less' : 'Show All Projects ({{ count($projects) }})'"></button>
            </div>
        </section>

        {{-- Experience --}}
        <section id="experience" class="px-4 md:px-6 py-16 max-w-3xl mx-auto">
            <h2 class="text-xl md:text-2xl font-bold mb-8 text-center">
                <span class="gradient-text">Experience</span>
            </h2>
            <div class="space-y-8">
                @php
                $experiences = [
                ['role' => 'Fullstack Developer', 'company' => 'Company Name', 'period' => 'Jan 2024 - Present', 'desc'
                => 'Developed web applications using Laravel, Livewire, and Filament. Managed server deployments and
                CI/CD pipelines.', 'tags' => ['Laravel', 'Livewire', 'Filament', 'MySQL', 'Docker', 'Git']],
                ['role' => 'Junior Developer', 'company' => 'Previous Company', 'period' => 'Jun 2022 - Dec 2023',
                'desc' => 'Built REST APIs and admin panels. Maintained legacy systems and optimized database queries.',
                'tags' => ['PHP', 'MySQL', 'REST API']],
                ['role' => 'Intern', 'company' => 'Startup Name', 'period' => 'Jan 2022 - May 2022', 'desc' => 'Assisted
                in building internal tools and learned fullstack development workflow.', 'tags' => ['Laravel',
                'Tailwind', 'Git']],
                ];
                @endphp
                @foreach ($experiences as $i => $exp)
                <div class="relative flex gap-6 group transition-all duration-500"
                    style="transition-delay: {{ $i * 150 }}ms">
                    {{-- Timeline --}}
                    <div class="relative flex flex-col items-center">
                        <div
                            class="z-10 flex size-10 shrink-0 items-center justify-center rounded-full bg-gradient-to-br from-indigo-500 to-pink-500 text-sm font-bold text-white shadow-lg shadow-indigo-500/20">
                            {{ substr($exp['company'], 0, 1) }}
                        </div>
                        @if (!$loop->last)
                        <div class="mt-2 w-0.5 flex-1 bg-gradient-to-b from-indigo-500/50 to-transparent"></div>
                        @endif
                    </div>
                    {{-- Card --}}
                    <div
                        class="group/card relative mb-8 flex-1 rounded-xl border border-zinc-800 bg-zinc-900/80 p-4 md:p-5 backdrop-blur-sm transition-all duration-300 hover:scale-[1.02] hover:border-indigo-500/50 hover:shadow-xl hover:shadow-indigo-500/5">
                        <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-2 mb-3">
                            <div>
                                <h3
                                    class="text-base md:text-lg font-bold bg-gradient-to-r from-indigo-400 to-pink-400 bg-clip-text text-transparent">
                                    {{ $exp['role'] }}</h3>
                                <p class="text-sm text-zinc-300">{{ $exp['company'] }}</p>
                            </div>
                            <span
                                class="self-start shrink-0 rounded-full bg-zinc-800/80 px-3 py-1 text-xs text-zinc-500">{{ $exp['period'] }}</span>
                        </div>
                        <p class="mb-4 text-sm leading-relaxed text-zinc-400">{{ $exp['desc'] }}</p>
                        <div class="flex flex-wrap gap-2">
                            @foreach ($exp['tags'] as $tag)
                            <span
                                class="rounded-full border border-zinc-700/50 bg-zinc-800/50 px-3 py-1 text-xs text-zinc-300 transition-colors group-hover/card:border-indigo-500/30 group-hover/card:text-indigo-300">{{ $tag }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>

        {{-- Skills --}}
        <section id="skills" class="px-4 md:px-6 py-16 max-w-5xl mx-auto">
            <h2 class="text-xl md:text-2xl font-bold mb-8 text-center">
                <span class="gradient-text">Skills</span>
            </h2>
            <div class="flex flex-wrap justify-center gap-4">
                @php
                $skills = ['PHP', 'Laravel', 'Livewire', 'Filament', 'Flux', 'Tailwind', 'MySQL', 'PostgreSQL',
                'Docker', 'Git', 'Linux', 'Nginx'];
                @endphp
                @foreach ($skills as $skill)
                <span
                    class="rounded-lg border border-zinc-800 bg-zinc-900 px-5 py-3 text-sm font-medium transition-all duration-300 hover:scale-105 hover:border-indigo-500 hover:text-indigo-400 hover:shadow-lg hover:shadow-indigo-500/5">{{ $skill }}</span>
                @endforeach
            </div>
        </section>

        {{-- Contact --}}
        <section id="contact" class="px-4 md:px-6 py-16 max-w-xl mx-auto text-center">
            <h2 class="text-2xl font-bold mb-4">Get In Touch</h2>
            <p class="text-zinc-400 mb-8">Have a project in mind? Let's talk.</p>
            <form class="space-y-4 text-left">
                <div>
                    <input type="email" placeholder="Your email"
                        class="w-full rounded-lg border border-zinc-800 bg-zinc-900/50 px-4 py-3 text-sm focus:outline-none focus:border-indigo-500 transition">
                </div>
                <div>
                    <textarea rows="4" placeholder="Your message"
                        class="w-full rounded-lg border border-zinc-800 bg-zinc-900/50 px-4 py-3 text-sm focus:outline-none focus:border-indigo-500 transition"></textarea>
                </div>
                <button type="submit"
                    class="w-full rounded-lg bg-indigo-600 px-6 py-3 text-sm font-medium hover:bg-indigo-500 transition">Send
                    Message</button>
            </form>
        </section>

        {{-- Footer --}}
        <footer class="border-t border-zinc-800 px-6 py-6 text-center text-sm text-zinc-500">
            &copy; {{ date('Y') }} Your Name. Built with Laravel + Livewire.
        </footer>
    </div>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- Back to Top --}}
    <button x-data="{ visible: false }" x-init="window.addEventListener('scroll', () => visible = window.scrollY > 400)"
        x-show="visible" x-transition @click="window.scrollTo({ top: 0, behavior: 'smooth' })"
        class="fixed bottom-6 right-6 z-50 flex size-12 items-center justify-center rounded-full bg-gradient-to-br from-indigo-500 to-pink-500 text-white shadow-lg shadow-indigo-500/30 transition-all duration-300 hover:scale-110 hover:shadow-xl hover:shadow-indigo-500/40">
        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke-width="2"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
        </svg>
    </button>
</body>

</html>
