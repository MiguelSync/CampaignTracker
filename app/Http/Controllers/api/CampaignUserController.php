<?php

namespace App\Http\Controllers\api;

use App\Actions\CampaignUser\CampaignUserDestroyAction;
use App\Actions\CampaignUser\CampaignUserStoreAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\CampaignUser\CampaignUserStoreRequest;
use App\Models\Campaign;
use App\Models\CampaignUser;
use Exception;
use Throwable;

class CampaignUserController extends Controller
{

    public function store(CampaignUserStoreRequest $request, Campaign $campaign) {
        try {
            $input = $request->validated();
            CampaignUserStoreAction::run($input, $campaign);
            return response()->json(['message' => 'Player inserido com sucesso!', 'data' => $campaign]);
        } catch (Throwable $ex) {
            return $this->handleExceptionAPI($ex);
        } catch (Exception $ex) {
            return $this->handleExceptionAPI($ex);
        }
    }

    public function destroy(CampaignUser $campaignUser) {
        try {
            CampaignUserDestroyAction::run($campaignUser);
            return response()->json(['message' => 'Player removido com sucesso!']);
        } catch (Throwable $ex) {
            return $this->handleExceptionAPI($ex);
        } catch (Exception $ex) {
            return $this->handleExceptionAPI($ex);
        }
    }
}
