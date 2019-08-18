<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\Imports\CsvImport;
use Maatwebsite\Excel\Facades\Excel;

class CsvFile extends Controller
{
    function index() {
        $data = Game::latest()->paginate(10);
        return view('csv_file_pagination' , compact('data'))
            ->with('i', (request()->input('page',1)-1)*10);
    }

    public function csv_import() {

        Excel::import(new CsvImport, request()->file('file'));
        return back();
    }
}

