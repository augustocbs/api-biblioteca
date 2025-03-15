<?php

namespace App\Http\Controllers\Web\Home;

use App\Http\Controllers\Web\Controller;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Get(
 *     path="/home",
 *     tags={"Home"},
 *     summary="Handle the incoming request",
 *     description="Este endpoint retorna uma resposta JSON vazia.",
 *     @OA\Response(
 *         response=200,
 *         description="Resposta JSON vazia.",
 *         @OA\JsonContent(type="object")
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Erro interno do servidor.",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(
 *                 property="errors",
 *                 type="array",
 *                 items=@OA\Items(type="string"),
 *                 example={"Erro interno do servidor."}
 *             )
 *         )
 *     )
 * )
 */

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        return new JsonResponse();
    }
}
