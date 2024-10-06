<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class APITest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_get_request(): void
    {
        $githubUser = User::factory()->create([
            'oauth_token' => 'test_token',
            'nickname' => 'tester1',
        ]);
        // $githubUser = User::where('email', 'test@example.com')->first();


        // $this->actingAs($githubUser);

        $github_token = $githubUser->oauth_token;
        $repo_owner = $githubUser->nickname; // cookie-killer
        $repo_name = $githubUser->nickname;

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $github_token
        ])->get("https://api.github.com/repos/$repo_owner/$repo_name/contents/README.md");

        $response->assertStatus(200);

    }
}
