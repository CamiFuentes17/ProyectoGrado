<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{RequisitionStatu};


class AppSeeder extends Seeder
{

    public function run()
    {
        RequisitionStatu::create([
            'id'   => 1,
            'name' => "Generado",
        ]);
        RequisitionStatu::create([
            'id'   => 2,
            'name' => "Pendiente Aprobación",
        ]);
        RequisitionStatu::create([
            'id'   => 3,
            'name' => "Aprobado",
        ]);               
        RequisitionStatu::create([
            'id'   => 4,
            'name' => "Cancelado",
        ]);

    }
}
