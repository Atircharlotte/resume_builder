<?php

namespace App\Livewire;

use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
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
    

    public function resumeContent()
    {
        // get the content pf this resume
        $resumeContent = Resume::find($this->resumeId);

        // dd($resumeContent);
        $markdownContent = <<<EOD
        # {$resumeContent->name}

        ### About me 😆 
        {$resumeContent->selfIntro}
        ### I graduated from...📖
        {$resumeContent->education}
        ### I'm good at several things below... 💪
        {$resumeContent->skills}
        ### I love connecting with people using their mother languages...🗣️
        {$resumeContent->language}
        ### Learn more about me? Sure 😎
        {$resumeContent->social}
        ### Let's keep in touch 🤙
        Phone: {$resumeContent->phone}
        
        Email: {$resumeContent->email}
        EOD;

        return $markdownContent;
    }

    public function uploadToREADME()
    {
        $githubUser = Auth::user();
        $github_token = $githubUser->oauth_token;
        $repo_owner = $githubUser->nickname; // cookie-killer
        $repo_name = $githubUser->nickname; // cookie-killer

        $content = $this->resumeContent();
        $contentBase64 = base64_encode($content);

        $fileResponse = Http::withHeaders([
            'Authorization' => 'Bearer ' . $github_token,
        ])->get("https://api.github.com/repos/$repo_owner/$repo_name/contents/README.md");

        if ($fileResponse->failed()) {
            return view('livewire.error');
        }

        $fileData = $fileResponse->json();
        $sha = $fileData['sha'];

        $body = [
            "message" => "Updated README file",
            "content" => $contentBase64,
            "sha" => $sha,
        ];

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $github_token,
            'Content-Type' => 'application/json',    
        ])->put("https://api.github.com/repos/$repo_owner/$repo_name/contents/README.md", $body);

        if ($response->failed()) {
            // dd($response->json());
            return view('livewire.error');
        }

        // for debug(check out the content of the response)
        // dd($response->json());

        return redirect()->to('/dashboard');

    }
}
