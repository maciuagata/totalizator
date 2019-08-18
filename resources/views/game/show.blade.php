@extends('game.layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="uper">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br/>
        @endif
        <h3 class="panel-title">Spėjimai</h3>

        @if (session('status'))
            <div class="alert alert-danger">
                {{ session('status') }}
            </div>
        @endif

        <table class="table table-striped">
            <thead>
            <tr>
                <td>ID</td>
                <td>Team 1</td>
                <td>Team 2</td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$game->id}}</td>
                <td>{{$game->team_1}}</td>
                <td>{{$game->team_2}}</td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <form method="post" action="{{ action('BetController@placeBet') }}" accept-charset="UTF-8">
                        @csrf
                        <button type="submit" class="btn btn-primary" value="{{$game->team_1}}">Statyti už team 1
                        </button>
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                            <input type="hidden" name="team_1_bet" value="{{$game->team_1}}">
                            <input type="hidden" name="game_id" value="{{$game->id}}">

                        <table class="table table-striped">
                            <tbody>
                            @foreach($bets as $bet)
                                @if ($bet -> team_1_bet)
                                    <tr>
                                        <td>{{$bet->id}}</td>
                                        <td>{{$bet->team_1_bet}}</td>
                                        <td><a href="{{ route('bet.edit',$bet->id)}}" class="btn btn-primary">Edit</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </form>
                </td>

                <td>
                    <form method="post" action="{{ action('BetController@placeBet') }}" accept-charset="UTF-8">
                        @csrf
                        <button type="submit" class="btn btn-primary" value=" {{$game->team_2}}">Statyti už team 2
                        </button>
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                        <input type="hidden" name="team_2_bet" value="{{$game->team_2}}">
                        <input type="hidden" name="game_id" value="{{$game->id}}">

                        <table class="table table-striped">
                            <tbody>
                            @if (\Carbon\Carbon::now()->lte($game->game_start_time) and \Carbon\Carbon::now()->lte($game->game_end_time))
                                @foreach($bets as $bet)
                                    @if ($bet -> team_2_bet)
                                        <tr>
                                            <td>{{$bet->id}}</td>
                                            <td>{{$bet->team_2_bet}}</td>
                                            <td><a href="{{ route('bet.edit',$bet->id)}}"
                                                   class="btn btn-primary">Edit</a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </form>
                </td>
            </tr>
            </tbody>
        </table>

    </div>
@endsection
