<?php
namespace Tests\Unit;

use App\Models\Ticket;
use App\Services\TicketService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TicketServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_getAllTickets_returns_all_tickets()
    {
        // Arrange
        Ticket::factory()->count(3)->create();
        $ticketService = new TicketService();

        // Act
        $tickets = $ticketService->getAllTickets();

        // Assert
        $this->assertCount(3, $tickets);
    }

    // ... (autres tests) ...
}