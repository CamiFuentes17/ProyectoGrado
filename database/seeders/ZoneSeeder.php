<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{Brand, Country, Zone};
use Illuminate\Support\Facades\Hash;


class ZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Zone::create([
            'name' => "HONES",
        ]);
        Zone::create([
            'name' => "COPEC",
        ]);
        Zone::create([
            'name' => "MAZ",
        ]);
        Zone::create([
            'name' => "CAC",
        ]);
    }
}