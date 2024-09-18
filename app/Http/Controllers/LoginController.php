<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    // redirect to OAuth provider
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    // Handle callback from provider
    public function HandleProviderCallback($provider)
    {
        $githubUser = Socialite::driver($provider)->user();

        // 檢查使用者是否已經存在於database
        $existingUser = User::where('email', $githubUser->getEmail())->first();

        // dd($githubUser); // 偷看有什麼attribute可以拿來用

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
            ]);

            // Log the newly created user in
            Auth::login($newUser);
        }
        
        
        return redirect()->route('dashboard');

    }
}
