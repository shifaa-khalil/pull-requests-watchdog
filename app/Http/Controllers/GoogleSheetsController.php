<?php
namespace App\Http\Controllers;

use App\Http\Controllers\PRController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Revolution\Google\Sheets\Facades\Sheets;
use Illuminate\Support\Facades\Session;
use Google\Client as Google_Client;
use Google\Service\Sheets as Google_Service_Sheets;

class GoogleSheetsController extends Controller
{
    public function getDataFromGoogleSheet()
    {

        $response = Sheets::spreadsheet(config('google.post_spreadsheet_id'))
        ->sheet('Sheet1')
        ->all();

        return $response;
    }

    public function addData(Request $request)
    {
        $prController = new PRController();
        $response = $prController->pullRequests();
        $pullRequests = $response['items'];

        Sheets::spreadsheet(config('google.post_spreadsheet_id'))
        ->sheet('Sheet1')
        ->clear();

        $firstRow[] = [
            'PR #',
            'PR Title',
            'PR URL',
            'PR HTML_URL',
            'PR Created At'
        ];
        Sheets::spreadsheet(config('google.post_spreadsheet_id'))
            ->sheet('Sheet1')
            ->append($firstRow);

    foreach ($pullRequests as $pr) {
        $row[] = [
            $pr['title'],
            $pr['number'],
            $pr['url'],
            $pr['html_url'],
            $pr['created_at'],
        ];
        Sheets::spreadsheet(config('google.post_spreadsheet_id'))
            ->sheet('Sheet1')
            ->append($row);
    }

    return $pullRequests;
    }

    public function authorize($ability, $arguments = [])
    {
        $redirectUri = route('google-sheets.callback');
        
        $scopes = [
            \Google_Service_Sheets::SPREADSHEETS_READONLY,
            \Google_Service_Drive::DRIVE_READONLY,
        ];

        $authorizationUrl = Sheets::getClient()->createAuthUrl($redirectUri, $scopes);

        return redirect($authorizationUrl);
    }

    public function handleCallback(Request $request)
{
    $authorizationCode = $request->get('code');

    $tokens = Sheets::getClient()->fetchAccessTokenWithAuthCode($authorizationCode);

$access_token = $tokens['access_token'];
$refresh_token = $tokens['refresh_token'];
$expires_in = $tokens['expires_in'];
$created = time(); // Current timestamp

session()->put('google_access_token', $access_token);
session()->put('google_refresh_token', $refresh_token);
session()->put('google_expires_in', $expires_in);
session()->put('google_created', $created);

    // Open the Google Sheet in a new tab/window
    $sheetId = '1JBUKT2c3k2L-Tr9bAvqgnWhwLv2AT3VCfqlBbG90SuA';
    $url = "https://docs.google.com/spreadsheets/d/{$sheetId}";
    echo "<script>window.open('{$url}', '_blank');</script>";
}



}

