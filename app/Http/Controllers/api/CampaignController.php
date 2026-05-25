<?php

namespace App\Http\Controllers\api;

use App\Actions\Campaign\CampaignDestroyAction;
use App\Actions\Campaign\CampaignStoreAction;
use App\Actions\Campaign\CampaignUpdateAction;
use App\Actions\CampaignUser\CampaignUserStoreAction;
use App\Enum\CampaignEnum;
use App\Enum\CampaignUserEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Campaign\CampaignStoreRequest;
use App\Http\Requests\Campaign\CampaignUpdateRequest;
use App\Models\Campaign;
use App\Models\Game;
use Auth;
use DB;
use Exception;
use Throwable;

class CampaignController extends Controller
{

    public function index() {
        $campaigns = Campaign::all();
        return response()->json(['content' => $campaigns]);
    }

    public function create() {
        $games = Game::all();
        return response()->json(['message' => 'Campanha inserida com sucesso!']);
    }

    public function store(CampaignStoreRequest $request) {
        try {
            DB::beginTransaction();
            $input = $request->validated();
            $campaign = CampaignStoreAction::run($input);
            CampaignUserStoreAction::run([
                'user_id' => Auth::id(),
                'role'    => CampaignUserEnum::ROLE_OWNER,
                'status'  => CampaignUserEnum::STATUS_ACTIVE
            ], $campaign);
            DB::commit();
            return redirect()->route('campaign.index');
        } catch (Throwable $ex) {
            return $this->handleExceptionBackWithErrors($ex);
        } catch (Exception $ex) {
            return $this->handleExceptionBackWithErrors($ex);
        }
    }

    public function show(Campaign $campaign) {
        return response()->json(['content' => $campaign]);
    }

    public function update(CampaignUpdateRequest $request, Campaign $campaign) {
        try {
            $input = $request->validated();
            CampaignUpdateAction::run($input, $campaign);
            return redirect()->back();
        } catch (Throwable $ex) {
            return $this->handleExceptionBackWithErrors($ex);
        } catch (Exception $ex) {
            return $this->handleExceptionBackWithErrors($ex);
        }
    }

    public function destroy(Campaign $campaign) {
        try {
            CampaignDestroyAction::run($campaign);
            return redirect()->route('campaign.index');
        } catch (Throwable $ex) {
            return $this->handleExceptionBackWithErrors($ex);
        } catch (Exception $ex) {
            return $this->handleExceptionBackWithErrors($ex);
        }
    }
}