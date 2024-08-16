<?php

namespace App\Exceptions;

use App\Traits\GeneralResponse;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
  /**
   * A list of the exception types that are not reported.
   *
   * @var array
   */
  protected $dontReport = [
    //
  ];

  /**
   * A list of the inputs that are never flashed for validation exceptions.
   *
   * @var array
   */
  protected $dontFlash = [
    'current_password',
    'password',
    'password_confirmation',
  ];

  /**
   * Register the exception handling callbacks for the application.
   *
   * @return void
   */
  public function register(): void
  {
    if (env('APP_ENV') == 'prod') {
      $this->reportable(function (Throwable $e) {
        if (app()->bound('sentry')) {
          app('sentry')->captureException($e);
        }
      });
    }

    $this->renderable(function (BadRequestHttpException $e, $request) {
      app()->setLocale($request->header('locale'));
      return GeneralResponse::responseMessage(
        __('fail'),
        $e->getMessage(),
        400
      );
    });

    $this->renderable(function (NotFoundHttpException $e, $request) {
      app()->setLocale($request->header('locale'));
      if ($request->wantsJson()) {
        return GeneralResponse::responseMessage(
          __('fail'),
          __('data not found'),
          404
        );
      } else {
        response()->view('pages.error.400', [], 404);
      }
    });

    $this->renderable(function (AccessDeniedHttpException $e, $request) {
      app()->setLocale($request->header('locale'));
      if ($request->wantsJson()) {
        return GeneralResponse::responseMessage(
        __('fail'),
        __('This action is unauthorized'),
        401
      );
      } else {
        response()->view('pages.error.400', [], 404);
      }

    });
  }


  /**
   * Render an exception into an HTTP response.
   *
   * @param Request $request
   * @param Throwable $e
   * @return Response|null
   *
   * @throws Throwable
   */
  public function render($request, Throwable $e)
  {
    if ($e instanceof ValidationException) {
      return $this->invalidJson($request, $e);
    } else if ($e instanceof AuthenticationException) {
      return $this->unauthenticated($request, $e);
    }
    return parent::render($request, $e);
  }

  protected function unauthenticated($request, AuthenticationException $exception): JsonResponse|Response
  {
    app()->setLocale($request->header('locale'));
    return GeneralResponse::responseMessage(
      __("Auth Error"),
      __("Login to Access"),
      401
    );
  }

  protected function invalidJson($request, ValidationException $exception): Response
  {
    if ($exception->response) {
      return $exception->response;
    }
    $validation_errors = $this->transformErrors($exception);
    return GeneralResponse::responseMessage(
      __('fail'),
      $validation_errors[0],
      $exception->status,
      null,
      $validation_errors,
        );
  }

  private function transformErrors(ValidationException $exception): array
  {
    $errors = array();

    foreach ($exception->errors() as $messages) {
      foreach ($messages as $message) {
        $errors[] = $message;
      }
    }

    return $errors;
  }
}
