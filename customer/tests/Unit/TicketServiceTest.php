<?php
namespace Tests\Unit;

use App\Models\Ticket;
use App\Services\TicketService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TicketServiceTest extends TestCase
{
    use RefreshDatabase; // Reset la base de données après chaque test

    public function test_getAllTickets_returns_all_tickets()
    {
        // Arrange
        Ticket::factory()->count(3)->create(); // Créer 3 tickets de test
        $ticketService = new TicketService();

        // Act
        $tickets = $ticketService->getAllTickets();

        // Assert
        $this->assertCount(3, $tickets);
    }

    // ... (autres tests) ...
}