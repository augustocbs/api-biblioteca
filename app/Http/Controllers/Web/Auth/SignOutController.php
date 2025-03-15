<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Web\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

/**
 * @OA\Post(
 *     path="/auth/sign-out",
 *     tags={"Auth"},
 *     summary="Realiza o logout do usuário autenticado",
 *     description="Desloga o usuário, invalida a sessão e regenera o token CSRF.",
 *     @OA\Response(
 *         response=204,
 *         description="Logout realizado com sucesso",
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Usuário não autenticado",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="errors", type="array", @OA\Items(type="string", example="Não autorizado."))
 *         )
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Erro interno no servidor",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="errors", type="array", @OA\Items(type="string", example="Erro ao realizar o logout."))
 *         )
 *     )
 * )
 */

class SignOutController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:web']);
    }

    public function __invoke(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->noContent();
    }
}
