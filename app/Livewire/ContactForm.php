<?php

namespace App\Livewire;

use App\Mail\ContactNotification;
use App\Models\Profile;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ContactForm extends Component
{
    public $name = '';
    public $email = '';
    public $message = '';
    public $success = false;

    protected $rules = [
        'name' => 'nullable|string|max:255',
        'email' => 'required|email|max:255',
        'message' => 'required|string|max:5000',
    ];

    public function submit()
    {
        $this->validate();

        $profile = Profile::first();

        if ($profile?->email) {
            Mail::to($profile->email)->send(new ContactNotification(
                senderEmail: $this->email,
                senderName: $this->name ?: null,
                senderMessage: $this->message,
            ));
        }

        $this->reset();
        $this->success = true;
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
