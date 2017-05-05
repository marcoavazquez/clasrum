<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PassportTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_verify_if_it_is_authenticated()
    {
        $user = factory(User::class)->create();
        
        $this->actingAs($user, 'api');
    }

    /**
    * return always 200 status code on the index page
    * @return void
    */
    public function test_should_return_status_200_on_index_without_login()
    {
        $this->get('/')->assertStatus(200);
    }
}