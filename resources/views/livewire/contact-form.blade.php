<div>
    @if ($success)
        <div class="rounded-lg border border-emerald-500/30 bg-emerald-500/10 px-6 py-4 text-center">
            <svg class="mx-auto mb-2 size-8 text-emerald-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <p class="text-sm font-medium text-emerald-300">Message sent successfully!</p>
            <p class="mt-1 text-xs text-zinc-400">Thank you for reaching out. I'll get back to you soon.</p>
        </div>
    @else
    <form wire:submit="submit" class="space-y-4 text-left">
        <div>
            <input type="text" wire:model="name" placeholder="Your name (optional)"
                class="w-full rounded-lg border border-zinc-800 bg-zinc-900/50 px-4 py-3 text-sm text-zinc-100 placeholder-zinc-500 focus:outline-none focus:border-indigo-500 transition">
            @error('name') <p class="mt-1 text-xs text-red-400">{{ $message }}</p> @enderror
        </div>
        <div>
            <input type="email" wire:model="email" placeholder="Your email"
                class="w-full rounded-lg border border-zinc-800 bg-zinc-900/50 px-4 py-3 text-sm text-zinc-100 placeholder-zinc-500 focus:outline-none focus:border-indigo-500 transition">
            @error('email') <p class="mt-1 text-xs text-red-400">{{ $message }}</p> @enderror
        </div>
        <div>
            <textarea wire:model="message" rows="4" placeholder="Your message"
                class="w-full rounded-lg border border-zinc-800 bg-zinc-900/50 px-4 py-3 text-sm text-zinc-100 placeholder-zinc-500 focus:outline-none focus:border-indigo-500 transition"></textarea>
            @error('message') <p class="mt-1 text-xs text-red-400">{{ $message }}</p> @enderror
        </div>
        <button type="submit" wire:loading.attr="disabled"
            class="w-full rounded-lg bg-indigo-600 px-6 py-3 text-sm font-medium hover:bg-indigo-500 transition disabled:opacity-50">
            <span wire:loading.remove>Send Message</span>
            <span wire:loading>Sending...</span>
        </button>
    </form>
    @endif
</div>
