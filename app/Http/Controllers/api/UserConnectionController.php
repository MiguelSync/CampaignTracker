<?php

namespace App\Http\Controllers\api;

use App\Actions\UserConnection\UserConnectionDestroyAction;
use App\Actions\UserConnection\UserConnectionStoreAction;
use App\Actions\UserConnection\UserConnectionUpdateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserConnection\UserConnectionStoreRequest;
use App\Http\Requests\UserConnection\UserConnectionUpdateRequest;
use App\Models\UserConnection;
use Exception;
use Throwable;

class UserConnectionController extends Controller
{
    public function store(UserConnectionStoreRequest $request)
    {
        try {
            $input = $request->validated();
            $userConnection = UserConnectionStoreAction::run($input);
            return response()->json(['message' => 'Conexão adicionada com sucesso!', 'data' => $userConnection]);
        } catch (Throwable $ex) {
            return $this->handleExceptionAPI($ex);
        } catch (Exception $ex) {
            return $this->handleExceptionAPI($ex);
        }
    }

    public function update(UserConnectionUpdateRequest $request, UserConnection $userConnection) {
        try {
            $input = $request->validated();
            UserConnectionUpdateAction::run($input, $userConnection);
            return response()->json(['message' => 'Conexão atualizada com sucesso!', 'data' => $userConnection]);
        } catch (Throwable $ex) {
            return $this->handleExceptionAPI($ex);
        } catch (Exception $ex) {
            return $this->handleExceptionAPI($ex);
        }
    }

    public function destroy(UserConnection $userConnection)
    {
        try {
            UserConnectionDestroyAction::run($userConnection);
            return response()->json(['message' => 'Conexão removida com sucesso!']);
        } catch (Throwable $ex) {
            return $this->handleExceptionAPI($ex);
        } catch (Exception $ex) {
            return $this->handleExceptionAPI($ex);
        }
    }
}
