<?php

namespace App\Livewire;

use App\Models\Resume;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateResume extends Component
{
    #[Validate('required')]
    public $name = '';

    #[Validate('required')]
    public $email = '';

    #[Validate('required')]
    public $phone = '';

    public $social = '';
    public $education = '';
    public $skills = '';
    public $language = '';
    public $selfIntro = '';

    // save the form
    public function save()
    {
        $this->validate();

        // get the githubuser email
        $github_email = Auth::user()->getEmail;

        Resume::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'social' => $this->social,
            'education' => $this->education,
            'skills' => $this->skills,
            'language' => $this->language,
            'selfIntro' => $this->selfIntro,
            'github_email' => $github_email
        ]);

        session()->flash('createResume', 'Created successfully!');

        return redirect()->to('/dashboard');

    }

    public function render()
    {
        return view('livewire.create-resume');
    }
}
