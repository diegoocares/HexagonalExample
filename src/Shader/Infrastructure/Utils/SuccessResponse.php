<?php

declare(strict_types=1);

namespace Src\Shader\Infrastructure\Utils;

class SuccessResponse
{
    public static function response(string $message, $data = null)
    {
        $response = [
            'success' => true,
            'message' => $message,
        ];

        if ($data) $response['data'] = $data;
        if (is_array($data)) $response['data'] = $data;
        echo json_encode($response);
    }
}