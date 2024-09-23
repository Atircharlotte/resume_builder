<?php

namespace App\Livewire;

use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ResumePreview extends Component
{
    public function render(Request $request)

    {
    // get the id from route
    $id = $request->route('id');
    
    // ensure the id is correct
    if (!$id) {
        dd('invalid id');
    }

    // get the click resume content
    $resumeContent = Resume::find($id);

    if (!$resumeContent) {
        dd('Resume not found!');
    }
    // dd($resumeContent);

    $githubUser = Auth::user();
        return view('livewire.resume-preview', 
        ['resumeContent' =>  $resumeContent, 'githubUser' => $githubUser]);
    }
}
