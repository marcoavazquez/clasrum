<?php

namespace Tests\Unit;

use App\User;
use Laravel\Passport\Passport;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PassportTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * Test server creation.
     *
     * @return void
     */
    public function testServerCreation()
    {
        Passport::actingAs(factory(User::class)->create(), ['create-servers']);

        $response = $this->post('/create-server');
        $response->assertStatus(200);
    }
}
