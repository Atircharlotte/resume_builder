<?php

namespace App\Livewire;

use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ResumePreview extends Component
{

    public $editMode = false;
    public $resumeId;
    // for edition mode
    public $name;
    public $email;
    public $phone;
    public $social;
    public $education;
    public $skills;
    public $language;
    public $selfIntro;
    
    public function mount($resumeId) 
    {
        $this->resumeId = $resumeId;
        $resumeContent = Resume::find($this->resumeId);

        if (!$resumeContent) {
            dd('Resume content not found!');
        }
        // $this->name = $resumeContent->name;
        // $this->email = $resumeContent->email;
        // $this->phone = $resumeContent->phone;
        // $this->social = $resumeContent->social;
        // $this->education = $resumeContent->education;
        // $this->skills = $resumeContent->skills;
        // $this->language = $resumeContent->language;
        // $this->selfIntro = $resumeContent->selfIntro;
        $this->fill($resumeContent->toArray());
    }

    public function saveEdition()
    {
        $resumeContent = Resume::find($this->resumeId);

        $resumeContent->name = $this->name;
        $resumeContent->email = $this->email;
        $resumeContent->phone = $this->phone;
        $resumeContent->social = $this->social;
        $resumeContent->education = $this->education;
        $resumeContent->skills = $this->skills;
        $resumeContent->language = $this->language;
        $resumeContent->selfIntro = $this->selfIntro;
        // $resumeContent->update();
        $resumeContent->save();
        // $resumeContent->update([
        //     'name' => $this->name,
        //     ''
        // ]);
        $this->editMode = !$this->editMode;
    }
    
    public function cancel()
    {
        $this->editMode = !$this->editMode;
    }

    public function edit() 
    {
         $this->editMode = !$this->editMode;

    }
    public function delete()
    {
        $resumeContent = Resume::find($this->resumeId);
        $resumeContent->delete();
        return redirect()->route('dashboard');
    }

    public function render()
    {
        // $this->editMode = false;
        // get the id from route
        // $id = $request->route('id');
        if (!$this->resumeId) {
            dd('invalid id');
        }
    
        // ensure the id is correct
        // if (!$id) {
        //     dd('invalid id');
        // }

        // get the click resume content
        // $resumeContent = Resume::find($id);
        $resumeContent = Resume::find($this->resumeId);

        if (!$resumeContent) {
            dd('Resume not found!');
        }
        // dd($resumeContent);

        $githubUser = Auth::user();
            return view('livewire.resume-preview', 
            ['resumeContent' =>  $resumeContent, 'githubUser' => $githubUser, 'editMode' => $this->editMode,]);
    }
}
