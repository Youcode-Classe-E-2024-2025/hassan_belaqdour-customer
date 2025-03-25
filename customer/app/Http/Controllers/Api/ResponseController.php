<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ResponseService;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

class ResponseController extends Controller
{
    protected $responseService;

    public function __construct(ResponseService $responseService)
    {
        $this->responseService = $responseService;
    }

    /**
     * @OA\Post(
     *     path="/api/tickets/{ticket_id}/responses",
     *     summary="Créer une nouvelle réponse pour un ticket",
     *     tags={"Responses"},
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="ticket_id",
     *         in="path",
     *         description="ID du ticket",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="content", type="string", description="Contenu de la réponse")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Réponse créée avec succès",
     *         @OA\JsonContent(
     *             @OA\Property(property="id", type="integer", example=1),
     *             @OA\Property(property="ticket_id", type="integer", example=123),
     *             @OA\Property(property="user_id", type="integer", example=456),
     *             @OA\Property(property="content", type="string", example="This is a response content."),
     *             @OA\Property(property="created_at", type="string", format="date-time"),
     *             @OA\Property(property="updated_at", type="string", format="date-time")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Requête invalide"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Ticket non trouvé"
     *     )
     * )
     */
    public function store(Request $request, $ticket_id)
    {
        $data = $request->all();
        $data['ticket_id'] = $ticket_id;
        $response = $this->responseService->createResponse($data);
        return response()->json($response, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/responses/{id}",
     *     summary="Afficher les détails d'une réponse",
     *     tags={"Responses"},
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID de la réponse",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Réponse trouvée avec succès",
     *         @OA\JsonContent(
     *             @OA\Property(property="id", type="integer", example=1),
     *             @OA\Property(property="ticket_id", type="integer", example=123),
     *             @OA\Property(property="user_id", type="integer", example=456),
     *             @OA\Property(property="content", type="string", example="This is a response content."),
     *             @OA\Property(property="created_at", type="string", format="date-time"),
     *             @OA\Property(property="updated_at", type="string", format="date-time")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Réponse non trouvée"
     *     )
     * )
     */
    public function show(int $id)
    {
        $response = $this->responseService->getResponseById($id);
        return response()->json($response);
    }

    /**
     * @OA\Put(
     *     path="/api/responses/{id}",
     *     summary="Mettre à jour une réponse existante",
     *     tags={"Responses"},
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID de la réponse",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="content", type="string", description="Nouveau contenu de la réponse")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Réponse mise à jour avec succès",
     *         @OA\JsonContent(
     *             @OA\Property(property="id", type="integer", example=1),
     *             @OA\Property(property="ticket_id", type="integer", example=123),
     *             @OA\Property(property="user_id", type="integer", example=456),
     *             @OA\Property(property="content", type="string", example="This is a response content."),
     *             @OA\Property(property="created_at", type="string", format="date-time"),
     *             @OA\Property(property="updated_at", type="string", format="date-time")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Requête invalide"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Réponse non trouvée"
     *     )
     * )
     */
    public function update(Request $request, int $id)
    {
        $response = $this->responseService->updateResponse($id, $request->all());
        return response()->json($response);
    }

    /**
     * @OA\Delete(
     *     path="/api/responses/{id}",
     *     summary="Supprimer une réponse",
     *     tags={"Responses"},
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID de la réponse",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Réponse supprimée avec succès"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Réponse non trouvée"
     *     )
     * )
     */
    public function destroy(int $id)
    {
        $this->responseService->deleteResponse($id);
        return response()->json(null, 204);
    }
}