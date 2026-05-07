<?php

namespace App\Http\Controllers;

use App\Actions\Campaign\CampaignStoreAction;
use App\Http\Requests\Campaign\CampaignStoreRequest;
use App\Models\Campaign;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function store(CampaignStoreRequest $request, CampaignStoreAction $action){
        $input = $request->validated();
        $action->handle($input);
        return redirect()->back();
    }
}