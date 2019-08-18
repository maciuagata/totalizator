@extends('csv_file')

@section('csv_data')

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Title</th>
            <th>Game start time</th>
            <th>Team 1</th>
            <th>Team 2</th>
            <th>Game end time</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $row)
            <tr>
                <td>{{ $row->title }}</td>
                <td>{{ $row->game_start_time }}</td>
                <td>{{ $row->team_1 }}</td>
                <td>{{ $row->team_2 }}</td>
                <td>{{ $row->game_end_time }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $data->links() !!}

@endsection
