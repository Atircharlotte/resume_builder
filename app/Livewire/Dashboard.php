<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
     
    public function render()
    {
        $githubUser = Auth::user();
        return view('livewire.dashboard', ['githubUser' => $githubUser]);
    }
}
