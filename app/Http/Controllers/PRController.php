<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;
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
        ])->get('https://api.github.com/search/issues?q=repo:woocommerce/woocommerce+is:pr+created:<'.$fourteenDaysAgo);

        // $response = Http::withHeaders([
        //     'Accept' => 'application/vnd.github.v3+json',
        //     'Authorization' => 'Bearer ' . config('app.github_token'),
        // ])->get('https://api.github.com/repos/woocommerce/woocommerce/pulls');

        return $response->json();

        // $today = new DateTime();
        // // $today = $todayObj->format('Y-m-d');

        // $array = [];

        // $pullRequests->map(function ($PR) use (&$array, $today){
        //     $date = new DateTime($PR['created_at']);
        //     // $date = $date->format('Y-m-d');
        //     $interval = $today->diff($date);
        //     $diff = $interval->days;
        //     if($diff>4) $array[] = $PR;
        // });
        // return $pullRequests;

        // Process and filter the pull request data based on your requirements
        // ...

        // Return the filtered pull request data or redirect to a view
        // ...
    }

    public function reviewRequiredPR()
    {
        $response = Http::withHeaders([
            'Accept' => 'application/vnd.github.v3+json',
            'Authorization' => 'Bearer ' . config('app.github_token'),
        ])->get('https://api.github.com/repos/woocommerce/woocommerce/pulls?q=is%3Apr+is%3Aopen+review%3Arequired');        
        $pullRequests = collect($response->json());

        return $pullRequests;
    }

    public function statusSuccessPR()
    {
        $response = Http::withHeaders([
            'Accept' => 'application/vnd.github.v3+json',
            'Authorization' => 'Bearer ' . config('app.github_token'),
        ])->get('https://api.github.com/repos/woocommerce/woocommerce/pulls?q=is%3Apr+is%3Aopen+status%3Asuccess');        
        
        $pullRequests = collect($response->json());

        return $pullRequests;
    }
    
    public function noReviewPR()
    {
        $response = Http::withHeaders([
            'Accept' => 'application/vnd.github.v3+json',
            'Authorization' => 'Bearer ' . config('app.github_token'),
        ])->get('https://api.github.com/repos/woocommerce/woocommerce/pulls?q=is%3Apr+is%3Aopen+no%3Areview-requested');

        return $response->json();
    }
}

?>