<?php

use App\riwayat_akademik;
use Illuminate\Database\Seeder;

class RiwayatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(riwayat_akademik::class,50)->create();
    }
}
