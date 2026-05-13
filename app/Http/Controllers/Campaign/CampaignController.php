<?php

namespace App\Http\Controllers\Campaign;

use App\Actions\Campaign\CampaignStoreAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Campaign\CampaignStoreRequest;
use App\Models\Campaign;
use Illuminate\Http\Request;

class CampaignController extends Controller
{

    public function index() {
        return view('campaign.index');
    }

    public function create() {
        return view('campaign.create');
    }

    public function store(CampaignStoreRequest $request){
        $input = $request->validated();
        CampaignStoreAction::run($input);
        return redirect()->route('campaign.index');
    }

    public function show(Campaign $campaign) {
        return view('campaign.show', [
            'campaign' => $campaign
        ]);
    }
}