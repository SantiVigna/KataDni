<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DniLetterTest extends TestCase
{
    use RefreshDatabase;

    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_IfCanCalculateDniLetter()
    {
        $response = $this->post(route('apiCalculator'), [
            'number' => 12345678
        ]);

        $response->assertStatus(200)
                 ->assertJsonStructure(['letter']);
    }

    public function test_IfGetAnInvalidNumberOfDni()
    {
        $response = $this->post(route('apiCalculator'), [
            'number' => '-1'
    ]);

        $response->assertStatus(400)
                 ->assertJson(['error' => 'El dato introducido es incorrecto. Debe ser un número entre 0 y 99999999.']);
    }
}
