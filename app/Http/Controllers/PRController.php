<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PRController extends Controller
{
    public function pullRequests()
    {
        // Make a GET request to the GitHub API endpoint
        $response = Http::withHeaders([
            'Accept' => 'application/vnd.github.v3+json',
            'Authorization' => 'Bearer ' . config('app.github_token'),
        ])->get('https://api.github.com/repos/shifaa-khalil/practice/pulls');

        // Retrieve the pull request data from the response
        $pullRequests = $response->json();
        return $pullRequests;

        // Process and filter the pull request data based on your requirements
        // ...

        // Return the filtered pull request data or redirect to a view
        // ...
    }
}

?>