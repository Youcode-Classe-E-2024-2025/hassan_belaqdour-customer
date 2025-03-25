<?php

namespace App\Services;

use App\Models\Response;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ResponseService
{
    public function createResponse(array $data)
    {
        if (!Ticket::find($data['ticket_id'])) {
            throw new ModelNotFoundException('Ticket not found');
        }

        return Response::create($data);
    }

    public function getResponseById(int $id)
    {
        return Response::findOrFail($id);
    }

    public function updateResponse(int $id, array $data)
    {
        $response = Response::findOrFail($id);
        $response->update($data);
        return $response->fresh();
    }

    public function deleteResponse(int $id)
    {
        $response = Response::findOrFail($id);
        return $response->delete();
    }
}
