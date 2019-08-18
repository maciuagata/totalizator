<?php

namespace App\Imports;

use App\Game;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CsvImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Game([
            'title'      =>  $row["title"],
            'game_start_time'     =>  $row["game_start_time"],
            'team_1'  =>  $row['team_1'],
            'team_2'  =>  $row['team_2'],
            'game_end_time'     =>  $row["game_end_time"],
        ]);
    }
}
