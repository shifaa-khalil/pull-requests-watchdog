<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use DateTime;
use DateInterval;

class PRController extends Controller
{
    public function pullRequests()
    {
        $fourteenDaysAgo = (new DateTime())->sub(new DateInterval('P14D'))->format('Y-m-d');

        $response = Http::withHeaders([
        'Accept' => 'application/vnd.github.v3+json',
        'Authorization' => 'Bearer ' . config('app.github_token'),
        ])->get('https://api.github.com/search/issues', [
            'q' => 'repo:woocommerce/woocommerce is:open is:pr created:<'.$fourteenDaysAgo,
            'page' => 1,
            'per_page' => 130,
        ]);

        return $response->json();
    }

    public function reviewRequiredPR()
    {
        $response = Http::withHeaders([
            'Accept' => 'application/vnd.github.v3+json',
            'Authorization' => 'Bearer ' . config('app.github_token'),
        ])->get('https://api.github.com/repos/woocommerce/woocommerce/pulls', [
            'q' => 'is%3Apr+is%3Aopen+review%3Arequired',
            'page' => 1,
            'per_page' => 130,
        ]);       
        return $response->json();
    }

    public function statusSuccessPR()
    {
        $response = Http::withHeaders([
            'Accept' => 'application/vnd.github.v3+json',
            'Authorization' => 'Bearer ' . config('app.github_token'),
            ])->get('https://api.github.com/repos/woocommerce/woocommerce/pulls', [
                'q' => 'is%3Apr+is%3Aopen+status%3Asuccess',
                'page' => 1,
                'per_page' => 130,
            ]);   
        
        return $response->json();
    }
    
    public function noReviewPR()
    {
        $response = Http::withHeaders([
            'Accept' => 'application/vnd.github.v3+json',
            'Authorization' => 'Bearer ' . config('app.github_token'),
            ])->get('https://api.github.com/repos/woocommerce/woocommerce/pulls', [
                'q' => 'is%3Apr+is%3Aopen+no%3Areview-requested',
                'page' => 1,
                'per_page' => 130,
            ]);   
        return $response->json();
    }
}

?>