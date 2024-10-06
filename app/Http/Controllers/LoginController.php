<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    // redirect to OAuth provider
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)
        ->scopes(['read:user', 'repo'])
        ->redirect();
    }

    // Handle callback from provider
    public function HandleProviderCallback($provider)
    {
        $githubUser = Socialite::driver($provider)->user();

        // 檢查使用者是否已經存在於database
        $existingUser = User::where('email', $githubUser->email)->first();

        if ($existingUser) {
            // Log the user in
            Auth::login($existingUser);
        }else {
            // create a new user if not found
            $newUser = User::create([
                'nickname' => $githubUser->getNickname(),
                'name' => $githubUser->getName(),
                'email' => $githubUser->getEmail(),
                'avatar_url' => $githubUser->getAvatar(),
                'oauth_token' => $githubUser->token
            ]);

            // Log the newly created user in
            Auth::login($newUser);
        }
        
        // $githubUser = Auth::user();
        $github_email = $githubUser->email;
        $resumes = Resume::where('github_email', $github_email)->get();
        return view('livewire.dashboard', ['githubUser' => $githubUser,  'resumes' => $resumes]);

    }

    // public function testGitHub()
    // {
    //     return Socialite::driver('github')
    //         ->scopes(['read:user', 'repo'])
    //         ->redirect();
    // }
}
