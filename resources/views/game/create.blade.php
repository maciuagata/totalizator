@extends('game.layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Games
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
            <form method="post" action="{{ route('game.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="name">Title:</label>
                    <input type="text" class="form-control" name="title"/>
                </div>
                <div class="form-group">
                    <label for="status">Team 1:</label>
                    <input type="text" class="form-control" name="team_1"/>
                </div>
                <div class="form-group">
                    <label for="status">Team 2:</label>
                    <input type="text" class="form-control" name="team_2"/>
                </div>
                <div class="form-group">
                    <label for="time">Game start time:</label>
                    <input type="text" class="form-control"
                           name="game_start_time" value="2019-01-01 00:00:00"/>
                </div>
                <div class="form-group">
                    <label for="time">Game end time:</label>
                    <input type="text" class="form-control"
                           name="game_end_time" value="2019-01-01 00:00:00"/>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
@endsection
