<?php

namespace App\Http\Requests\Web\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

/**
 * @OA\Schema(
 *     schema="SignUpRequest",
 *     type="object",
 *     title="SignUpRequest",
 *     description="Corpo da requisição para cadastro de usuário",
 *     required={"name", "last_name", "email", "password"},
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         description="Primeiro nome do usuário",
 *         example="João"
 *     ),
 *     @OA\Property(
 *         property="last_name",
 *         type="string",
 *         description="Sobrenome do usuário",
 *         example="Silva"
 *     ),
 *     @OA\Property(
 *         property="email",
 *         type="string",
 *         format="email",
 *         description="Endereço de email do usuário",
 *         example="joao.silva@example.com"
 *     ),
 *     @OA\Property(
 *         property="password",
 *         type="string",
 *         format="password",
 *         description="Senha do usuário",
 *         example="password123"
 *     ),
 *     @OA\Property(
 *         property="password_confirmation",
 *         type="string",
 *         format="password",
 *         description="Confirmação da senha",
 *         example="password123"
 *     )
 * )
 */

class SignUpRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'password_confirmation' => ['required', Rules\Password::defaults()],
        ];
    }
}
