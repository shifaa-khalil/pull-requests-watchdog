<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;
use DateTime;

class PRController extends Controller
{
    public function pullRequests()
    {
        $response = Http::withHeaders([
            'Accept' => 'application/vnd.github.v3+json',
            'Authorization' => 'Bearer ' . config('app.github_token'),
        ])->get('https://api.github.com/repos/woocommerce/woocommerce/pulls');

        $pullRequests = collect($response->json());

        $today = new DateTime();
        // $today = $todayObj->format('Y-m-d');

        $array = [];

        $pullRequests->map(function ($PR) use (&$array, $today){
            $date = new DateTime($PR['created_at']);
            // $date = $date->format('Y-m-d');
            $interval = $today->diff($date);
            $diff = $interval->days;
            if($diff>4) $array[] = $PR;
        });
        return $array;

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
}

?>