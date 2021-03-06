<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Facades\DB;
use App\Game;

class GameExport implements FromCollection, WithHeadings, WithTitle, ShouldAutoSize
{

    public function title(): string
    {
        return 'Top de juegos';
    }

    public function headings():array
    {
        return ["Juego", "Cantidad de Alquileres", "Horas alquiladas"];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Game::rightJoin('rentals', 'game_id', '=', 'games.id')
        ->select('games.name as name', DB::raw('count(*) as rental_count'), DB::raw('SUM(rentals.time_rent) as total_rent'))
        ->groupBy('games.name')
        ->orderByDesc('rental_count')
        ->orderByDesc('total_rent')
        ->get();
    }
}
