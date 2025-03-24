<?php


namespace App\Services;

use App\Models\Ticket;

class TicketService
{
    public function getAllTickets(array $filters = [], int $perPage = 10)
    {
        $query = Ticket::query();

        // Appliquer les filtres
        if (isset($filters['status'])) {
            $query->where('status', $filters['status']);
        }
        if (isset($filters['assigned_to'])) {
            $query->where('assigned_to', $filters['assigned_to']);
        }

        // Pagination
        return $query->paginate($perPage);
    }

public function createTicket(array $data)
{
return Ticket::create($data);
}

public function getTicketById(int $id)
{
return Ticket::findOrFail($id);
}

public function updateTicket(int $id, array $data)
{
$ticket = $this->getTicketById($id);
$ticket->update($data);
return $ticket;
}

public function deleteTicket(int $id)
{
$ticket = $this->getTicketById($id);
$ticket->delete();
}
}