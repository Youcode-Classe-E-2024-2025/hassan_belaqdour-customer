<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\TicketService;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="CustomerCareAPI - Tickets",
 *      description="API pour la gestion des tickets d'assistance.",
 *      @OA\Contact(
 *          email="your.email@example.com"
 *      ),
 *     @OA\License(
 *         name="Apache 2.0",
 *         url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *     )
 * )
 */
class TicketController extends Controller
{
    protected $ticketService;

    public function __construct(TicketService $ticketService)
    {
        $this->ticketService = $ticketService;
    }

    /**
     * @OA\Get(
     *     path="/api/tickets",
     *     summary="Liste tous les tickets",
     *     tags={"Tickets"},
     *     security={{"sanctum":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Liste des tickets récupérée avec succès",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 @OA\Property(property="id", type="integer", example=1),
     *                 @OA\Property(property="title", type="string", example="Problème de connexion"),
     *                 @OA\Property(property="description", type="string", example="Je n'arrive pas à me connecter à mon compte."),
     *                 @OA\Property(property="status", type="string", example="open"),
     *                 @OA\Property(property="user_id", type="integer", example=123),
     *                 @OA\Property(property="created_at", type="string", format="date-time"),
     *                 @OA\Property(property="updated_at", type="string", format="date-time")
     *             )
     *         )
     *     )
     * )
     */
    public function index()
    {
        $tickets = $this->ticketService->getAllTickets();
        return response()->json($tickets);
    }

    /**
     * @OA\Post(
     *     path="/api/tickets",
     *     summary="Créer un nouveau ticket",
     *     tags={"Tickets"},
     *      security={{"sanctum":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="title", type="string", example="Nouveau ticket"),
     *             @OA\Property(property="description", type="string", example="Description du ticket"),
     *             @OA\Property(property="user_id", type="integer", example=123)
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Ticket créé avec succès",
     *         @OA\JsonContent(
     *             @OA\Property(property="id", type="integer", example=1),
     *             @OA\Property(property="title", type="string", example="Nouveau ticket"),
     *             @OA\Property(property="description", type="string", example="Description du ticket"),
     *             @OA\Property(property="status", type="string", example="open"),
     *             @OA\Property(property="user_id", type="integer", example=123),
     *             @OA\Property(property="created_at", type="string", format="date-time"),
     *             @OA\Property(property="updated_at", type="string", format="date-time")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Requête invalide"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $ticket = $this->ticketService->createTicket($request->all());
        return response()->json($ticket, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/tickets/{id}",
     *     summary="Afficher les détails d'un ticket",
     *     tags={"Tickets"},
     *      security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID du ticket",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Ticket trouvé avec succès",
     *         @OA\JsonContent(
     *             @OA\Property(property="id", type="integer", example=1),
     *             @OA\Property(property="title", type="string", example="Nouveau ticket"),
     *             @OA\Property(property="description", type="string", example="Description du ticket"),
     *             @OA\Property(property="status", type="string", example="open"),
     *             @OA\Property(property="user_id", type="integer", example=123),
     *             @OA\Property(property="created_at", type="string", format="date-time"),
     *             @OA\Property(property="updated_at", type="string", format="date-time")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Ticket non trouvé"
     *     )
     * )
     */
    public function show(int $id)
    {
        $ticket = $this->ticketService->getTicketById($id);
        return response()->json($ticket);
    }

    /**
     * @OA\Put(
     *     path="/api/tickets/{id}",
     *     summary="Mettre à jour un ticket existant",
     *     tags={"Tickets"},
     *      security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="id",
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
     *             @OA\Property(property="title", type="string", example="Nouveau titre"),
     *             @OA\Property(property="description", type="string", example="Nouvelle description"),
     *             @OA\Property(property="status", type="string", example="closed")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Ticket mis à jour avec succès",
     *         @OA\JsonContent(
     *             @OA\Property(property="id", type="integer", example=1),
     *             @OA\Property(property="title", type="string", example="Nouveau titre"),
     *             @OA\Property(property="description", type="string", example="Nouvelle description"),
     *             @OA\Property(property="status", type="string", example="closed"),
     *             @OA\Property(property="user_id", type="integer", example=123),
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
    public function update(Request $request, int $id)
    {
        $ticket = $this->ticketService->updateTicket($id, $request->all());
        return response()->json($ticket);
    }

    /**
     * @OA\Delete(
     *     path="/api/tickets/{id}",
     *     summary="Supprimer un ticket",
     *     tags={"Tickets"},
     *      security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID du ticket",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Ticket supprimé avec succès"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Ticket non trouvé"
     *     )
     * )
     */
    public function destroy(int $id)
    {
        $this->ticketService->deleteTicket($id);
        return response()->json(null, 204);
    }
}