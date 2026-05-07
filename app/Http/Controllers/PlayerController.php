<?php

namespace App\Http\Controllers;

use App\Actions\Player\PlayerStoreAction;
use App\Http\Requests\Player\PlayerStoreRequest;
use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('player.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PlayerStoreRequest $request, PlayerStoreAction $action) 
    {
        $input = $request->validated();
        $action->handle($input);
        return redirect()->route('player.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Player $player)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Player $player)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Player $player)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Player $player)
    {
        //
    }
}
