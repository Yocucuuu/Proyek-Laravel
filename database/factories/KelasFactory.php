<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\guru;
use App\jurusan;
use App\kelas;
use App\Model;
use App\periode_akademik;
use Faker\Generator as Faker;

$factory->define(kelas::class, function (Faker $faker) {

    $tingkat = $faker->randomElement([1,2,3]);
    $jurusan = $faker->randomElement(jurusan::all());
    $nama = $jurusan->Nama_jurusan.$faker->randomElement(["A","B","C","D"]);
    // dd($jurusan);
    return [
        'Id_periode'=>$faker->randomElement(periode_akademik::all()->pluck("Id_periode")),
        'NIG' =>$faker->randomElement(guru::all()->pluck("NIG")),
        'Nama_kelas'=>$nama,
        'Tingkat_kelas'=>$tingkat,
        'Id_jurusan'=>$jurusan->Id_jurusan,
    ];
});
