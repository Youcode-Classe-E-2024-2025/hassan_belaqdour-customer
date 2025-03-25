<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use OpenApi\Annotations as OA;

/**
 * @OA\Info(
 *     title="API Documentation",
 *     version="1.0.0",
 *     description="API for managing tickets and responses"
 * )
 * @OA\Server(
 *     url="/api",
 *     description="API Server"
 * )
 * 
 * 
 */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
