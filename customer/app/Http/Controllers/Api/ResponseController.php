<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ResponseService;
use Illuminate\Http\Request;

class ResponseController extends Controller
{
    protected $responseService;

    public function __construct(ResponseService $responseService)
    {
        $this->responseService = $responseService;
    }

    public function store(Request $request, $ticket_id)
    {
        $data = $request->all();
        $data['ticket_id'] = $ticket_id;
        $response = $this->responseService->createResponse($data);
        return response()->json($response, 201);
    }

    public function show(int $id)
    {
        $response = $this->responseService->getResponseById($id);
        return response()->json($response);
    }

    public function update(Request $request, int $id)
    {
        $response = $this->responseService->updateResponse($id, $request->all());
        return response()->json($response);
    }

    public function destroy(int $id)
    {
        $this->responseService->deleteResponse($id);
        return response()->json(null, 204);
    }
}