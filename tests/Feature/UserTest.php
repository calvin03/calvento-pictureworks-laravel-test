<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function testCreateComment()
    {
        $user = factory(User::class)->create();

        $response = $this->post("api/user/add_comment", ['id' => $user->id,'password' => $user->password, 'comment' => 'Test'])
      ->assertStatus(200);
    }

    public function testfetchUser()
    {
        $user = factory(User::class)->create();
        $response = $this->get("user/$user->id")
      ->assertStatus(200);
    }
}
