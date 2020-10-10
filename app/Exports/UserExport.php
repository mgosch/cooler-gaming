<?php

namespace App\Exports;

use App\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserExport implements FromCollection, WithHeadings
{

    public function headings():array
    {
        return ["Usuario", "Cantidad de Alquileres", "Horas alquiladas"];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::rightJoin('rentals', 'user_id', '=', 'users.id')
                    ->select('users.name as name', DB::raw('count(*) as rental_count'), DB::raw('SUM(rentals.time_rent) as total_rent'))
                    ->groupBy('users.name')
                    ->orderByDesc('rental_count')
                    ->orderByDesc('total_rent')
                    ->get();
    }
}
