<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Contact;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Spatie\Activitylog\Models\Activity;

#[Title('Edit Contact')]
class EditContact extends Component
{   
    use WithFileUploads;

    public $contact;
    public $name;
    public $email;
    public $contact_number;
    public $address;
    public $notes;
    public $avatar;
    public $existingAvatar;
    
    public function mount(Contact $contact)
    {
        $this->contact = $contact;
        $this->name = $contact->name;
        $this->email = $contact->email;
        $this->contact_number = $contact->contact_number;
        $this->address = $contact->address;
        $this->notes = $contact->notes;
        $this->existingAvatar = $contact->avatar;

        activity()
            ->performedOn($this->contact)
            ->causedBy(auth()->user())
            ->log('initiated editing contact');
    }

    public function update()
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
            if ($this->existingAvatar) {
                Storage::disk('public')->delete($this->existingAvatar);
            }

            $avatarPath = $this->avatar->store('avatars', 'public');
            $validatedData['avatar'] = $avatarPath; 
        } else {
            $validatedData['avatar'] = $this->existingAvatar;
        }

        $this->contact->update($validatedData);

        activity()
            ->performedOn($this->contact)
            ->causedBy(auth()->user())
            ->withProperties(['attributes' => $validatedData])
            ->log('updated contact');

        session()->flash('status', 'Contact information successfully updated.');

        return $this->redirect('/dashboard'); 
    }

    public function render()
    {
        return view('livewire.edit-contact');
    }
    
    
}
