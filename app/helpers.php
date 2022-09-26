<?php

use Illuminate\Support\Facades\Http;

function createPremiumAccess($data)
{
    $url = env('SERVICE_COURSE_URL') . 'api/my-courses/premium';
    try {
        $response = Http::post($url, $data);
        $data = $response->json();
        $data['http_code'] = $response->getStatusCode();

        return $data;
    } catch (\Throwable $th) {
        return response()->json([
            'status' => 'error',
            'message' => 'service course unavailable'
        ], 500);
    }
}
