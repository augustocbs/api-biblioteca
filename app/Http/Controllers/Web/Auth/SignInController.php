<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Web\Controller;
use App\Http\Requests\Web\Auth\SignInRequest;
use Exception;
use Illuminate\Validation\ValidationException;

/**
 * @OA\Post(
 *     path="/auth/sign-in",
 *     tags={"Auth"},
 *     summary="Realiza o login",
 *     description="Autentica o usuário usando o e-mail e senha, criando uma nova sessão de login.",
 *     @OA\RequestBody(
 *        required=true,
 *        @OA\MediaType(
 *            mediaType="application/json",
 *            @OA\Schema(ref="#/components/schemas/SignInRequest")
 *        )
 *     ),
 *     @OA\Response(
 *         response=204,
 *         description="Login bem-sucedido, sessão criada com sucesso",
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Credenciais inválidas",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="errors", type="array",
 *                 @OA\Items(type="string", example="As credenciais fornecidas estão incorretas.")
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

class SignInController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest:web']);
    }

    public function __invoke(SignInRequest $request)
    {
        try {
            $request->authenticate();
            $request->session()->regenerate();

            return response()->noContent();
        } catch (ValidationException $exception) {
            return response()->json([
                'errors' => $exception->errors(),
            ], 401);
        } catch (Exception $exception) {
            report($exception);

            return response()->json([
                'errors' => ['Erro interno no servidor.'],
            ], 500);
        }
    }
}
