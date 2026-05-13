<?php

namespace App\Http\Controllers;

use App\Actions\Game\GameCreateAction;
use App\Http\Requests\Game\GameRequest;
use App\Models\Game;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::all();

        return view('game.index', compact('games'));
    }

    public function create()
    {
        return view('game.create');
    }

    public function store(GameRequest $request, GameCreateAction $action)
    {
        $input = $request->validated();
        $action->handle($input);
        return redirect()->route('game.index');
    }

    public function show($id)
    {
        $game = Game::findOrFail($id);

        return view('game.show', compact('game'));
    }

    public function update(GameRequest $request, $id)
    {
        $game = Game::findOrFail($id);
        $input = $request->validated();
        $game->update($input);

        return redirect()->route('game.show', $game->id);
    }

    public function destroy($id)
    {
        $game = Game::findOrFail($id);

        $game->delete();

        return redirect()->route('game.index');
    }
    
}
