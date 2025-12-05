<?php

namespace App\Helpers;

class ApiResponse
{
    /**
     * Success response
     */
    public static function success($data = [], $message = 'Success', $code = 200)
    {
        // Only include 'data' in the response if it is not empty
        $response = [
            'status' => true,
            'message' => $message,
        ];

        // Add 'data' to the response only if it's not empty
        if (!empty($data)) {
            $response['data'] = $data;
        }

        return response()->json($response, $code);
    }

    /**
     * Error response
     */
    public static function error($message = 'Something went wrong', $errors = [], $code = 400)
    {
        $response = [
            'status' => false,
            'message' => $message,
        ];

        // Include 'errors' only if it's not empty
        if (!empty($errors)) {
            $response['errors'] = $errors;
        }

        return response()->json($response, $code);
    }
}
