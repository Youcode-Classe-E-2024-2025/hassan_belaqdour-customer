<?php

namespace App\Services;

use App\Models\Response;

class ResponseService
{
    public function createResponse(array $data)
    {
        return Response::create($data);
    }

    public function getResponseById(int $id)
    {
        return Response::findOrFail($id);
    }

    public function updateResponse(int $id, array $data)
    {
        $response = $this->getResponseById($id);
        $response->update($data);
        return $response;
    }

    public function deleteResponse(int $id)
    {
        $response = $this->getResponseById($id);
        $response->delete();
    }
}