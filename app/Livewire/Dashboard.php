<?php

namespace App\Livewire;

use App\Models\Resume;
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
        // dd($githubUser);

        // get the list of resumes created
        $github_email = $githubUser->email;
        $resumes = Resume::where('github_email', $github_email)->get();
        return view('livewire.dashboard', ['githubUser' => $githubUser, 'resumes' => $resumes]);
    }

}
