<?php

namespace App\Livewire;

use App\Models\Profile as ProfileModel;
use Flux\Flux;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.app')]
#[Title('Profile')]
class Profile extends Component
{
    use WithFileUploads;

    public $name;
    public $avatar;
    public $existingAvatar;
    public $tagline;
    public $github_url;
    public $linkedin_url;
    public $email;

    protected $rules = [
        'name' => 'required|string|max:255',
        'avatar' => 'nullable|image|max:2048',
        'tagline' => 'nullable|string|max:255',
        'github_url' => 'nullable|url|max:255',
        'linkedin_url' => 'nullable|url|max:255',
        'email' => 'nullable|email|max:255',
    ];

    public function mount()
    {
        $profile = ProfileModel::first() ?? ProfileModel::create(['name' => 'Your Name']);
        $this->name = $profile->name;
        $this->existingAvatar = $profile->avatar;
        $this->tagline = $profile->tagline;
        $this->github_url = $profile->github_url;
        $this->linkedin_url = $profile->linkedin_url;
        $this->email = $profile->email;
    }

    public function save()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'tagline' => $this->tagline,
            'github_url' => $this->github_url,
            'linkedin_url' => $this->linkedin_url,
            'email' => $this->email,
        ];

        if ($this->avatar) {
            $data['avatar'] = $this->avatar->store('profiles', 'public');
        }

        ProfileModel::first()->update($data);

        Flux::toast(variant: 'success', text: 'Profile updated successfully.');
    }

    public function render()
    {
        return view('livewire.profile');
    }
}
