<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function index() {
        $Campaigns = Campaign::all();
        // return $user;
        return view('campaigns/index', [
            'users' => $Campaigns,
            'title' => 'Campanhas'
        ]);
    }
}
