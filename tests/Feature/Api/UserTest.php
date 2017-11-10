<?php

namespace Tests\Feature;

use Mockery\Exception;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function can_get_a_user()
    {
        $user = factory(User::class)->create([
            'name' => 'Test Name',
            'email' => 'test@rategenius.com'
        ]);

        $this->assertDatabaseHas('users', [
           'name' => $user['name'],
            'email' => $user['email']
        ]);

        $response = $this->withoutMiddleware()
                         ->get('/api/user/1');

        $response->assertStatus(200)
                 ->assertJson($user->toArray());
    }

    /**
     * @test
     */
    public function fail_if_user_does_not_exist()
    {
        $this->expectException(ModelNotFoundException::class);

        $user = factory(User::class)->create([
            'name' => 'Test Name',
            'email' => 'test@rategenius.com'
        ]);

        $this->assertDatabaseHas('users', [
            'name' => $user['name'],
            'email' => $user['email']
        ]);

        $response = $this->withoutMiddleware()
            ->get('/api/user/2');

//        $response->assertStatus(404);
    }


}
