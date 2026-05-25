<?php

namespace App\Http\Controllers\api;

use App\Actions\Connection\ConnectionStoreAction;
use App\Actions\Connection\ConnectionDestroyAction;
use App\Actions\Connection\ConnectionUpdateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Connection\ConnectionStoreRequest;
use App\Http\Requests\Connection\ConnectionUpdateRequest;
use App\Models\Connection;

class ConnectionController extends Controller
{
    public function index()
    {
        $connections = Connection::all();
        return response()->json(['content' => $connections]);
    }

    public function store(ConnectionStoreRequest $request)
    {
        $input = $request->validated();
        ConnectionStoreAction::run($input);
        return response()->json(['message' => 'Conexão inserida com sucesso!']);
    }

    public function show(Connection $connection)
    {
        return response()->json(['content' => $connection]);
    }

    public function update(ConnectionUpdateRequest $request, Connection $connection) {
        $input = $request->validated();
        ConnectionUpdateAction::run($input, $connection);
        return response()->json(['message' => 'Conexão alterada com sucesso!']);
    }

    public function destroy(Connection $connection)
    {
        ConnectionDestroyAction::run($connection);
        return response()->json(['message' => 'Jogo removida com sucesso!']);
    }
}
