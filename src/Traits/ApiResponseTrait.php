<?php

namespace Sunil\SecureAPI\Traits;

use Illuminate\Http\JsonResponse;
use Sunil\SecureAPI\Classes\ApiResponse;

trait ApiResponseTrait
{
    /**
     * Success Response
     */
    protected function successResponse($data = [], string $message = 'Success', int $code = 200): JsonResponse
    {
        return ApiResponse::success($data, $message, $code);
    }

    /**
     * Error Response
     */
    protected function errorResponse(string $message = 'Error', int $code = 400, $errors = null): JsonResponse
    {
        return ApiResponse::error($message, $code, $errors);
    }

    /**
     * Validation Error Response
     */
    protected function validationErrorResponse($errors = null, string $message = 'Validation Error'): JsonResponse
    {
        return ApiResponse::validationError($errors, $message);
    }
}
