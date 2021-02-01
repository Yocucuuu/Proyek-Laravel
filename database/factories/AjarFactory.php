<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ajar_mengajar;
use App\guru;
use App\kelas;
use App\mapel;
use App\Model;
use Faker\Generator as Faker;

$factory->define(ajar_mengajar::class, function (Faker $faker) {
    return [
        'Id_kelas'=>$faker->randomElement(kelas::all()->pluck("Id_kelas")),
        'Id_mapel'=>$faker->randomElement(mapel::all()->pluck("Id_mapel")),
        'NIG'=>$faker->randomElement(guru::all()->pluck("NIG")),
        'Jam_berakhir'=>"09:00:00",
        'Jam_dimulai'=>"08:00:00",
        'jam_belajar'=>"01:00:00",
        'hari'=>$faker->randomElement(['senin','selasa','rabu','kamis','jumat']),
        'Status_jadwal'=>1
    ];
});
