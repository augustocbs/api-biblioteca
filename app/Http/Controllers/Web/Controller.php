<?php

namespace App\Http\Controllers\Web;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *     title="Swagger - Biblioteca Web",
 *     version="1.0.0",
 *     description="",
 *     @OA\Contact(
 *         email="augustoc.bsilveira@gmail.com"
 *     ),
 * )
 * @OA\Server(
 *     description="Localhost",
 *     url="http://localhost/web"
 * )
 * @OA\Tag(
 *     name="Auth",
 *     description="Autenticação",
 * )
 * @OA\Tag(
 *     name="Home",
 *     description="Tela Inicial",
 * )
 * @OA\Tag(
 *    name="Client",
 *    description="Clientes"
 * )
 * @OA\Tag(
 *     name="User",
 *     description="Usuários",
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;
}
