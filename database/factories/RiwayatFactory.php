<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ajar_mengajar;
use App\kelas;
use App\Model;
use App\riwayat_akademik;
use App\siswa;
use Faker\Generator as Faker;

$factory->define(riwayat_akademik::class, function (Faker $faker) {

    $ajar = $faker->randomElement(ajar_mengajar::all());
    $quiz1 = $faker->numberBetween($min = 20, $max = 100);
    $quiz2 = $faker->numberBetween($min = 20, $max = 100);
    $tugas1 = $faker->numberBetween($min = 20, $max = 100);
    $tugas2 = $faker->numberBetween($min = 20, $max = 100);
    $UTS = $faker->numberBetween($min = 20, $max = 100);
    $UAS = $faker->numberBetween($min = 20, $max = 100);
    $Hasil =($quiz1+$quiz2+$tugas1+$tugas2+$UTS+$UAS)/6;
    return [
    'NIS'=>$faker->randomElement(siswa::all()->pluck("NIS")),
    'Id_ajar_mengajar'=>$ajar->Id_ajar_mengajar,
    'Id_kelas'=>$ajar->kelas->Id_kelas,
    'Id_mapel'=>$ajar->mapel->Id_mapel,
    'Quiz1'=>$quiz1,
    'Quiz2'=>$quiz2,
    'Tugas1'=>$tugas1,
    'Tugas2'=>$tugas2,
    'UTS'=>$UTS,
    'UAS'=>$UAS,
    'Sikap'=>$faker->randomElement(['a','b','c','d']),
    'Hasil_akhir'=>$Hasil
    ];
});
