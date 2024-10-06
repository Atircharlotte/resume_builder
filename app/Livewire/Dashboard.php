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

    public function mount()
    {
        if (!Auth::check()) {
            session()->flash('notLogin', 'Please login first!');
            return redirect()->route('login');
        }
    }

    // public function showDashboard()
    // {
    //     if (!Auth::check()) {
    //         session()->flash('notLogin', 'Please login first!');
    //         return redirect('/')->to('/');
    //     }
    //     return view('livewire.dashboard');
    // }    
    public function render()
    {
            $githubUser = Auth::user();
            
            $github_email = $githubUser->email;
            $resumes = Resume::where('github_email', $github_email)->get();
            return view('livewire.dashboard', ['githubUser' => $githubUser, 'resumes' => $resumes]);
    
    }
}
