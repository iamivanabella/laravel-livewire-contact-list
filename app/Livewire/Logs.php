<?php

namespace App\Livewire;

use Livewire\Component;
use Spatie\Activitylog\Models\Activity;

class Logs extends Component
{
    public $activities;

    public function mount()
    {
        $this->activities = Activity::with('causer')->latest()->get(); // Eager load 'causer' relationship
    }
    public function render()
    {
        return view('livewire.logs');
    }
}
