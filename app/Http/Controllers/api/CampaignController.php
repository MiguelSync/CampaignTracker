<?php

namespace App\Http\Controllers\api;

use App\Actions\Campaign\CampaignDestroyAction;
use App\Actions\Campaign\CampaignStoreAction;
use App\Actions\Campaign\CampaignUpdateAction;
use App\Actions\CampaignUser\CampaignUserStoreAction;
use App\Enum\CampaignUser\CampaignUserRoleEnum;
use App\Enum\CampaignUser\CampaignUserStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Campaign\CampaignStoreRequest;
use App\Http\Requests\Campaign\CampaignUpdateRequest;
use App\Models\Campaign;
use App\Models\User;
use DB;
use Exception;
use Throwable;

class CampaignController extends Controller
{

    public function index() {
        $campaigns = Campaign::all();
        return response()->json(['content' => $campaigns]);
    }

    public function store(CampaignStoreRequest $request, User $user) {
        try {
            DB::beginTransaction();
            $input = $request->validated();
            $campaign = CampaignStoreAction::run($input, $user);
            CampaignUserStoreAction::run([
                'user_id' => $user->id,
                'role'    => CampaignUserRoleEnum::ROLE_OWNER,
                'status'  => CampaignUserStatusEnum::STATUS_ACTIVE
            ], $campaign);
            DB::commit();
            return response()->json(['message' => 'Campanha inserida com sucesso!', 'content' => $campaign]);
        } catch (Throwable $ex) {
            return $this->handleExceptionAPI($ex);
        } catch (Exception $ex) {
            return $this->handleExceptionAPI($ex);
        }
    }

    public function show(Campaign $campaign) {
        return response()->json(['content' => $campaign]);
    }

    public function update(CampaignUpdateRequest $request, Campaign $campaign) {
        try {
            $input = $request->validated();
            CampaignUpdateAction::run($input, $campaign);
            return response()->json(['message' => 'Campanha alterada com sucesso!', 'content' => $campaign]);
        } catch (Throwable $ex) {
            return $this->handleExceptionAPI($ex);
        } catch (Exception $ex) {
            return $this->handleExceptionAPI($ex);
        }
    }

    public function destroy(Campaign $campaign) {
        try {
            CampaignDestroyAction::run($campaign);
            return response()->json(['message' => 'Campanha removida com sucesso!']);
        } catch (Throwable $ex) {
            return $this->handleExceptionAPI($ex);
        } catch (Exception $ex) {
            return $this->handleExceptionAPI($ex);
        }
    }
}