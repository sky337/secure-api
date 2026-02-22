<?php

namespace Sky337\SecureAPI\Classes;

use Illuminate\Http\JsonResponse;

class ApiResponse
{
    /**
     * Send success response.
     */
    public static function success($data = [], string $message = 'Success', int $code = 200): JsonResponse
    {
        return response()->json([
            'status' => true,
            'message' => $message,
            'data' => $data,
            'errors' => null,
        ], $code);
    }

    /**
     * Send error response.
     */
    public static function error(string $message = 'Error', int $code = 400, $errors = null): JsonResponse
    {
        return response()->json([
            'status' => false,
            'message' => $message,
            'data' => null,
            'errors' => $errors,
        ], $code);
    }

    /**
     * Send validation error response.
     */
    public static function validationError($errors = null, string $message = 'Validation Error'): JsonResponse
    {
        return self::error($message, 422, $errors);
    }
}
