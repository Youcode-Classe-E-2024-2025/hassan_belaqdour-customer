<?php
namespace Tests\Feature;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class TicketControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_endpoint_returns_all_tickets()
    {
        // Arrange
        Sanctum::actingAs(
            User::factory()->create(), // Authentifie un utilisateur
            ['*']
        );
        Ticket::factory()->count(3)->create();

        // Act
        $response = $this->getJson('/api/tickets');

        // Assert
        $response->assertStatus(200);
        $response->assertJsonCount(3);
    }

    // ... (autres tests) ...
}