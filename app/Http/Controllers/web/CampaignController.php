<?php

namespace App\Http\Controllers\web;

use App\Actions\Campaign\CampaignDestroyAction;
use App\Actions\Campaign\CampaignStoreAction;
use App\Actions\Campaign\CampaignUpdateAction;
use App\Actions\CampaignUser\CampaignUserStoreAction;
use App\Enum\Campaign\CampaignStatusEnum;
use App\Enum\CampaignUser\CampaignUserRoleEnum;
use App\Enum\CampaignUser\CampaignUserStatusEnum;
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
        $campaigns = Campaign::latest()->paginate(20);
        return view('campaign.index', compact('campaigns'));
    }

    public function create() {
        $games = Game::all();
        return view('campaign.create', [
            'games' => $games
        ]);
    }

    public function store(CampaignStoreRequest $request) {
        try {
            DB::beginTransaction();
            $input = $request->validated();
            $campaign = CampaignStoreAction::run($input);
            CampaignUserStoreAction::run([
                'user_id' => Auth::id(),
                'role'    => CampaignUserRoleEnum::ROLE_OWNER,
                'status'  => CampaignUserStatusEnum::STATUS_ACTIVE
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
        $games = Game::all();
        
        return view('campaign.show', [
            'campaign'           => $campaign,
            'campaignStatus'     => CampaignStatusEnum::getListStatus(),
            'campaignUserStatus' => CampaignUserStatusEnum::getListStatus(),
            'campaignUserRole'   => CampaignUserRoleEnum::getListRole(),
            'games'              => $games
        ]);
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