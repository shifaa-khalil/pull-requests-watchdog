<?php
namespace App\Http\Controllers;

use App\Http\Controllers\PRController;
use Illuminate\Support\Facades\Http;
use Revolution\Google\Sheets\Facades\Sheets;

class GoogleSheetsController extends Controller
{

    public function addData()
    {
        $prController = new PRController();
        $response = $prController->pullRequests();
        $pullRequests = $response['items'];

        Sheets::spreadsheet(config('google.post_spreadsheet_id'))
        ->sheet('OlderThan14days')
        ->clear();

        $firstRow[] = [
            'PR #',
            'PR Title',
            'PR URL',
            'PR HTML_URL',
            'PR Created At'
        ];
        Sheets::spreadsheet(config('google.post_spreadsheet_id'))
            ->sheet('OlderThan14days')
            ->append($firstRow);

    foreach ($pullRequests as $pr) {
        $date=substr($pr['created_at'], 0, 10);
        $time=substr($pr['created_at'], 11, 8);

        $row[] = [
            $pr['number'],
            $pr['title'],
            $pr['url'],
            $pr['html_url'],
            $date.' '.$time,
        ];
        Sheets::spreadsheet(config('google.post_spreadsheet_id'))
            ->sheet('OlderThan14days')
            ->append($row);
        $row = [];
    }
    return 'Data added successfully!';
    }

    public function addReviewRequiredPR()
    {
        $prController = new PRController();
        $response = $prController->reviewRequiredPR();
        $pullRequests = $response;

        Sheets::spreadsheet(config('google.post_spreadsheet_id'))
        ->sheet('ReviewsRequired')
        ->clear();

        $firstRow[] = [
            'PR #',
            'PR Title',
            'PR URL',
            'PR HTML_URL',
            'PR Created At'
        ];
        Sheets::spreadsheet(config('google.post_spreadsheet_id'))
            ->sheet('ReviewsRequired')
            ->append($firstRow);

    foreach ($pullRequests as $pr) {
        $date=substr($pr['created_at'], 0, 10);
        $time=substr($pr['created_at'], 11, 8);

        $row[] = [
            $pr['number'],
            $pr['title'],
            $pr['url'],
            $pr['html_url'],
            $date.' '.$time
        ];
        Sheets::spreadsheet(config('google.post_spreadsheet_id'))
            ->sheet('ReviewsRequired')
            ->append($row);
        $row = [];
    }
    return 'Data added successfully!';
    }

    public function addStatusSuccessPR()
    {
        $prController = new PRController();
        $response = $prController->statusSuccessPR();
        $pullRequests = $response;

        Sheets::spreadsheet(config('google.post_spreadsheet_id'))
        ->sheet('StatusSuccess')
        ->clear();

        $firstRow[] = [
            'PR #',
            'PR Title',
            'PR URL',
            'PR HTML_URL',
            'PR Created At'
        ];
        Sheets::spreadsheet(config('google.post_spreadsheet_id'))
            ->sheet('StatusSuccess')
            ->append($firstRow);

    foreach ($pullRequests as $pr) {
        $date=substr($pr['created_at'], 0, 10);
        $time=substr($pr['created_at'], 11, 8);

        $row[] = [
            $pr['number'],
            $pr['title'],
            $pr['url'],
            $pr['html_url'],
            $date.' '.$time,
        ];
        Sheets::spreadsheet(config('google.post_spreadsheet_id'))
            ->sheet('StatusSuccess')
            ->append($row);
        $row = [];
    }
    return 'Data added successfully!';
    }

    public function addNoReviewPR()
    {
        $prController = new PRController();
        $response = $prController->noReviewPR();
        $pullRequests = $response;

        Sheets::spreadsheet(config('google.post_spreadsheet_id'))
        ->sheet('NoReviews')
        ->clear();

        $firstRow[] = [
            'PR #',
            'PR Title',
            'PR URL',
            'PR HTML_URL',
            'PR Created At'
        ];
        Sheets::spreadsheet(config('google.post_spreadsheet_id'))
            ->sheet('NoReviews')
            ->append($firstRow);

    foreach ($pullRequests as $pr) {
        $date=substr($pr['created_at'], 0, 10);
        $time=substr($pr['created_at'], 11, 8);
        $row[] = [
            $pr['number'],
            $pr['title'],
            $pr['url'],
            $pr['html_url'],
            $date.' '.$time,
        ];
        Sheets::spreadsheet(config('google.post_spreadsheet_id'))
            ->sheet('NoReviews')
            ->append($row);
        $row=[];
    }
    return 'Data added successfully!';
    }
}

