<?php

namespace App\Http\Controllers;

use App\Bet;
use App\Game;
use Auth;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('game.index', [
            'games' => Game::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('game.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required',
            'team_1' => 'required',
            'team_2' => 'required',
            'game_start_time' => 'required',
            'game_end_time' => 'required',
        ]);

        $game = new Game();
        $game->fill($validate);

        $game->save();
        return redirect('/game')->with('success', 'Stock has been added');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Game $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        $bets = Bet::all();
        return view('game.show', [
            'game' => $game,
            'bets' => $bets,
            'user' => Auth::user(),
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Game $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {

        return view('game.edit', [
            'game' => $game,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Game $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {

        $request->validate([
            'title' => 'required',
            'team_1' => 'required',
            'team_2' => 'required',
            'game_start_time' => 'required',
            'game_end_time' => 'required',
        ]);

        $game->title = $request->get('title');
        $game->team_1 = $request->get('team_1');
        $game->team_2 = $request->get('team_2');
        $game->game_start_time = $request->get('game_start_time');
        $game->game_end_time = $request->get('game_end_time');
        $game->save();

        return redirect('/game')->with('success', 'Stock has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Game $game
     * @return \Illuminate\Http\Response
     */

    public function destroy(Game $game)
    {
        $game->delete();

        return redirect('/game')->with('success', 'Stock has been deleted Successfully');

    }
}
