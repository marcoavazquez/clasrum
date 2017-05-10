<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class UserTest extends TestCase
{
    use DatabaseMigrations;

    protected $user;

    public function setUp()
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
    }

    /**
     * Show the user 
     *
     * @return void
     */
    public function test_show_user()
    {
        $this->get('/users' . $this->user->id)
             ->assertJson($this->user->toArray())
             ->assertStatus(200);
    }

    /**
    * Store a user 
    * @return void
    */
    public function test_store_user()
    {
         $user = User::create([
            'email' => 'marco@example.com',
            'password' => bcrypt('password'),
            'name'  => 'Marco Antonio',
            'last_name' => 'Vazquez',
            'mother_last_name' => 'Alonso',
            'address' => 'Av. Exaple # 234 Col. Centro'
        ]);
        $response = $this->json('POST', 'users', $this->user->toArray())
                         ->assertStatus(200)
                         ->assertJson($user->toArray());
        $this->assertDatabaseHas('users', ['email' => 'marco@example.com']);
    }

    /**
    * update a user
    * @return void
    */
    public function test_update_user()
    {
        $this->json('PUT', 'users/' . $this->user->id, $this->user->toArray())
             ->assertStatus(200)
             ->assertJson($this->user->toArray());
    }

    /**
    * delete a user;
    * @return void
    */
    public function test_delete_user()
    {
        $this->json('DELETE', 'users/' . $this->user->id)
             ->assertStatus(201)
             ->assertJson([]);
    }
}
