<?php

namespace App\Services;

use GuzzleHttp\Client;

class GeocodingService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function getAddressFromCoordinates($latitude, $longitude)
    {
        // Construct the URL for reverse geocoding
        $url = "https://nominatim.openstreetmap.org/reverse?format=json&lat={$latitude}&lon={$longitude}&zoom=18&addressdetails=1";

        try {
            // Make the GET request using Guzzle, providing the SSL certificate
            $response = $this->client->get($url, [
                'verify' => storage_path('certificates/cacert.pem'),  // Path to the certificate
            ]);

            // Parse the JSON response
            $data = json_decode($response->getBody(), true);

            // Return the address from the response
            return $data['display_name'] ?? null;
        } catch (\Exception $e) {
            // Log any errors
//            \Log::error('Geocoding Error: ' . $e->getMessage());
            return null;
        }
    }

}
