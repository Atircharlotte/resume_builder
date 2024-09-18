<?php

namespace App\Livewire;

use Livewire\Component;

class Login extends Component
{

    public function login()
    {
        return redirect()->to('/login/github');
    }
    public function render()
    {
        return view('livewire.login');
    }
}
