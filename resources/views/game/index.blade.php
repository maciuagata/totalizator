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
            <h3 class="panel-title">Rungtynių tvarkaraštis</h3><br>
            <h3 class="panel-title">Grupių varžybos</h3>
        <table class="table table-striped">
            <thead>
            <tr>
                <td>ID</td>
                <td>Title</td>
                <td>Team 1</td>
                <td>Team 2</td>
                <td>Game start time</td>
                <td>Game end time</td>
                <td colspan="2">Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($games as $game)
                <tr>
                    <td>{{$game->id}}</td>
                    <td>{{$game->title}}</td>
                    <td>{{$game->team_1}}</td>
                    <td>{{$game->team_2}}</td>
                    <td>{{$game->game_start_time}}</td>
                    <td>{{$game->game_end_time}}</td>
                    <td><a href="{{ route('game.show',$game->id)}}" class="btn btn-primary">Eiti į spėjimus</a></td>
                    <td>
                    <td><a href="{{ route('game.edit',$game->id)}}" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form action="{{ route('game.destroy', $game->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div>
@endsection
