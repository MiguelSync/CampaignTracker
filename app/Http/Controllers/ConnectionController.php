<?php

namespace App\Http\Controllers;

use App\Actions\Connection\ConnectionCreateAction;
use App\Actions\Connection\ConnectionDestroyAction;
use App\Http\Requests\Connection\ConnectionStoreRequest;
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
        ConnectionCreateAction::run($input);
        return redirect()->route('connection.index');
    }

    public function show(Connection $connection)
    {
        return view('connection.show', $connection);
    }

    public function destroy(Connection $connection)
    {
        ConnectionDestroyAction::run($connection);
        return redirect()->route('connection.index');
    }
}
