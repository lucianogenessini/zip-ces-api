<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SettlementTypeSeeder::class);
        $this->call(MunicipalitySeeder::class);
        $this->call(FederalEntitySeeder::class);
        $this->call(ZipCodeSeeder::class);
        $this->call(SettlementSeeder::class);

    }
}
