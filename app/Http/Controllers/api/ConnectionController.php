<?php

namespace App\Http\Controllers\api;

use App\Actions\Connection\ConnectionStoreAction;
use App\Actions\Connection\ConnectionDestroyAction;
use App\Actions\Connection\ConnectionUpdateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Connection\ConnectionStoreRequest;
use App\Http\Requests\Connection\ConnectionUpdateRequest;
use App\Models\Connection;
use Exception;
use Throwable;

class ConnectionController extends Controller
{
    public function index()
    {
        $connections = Connection::all();
        return response()->json(['content' => $connections]);
    }

    public function store(ConnectionStoreRequest $request)
    {
        try {
            $input = $request->validated();
            $connection = ConnectionStoreAction::run($input);
            return response()->json(['message' => 'Conexão inserida com sucesso!', 'content' => $connection]);
        } catch (Throwable $ex) {
            return $this->handleExceptionAPI($ex);
        } catch (Exception $ex) {
            return $this->handleExceptionAPI($ex);
        }
    }

    public function show(Connection $connection)
    {
        try {
            return response()->json(['content' => $connection]);
        } catch (Throwable $ex) {
            return $this->handleExceptionAPI($ex);
        } catch (Exception $ex) {
            return $this->handleExceptionAPI($ex);
        }
    }

    public function update(ConnectionUpdateRequest $request, Connection $connection) {
        try {
            $input = $request->validated();
            ConnectionUpdateAction::run($input, $connection);
            return response()->json(['message' => 'Conexão alterada com sucesso!', 'content' => $connection]);
        } catch (Throwable $ex) {
            return $this->handleExceptionAPI($ex);
        } catch (Exception $ex) {
            return $this->handleExceptionAPI($ex);
        }
    }

    public function destroy(Connection $connection)
    {
        try {
            ConnectionDestroyAction::run($connection);
            return response()->json(['message' => 'Jogo removida com sucesso!']);
        } catch (Throwable $ex) {
            return $this->handleExceptionAPI($ex);
        } catch (Exception $ex) {
            return $this->handleExceptionAPI($ex);
        }
    }
}
