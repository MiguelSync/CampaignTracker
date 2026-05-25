<?php

namespace App\Http\Controllers\api;

use App\Actions\Game\GameCreateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Game\GameRequest;
use App\Models\Game;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::all();

        return response()->json(['content' => $games]);
    }

    public function store(GameRequest $request, GameCreateAction $action)
    {
        $input = $request->validated();
        $action->handle($input);
        return response()->json(['message' => 'Jogo inserido com sucesso!']);
    }

    public function show($id)
    {
        $game = Game::findOrFail($id);
        return response()->json(['content' => $game]);
    }

    public function update(GameRequest $request, $id)
    {
        $game = Game::findOrFail($id);
        $input = $request->validated();
        $game->update($input);

        return response()->json(['message' => 'Jogo alterado com sucesso!']);
    }

    public function destroy($id)
    {
        $game = Game::findOrFail($id);

        $game->delete();

        return response()->json(['message' => 'Jogo deletado com sucesso!']);
    }
    
}
