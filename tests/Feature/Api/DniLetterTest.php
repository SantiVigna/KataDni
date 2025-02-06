<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DniLetterTest extends TestCase
{
    use RefreshDatabase;

    public function test_CheckIfCanCalculateDniLetter()
    {
        $response = $this->post(route('apiCalculator'), [
            'number' => 12345678
        ]);

        $response->assertStatus(200)
                 ->assertJson(["letter" => "Z"]);
    }

    public function test_CheckIfGetAnInvalidNumberOfDni()
    {
        $response = $this->post(route('apiCalculator'), [
            'number' => '-1'
    ]);

        $response->assertStatus(400)
                 ->assertJson(['error' => 'El dato introducido es incorrecto. Debe ser un número entre 0 y 99999999.']);
    }
}
