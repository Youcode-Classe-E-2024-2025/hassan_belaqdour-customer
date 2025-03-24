<?php


namespace App\Services;

use App\Models\Ticket;

class TicketService
{
public function getAllTickets()
{
return Ticket::all();
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