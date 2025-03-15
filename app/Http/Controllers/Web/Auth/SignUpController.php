<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Web\Controller;
use App\Http\Requests\Web\Auth\SignUpRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * @OA\Post(
 *     path="/auth/sign-up",
 *     tags={"Auth"},
 *     summary="Cria um novo usuário e realiza o login",
 *     description="Cria um novo usuário com os dados fornecidos e realiza o login automaticamente.",
 *     @OA\RequestBody(
 *        required=true,
 *        @OA\MediaType(
 *            mediaType="application/json",
 *            @OA\Schema(ref="#/components/schemas/SignUpRequest")
 *        )
 *     ),
 *     @OA\Response(
 *         response=204,
 *         description="Usuário criado e login realizado com sucesso",
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Dados fornecidos inválidos",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="errors", type="array",
 *                 @OA\Items(type="string", example="Os dados fornecidos são inválidos.")
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Não autorizado - Usuário não autenticado",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="errors", type="array",
 *                 @OA\Items(type="string", example="Não autorizado.")
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Erro interno no servidor",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="errors", type="array",
 *                 @OA\Items(type="string", example="Erro interno no servidor.")
 *             )
 *         )
 *     )
 * )
 */

class SignUpController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest:web']);
    }

    public function __invoke(SignUpRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return response()->noContent();
    }
}
