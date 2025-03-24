<?php

namespace App\Http\Controllers;
use OpenApi\Annotations as OA;
use App\Services\ResponseService;
use Illuminate\Http\Request;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="CustomerCareAPI - Responses",
 *      description="API pour la gestion des réponses aux tickets.",
 *      @OA\Contact(
 *          email="your.email@example.com"
 *      ),
 *     @OA\License(
 *         name="Apache 2.0",
 *         url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *     )
 * )
 */
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
     *         description="Réponse créée avec succès"
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
    public function store(Request $request)
    {
        $response = $this->responseService->createResponse($request->all());
        return response()->json($response, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/responses/{id}",
     *     summary="Afficher les détails d'une réponse",
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
     *         description="Réponse trouvée avec succès"
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
     *         description="Réponse mise à jour avec succès"
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