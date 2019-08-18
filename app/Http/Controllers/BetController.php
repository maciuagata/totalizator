<?php

namespace App\Http\Controllers;

use App\Bet;
use App\Game;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Redirect;

class BetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Bet $bet
     * @return \Illuminate\Http\Response
     */
    public function show(Bet $bet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Bet $bet
     * @return \Illuminate\Http\Response
     */
    public function edit(Bet $bet)
    {
        return view('bet.edit', [
            'bet' => $bet,
            'game' => Game::find($bet -> game_id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Bet $bet
     * @return \Illuminate\Http\Response
     */

    public function placeBet(Request $request)
    {

        $game = Game::find($request->get('game_id'));


        if (Carbon::now()->gte($game->game_start_time)) {
            return redirect()->back()->with('status', 'Negalima statyti!');

        }
        if (Carbon::now()->gte($game->game_end_time)) {

            return redirect()->back()->with(['status', 'Negalima statyti']);
        }


        $bet = new Bet;
        $bet->user_id = $request->get('user_id');
        $bet->team_1_bet = $request->get('team_1_bet');
        $bet->team_2_bet = $request->get('team_2_bet');
        $bet->game_id = $request->get('game_id');
        $bet->save();
        return back();

    }

    public function update(Request $request, Bet $bet)
    {
        $request->validate([
            'team_1_bet' => '',
            'team_2_bet' => '',
        ]);

        $bet->team_1_bet = $request->get('team_1_bet');
        $bet->team_2_bet = $request->get('team_2_bet');

        $bet->save();

        return back()->with('success', 'Stock has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Bet $bet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bet $bet)
    {
      //
    }
}
