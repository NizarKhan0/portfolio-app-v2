<?php

use App\Models\Experience;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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

Route::get('/activate-storage', function () {
    $target = storage_path('app/public');
    $link = public_path('storage');

    $output = [];
    $output[] = "Target: $target";
    $output[] = "Link: $link";
    $output[] = "Target exists: " . (file_exists($target) ? 'Yes' : 'No');
    $output[] = "Link exists: " . (file_exists($link) ? 'Yes' : 'No');

    if (file_exists($link)) {
        return implode('<br>', $output) . "<br><br>✅ Link already exists!";
    }

    if (symlink($target, $link)) {
        return implode('<br>', $output) . "<br><br>✅ Storage link created!";
    } else {
        return implode('<br>', $output) . "<br><br>❌ Failed to create link. Try manual method below.";
    }
});

// Route untuk optimize:clear (membersihkan semua cache)
Route::get('/optimize-clear', function () {
    try {
        Artisan::call('optimize:clear');

        $output = Artisan::output();

        return response()->json([
            'success' => true,
            'message' => '✅ All caches cleared successfully!',
            'artisan_output' => $output
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => '❌ Failed to clear caches: ' . $e->getMessage()
        ], 500);
    }
});


require __DIR__.'/settings.php';