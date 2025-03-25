<?php

namespace App\Services;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TicketService
{
    public function getAllTickets()
    {
        return Ticket::all();
    }

    public function createTicket(array $data)
    {
        // Set default status if not provided
        if (!isset($data['status'])) {
            $data['status'] = Ticket::STATUS_OPEN;
        }

        return Ticket::create($data);
    }

    public function getTicketById(int $id)
    {
        return Ticket::with(['user', 'assignedTo', 'responses'])->findOrFail($id);
    }

    public function updateTicket(int $id, array $data)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->update($data);
        return $ticket->fresh();
    }

    public function deleteTicket(int $id)
    {
        $ticket = Ticket::findOrFail($id);
        return $ticket->delete();
    }
}