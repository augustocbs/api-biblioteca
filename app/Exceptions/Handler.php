<?php

namespace App\Exceptions;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Symfony\Component\Console\Exception\CommandNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        AuthenticationException::class,
        AuthorizationException::class,
        CommandNotFoundException::class,
        HttpException::class,
        ModelNotFoundException::class,
        NotFoundHttpException::class,
        ValidationException::class,
    ];

    public function render($request, \Throwable $exception)
    {
        if ($request->is('web/*') && $exception instanceof ValidationException) {
            $response = [
                'errors' => [],
            ];

            foreach ($exception->errors() as $errors) {
                foreach ($errors as $error) {
                    $response['errors'][] = $error;
                }
            }

            return response()->json($response, 400);
        }

        if ($request->is('web/*') && $exception instanceof UnauthorizedException) {
            return response()->json([
                'errors' => ['Sua conta não tem permissão para acessar esse recurso.'],
            ], 403);
        }

        if ($request->is('web/*')) {
            return response()->json([
                'errors' => ['Erro interno no servidor.'],
                'exception' => get_class($exception),
                'message' => $exception->getMessage(),
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
            ], 500);
        }

        return parent::render($request, $exception);
    }
}
