<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Contact;
use Livewire\WithFileUploads;
use Spatie\Activitylog\Models\Activity;

#[Title('Add Contact')]
class CreateContact extends Component
{
    use WithFileUploads;

    public $name = '';
    public $email = '';
    public $contact_number = '';
    public $address = '';
    public $notes = '';
    public $avatar;

    public function mount()
    {
        activity()
            ->causedBy(auth()->user())
            ->log('initiated creating contact');
    }

    public function create()
    {
        $validatedData = $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'contact_number' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'notes' => 'nullable|string',
            'avatar' => 'nullable|image|max:5120',
        ]);

        if ($this->avatar) {
            $avatarPath = $this->avatar->store('avatars', 'public');
            $validatedData['avatar'] = $avatarPath;
        }

        Contact::create($validatedData);

        activity()
            ->performedOn($contact)
            ->causedBy(auth()->user())
            ->withProperties(['attributes' => $validatedData])
            ->log('created contact');
 
        session()->flash('status', 'Contact information successfully created.');

        return $this->redirect('/dashboard');
    }

    public function render()
    {
        return view('livewire.create-contact', );
    }
}
