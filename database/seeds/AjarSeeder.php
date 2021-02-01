<?php

use App\ajar_mengajar;
use Illuminate\Database\Seeder;

class AjarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ajar_mengajar::class,50)->create();
    }
}
