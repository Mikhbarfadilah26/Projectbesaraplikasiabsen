<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

/*
|--------------------------------------------------------------------------
| IMPORT SEEDER
|--------------------------------------------------------------------------
*/

use Database\Seeders\SeederAbsensi;
use Database\Seeders\ModelLiburSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([

            /*
            |--------------------------------------------------------------------------
            | SEEDER ABSENSI LAMA
            |--------------------------------------------------------------------------
            */

            SeederAbsensi::class,

            /*
            |--------------------------------------------------------------------------
            | SEEDER LIBUR BARU
            |--------------------------------------------------------------------------
            */

            ModelLiburSeeder::class,

        ]);
    }
}