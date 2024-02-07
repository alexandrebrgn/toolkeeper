<?php

test('loginTest', function() {
    $response = $this->post('api/v1/register',
        [
            'firstName' => 'Test',
            'lastName' => 'Test',
            'email' => 'manager.tk@test.fr',
            'password' => '12345678'
        ]);
    expect($response)->toBe(200);
});
