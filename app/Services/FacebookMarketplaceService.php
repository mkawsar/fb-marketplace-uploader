<?php

namespace App\Services;

use GuzzleHttp\Client;

class FacebookMarketplaceService
{
    protected $client;
    protected $pageId;
    protected $accessToken;

    public function __construct()
    {
        $this->client = new Client();
        $this->pageId = env('FACEBOOK_PAGE_ID'); // Store page ID in .env
        $this->accessToken = env('FACEBOOK_ACCESS_TOKEN'); // Store token in .env
    }

    public function listProduct($productData)
    {
        $url = "https://graph.facebook.com/v22.0/{$this->pageId}/feed";

        $response = $this->client->post($url, [
            'form_params' => [
                'message' => $productData['description'],
                'name' => $productData['title'],
                'price' => $productData['price'],
                'published' => true,
                'access_token' => $this->accessToken,
            ],
        ]);

        return json_decode($response->getBody(), true);
    }
}
