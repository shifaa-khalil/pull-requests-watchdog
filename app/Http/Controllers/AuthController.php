<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function redirectToGoogle()
    {
    $clientId = '494134613118-6gka7fqqvsnhtt59qrkuhs83m8l6mrfo.apps.googleusercontent.com';
    $redirectUri = 'https://accounts.google.com/o/oauth2/auth';
    $scope = 'shifaakhalil50@gmail.com';

    $authorizationUrl = 'https://accounts.google.com/o/oauth2/auth';
    $authorizationUrl .= '?client_id=' . urlencode($clientId);
    $authorizationUrl .= '&redirect_uri=' . urlencode($redirectUri);
    $authorizationUrl .= '&response_type=code';
    $authorizationUrl .= '&scope=' . urlencode($scope);

    return $authorizationUrl;
    }

}
