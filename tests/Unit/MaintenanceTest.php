<?php

namespace Tests\Unit;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MaintenanceTest extends TestCase
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

    public function test_get_maintenance(): void
    {
        $response = $this->withHeaders([
            "Authorization" => "Bearer ".$this->test_bearer_token()
        ])->get('api/v1/maintenance');

        $response->assertStatus(200);
    }

    public function test_the_form_maintenance_finished(): void
    {
        $token = $this->test_bearer_token();

        $response = $this->withHeaders([
            'Authorization' =>'Bearer '.$token,
            'id_user' => '5',
            'id_tool' => '2'

        ])->post('/api/v1/maintenance',
            [
                'date' => '2023-10-03 21:13:26',
                'report' => 'TestPoste',
                'dateNextOperation' => '2030-06-20 10:00:00'
            ]);

        $response->assertStatus(201);
    }
}
