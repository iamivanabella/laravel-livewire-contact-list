<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Contact;

class Contacts extends Component
{
    public $contacts = [];

    public function mount()
    {
        $this->contacts = Contact::all();
    }

    public function delete(Contact $contact)
    {
        if ($contact->avatar) {
            \Storage::disk('public')->delete($contact->avatar);
        }
        $contact->delete();
        return $this->redirect('/dashboard');
    }

    public function render()
    {
        return view('livewire.contacts');
    }
}
