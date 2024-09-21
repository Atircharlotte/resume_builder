<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    //  to create page
    public function CreatePage()
    {
        return redirect()->to('/create');
    }

    public function render()
    {
        $githubUser = Auth::user();
        // dd(get_class_methods($githubUser));
        return view('livewire.dashboard', ['githubUser' => $githubUser]);
    }

}
