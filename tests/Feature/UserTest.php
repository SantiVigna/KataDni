<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_user()
    {
        $userData = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password123',
        ];

        $user = User::create($userData);

        $this->assertDatabaseHas('users', [
            'email' => 'john@example.com',
        ]);
        $this->assertNotNull($user->id);
    }

    /** @test */
    public function it_hashes_the_password_when_creating_a_user()
    {
        $userData = [
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'password' => 'password123',
        ];

        $user = User::create($userData);

        $this->assertNotEquals('password123', $user->password);
        $this->assertTrue(password_verify('password123', $user->password));
    }

    /** @test */
    public function it_can_hide_the_password_when_serializing()
    {
        $user = User::factory()->create([
            'password' => bcrypt('password123'),
        ]);

        $this->assertArrayNotHasKey('password', $user->toArray());
    }

    /** @test */
    public function it_can_cast_email_verified_at_to_datetime()
    {
        $user = User::factory()->create([
            'email_verified_at' => now(),
        ]);

        $this->assertInstanceOf(\Carbon\Carbon::class, $user->email_verified_at);
    }
}
