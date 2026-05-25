<?php

namespace App\Http\Controllers\web;

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
        return view('connection.index');
    }

    public function store(ConnectionStoreRequest $request)
    {
        $input = $request->validated();
        ConnectionStoreAction::run($input);
        return redirect()->route('connection.index');
    }

    public function show(Connection $connection)
    {
        return view('connection.show', ['connection' => $connection]);
    }

    public function update(ConnectionUpdateRequest $request, Connection $connection) {
        $input = $request->validated();
        ConnectionUpdateAction::run($input, $connection);
        return redirect()->route('connection.index');
    }

    public function destroy(Connection $connection)
    {
        ConnectionDestroyAction::run($connection);
        return redirect()->route('connection.index');
    }
}
