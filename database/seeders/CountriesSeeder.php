<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{Brand, Country};
use Illuminate\Support\Facades\Hash;


class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::create([
            'name' => "Argentina",
            'ISO'  => "AR",
            'flag' => "",
        ]);
        Country::create([
            'name' => "Bolivia",
            'ISO'  => "BO",
            'flag' => "",
        ]);
        Country::create([
            'name' => "Brazil",
            'ISO'  => "BR",
            'flag' => "",
        ]);
        Country::create([
            'name' => "Chile",
            'ISO'  => "CL",
            'flag' => "",
        ]);

        Country::create([
            'name' => "Colombia",
            'ISO'  => "CO",
            'flag' => "",
        ]);

        Country::create([
            'name' => "Ecuador",
            'ISO'  => "EC",
            'flag' => "",
        ]);

        Country::create([
            'name' => "Paraguay",
            'ISO'  => "PY",
            'flag' => "",
        ]);

        Country::create([
            'name' => "Peru",
            'ISO'  => "PE",
            'flag' => "",
        ]);

        Country::create([
            'name' => "Uruguay",
            'ISO'  => "UY",
            'flag' => "",
        ]);

        Country::create([
            'name' => "Honduras",
            'ISO'  => "HN",
            'flag' => "",
        ]);

    }
}