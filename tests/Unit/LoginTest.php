<?php
namespace Tests\Unit;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    public function test_create_user(): void
    {
        $response = $this->post('api/v1/register',
            [
                'firstName' => 'Test',
                'lastName' => 'Test',
                'email' => 'brgn.alex@test.fr',
                'password' => '12345678'
            ]
        );

        $response->assertStatus(200);
    }

    public function test_bearer_token(): string
    {
        $response = $this->post('api/v1/login',
            [
                'email' => 'brgn.alex@test.fr',
                'password' => '12345678'
            ]
        );

        $response->assertStatus(200);
        return($response->original['success']['token']);
    }
}
