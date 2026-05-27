<?php

use App\Models\Experience;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Support\Facades\Route;

// Route::view('/', 'welcome')->name('home');

Route::get('/', function () {
    return view('portfolio', [
        'profile' => Profile::first(),
        'projects' => Project::orderBy('sort_order')->get(),
        'experiences' => Experience::orderBy('sort_order')->get(),
        'skills' => Skill::orderBy('sort_order')->pluck('name')->toArray(),
    ]);
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    // Route::get('users', App\Livewire\Users::class)->name('users.index');
    Route::get('projects', App\Livewire\Projects::class)->name('projects.index');
    Route::get('experiences', App\Livewire\Experiences::class)->name('experiences.index');
    Route::get('skills', App\Livewire\Skills::class)->name('skills.index');
    Route::get('profile', App\Livewire\Profile::class)->name('profile');
});

require __DIR__.'/settings.php';