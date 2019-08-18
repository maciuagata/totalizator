@extends('game.layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Edit Bet
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br/>
            @endif

            <table class="table table-striped">
                <thead>
                <tr>
                    <td>Team 1</td>
                    <td>Team 2</td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{$bet->team_1_bet}}</td>
                    <td>{{$bet->team_2_bet}}</td>
                </tr>
                </tbody>
            </table>
            <form method="post" action="{{ route('bet.update', $bet->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Statyti už team 1 {{$game->team_1}}
                    </button>
                    <input type="hidden" name="team_1_bet" value="{{$game->team_1}}">
                    <input type="hidden" name="team_2_bet" value="">
                </div>
            </form>
            <form method="post" action="{{ route('bet.update', $bet->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Statyti už team 2 {{$game->team_2}}
                    </button>
                    <input type="hidden" name="team_1_bet" value="">
                    <input type="hidden" name="team_2_bet" value="{{$game->team_2}}">
                </div>
            </form>
        </div>
    </div>
@endsection
