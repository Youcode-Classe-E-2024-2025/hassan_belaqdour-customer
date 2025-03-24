<?php
namespace App\Http\Controllers;

use App\Services\TicketService;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    protected $ticketService;

    public function __construct(TicketService $ticketService)
    {
        $this->ticketService = $ticketService;
    }

    public function index()
    {
        $tickets = $this->ticketService->getAllTickets();
        return response()->json($tickets);
    }

    public function store(Request $request)
    {
        $ticket = $this->ticketService->createTicket($request->all());
        return response()->json($ticket, 201);
    }

    public function show(int $id)
    {
        $ticket = $this->ticketService->getTicketById($id);
        return response()->json($ticket);
    }

    public function update(Request $request, int $id)
    {
        $ticket = $this->ticketService->updateTicket($id, $request->all());
        return response()->json($ticket);
    }

    public function destroy(int $id)
    {
        $this->ticketService->deleteTicket($id);
        return response()->json(null, 204);
    }
}