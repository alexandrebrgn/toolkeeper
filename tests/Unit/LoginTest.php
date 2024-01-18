<?php
namespace Tests\Unit;
use Tests\TestCase;

class LoginTest extends TestCase
{
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
