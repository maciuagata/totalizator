@extends('game.layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Edit Game
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('game.update', $game->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="name">Title:</label>
                    <input type="text" class="form-control" name="title" value={{ $game->title }} />
                </div>
                <div class="form-group">
                    <label for="status">Team 1:</label>
                    <input type="text" class="form-control" name="team_1" value={{ $game->team_1 }} />
                </div>
                <div class="form-group">
                    <label for="status">Team 2:</label>
                    <input type="text" class="form-control" name="team_2" value={{ $game->team_2 }} />
                </div>
                <div class="form-group">
                    <label for="time">Game start time:</label>
                    <input type="text" class="form-control" name="game_start_time" value={{ $game->game_start_time }} />
                </div>
                <div class="form-group">
                    <label for="time">Game end time:</label>
                    <input type="text" class="form-control" name="game_end_time" value={{ $game->game_end_time }} />
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
