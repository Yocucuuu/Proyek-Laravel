<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\jurusan;
use App\kelas;
use App\Model;
use App\siswa;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

$factory->define(siswa::class, function (Faker $faker) {
    return [
        "Nama_siswa"=>$faker->name(),
        "Password_siswa" => Hash::make("siswa"), // default semua password e
        "Tempat_lahir_siswa"=>$faker->citySuffix(),
        "Tanggal_lahir_siswa"=>$faker->dateTimeBetween("-18 years","-17 years"),
        "Nama_ibu"=>$faker->firstNameFemale,
        "Nama_ayah"=>$faker->firstNameMale,
        "NISN"=>$faker->randomNumber($nbDigits = 9, $strict = true),
        "Agama"=>$faker->randomElement(["Kristen","Khatolik","Islam","Buddha","Hindu"]),
        "Jenis_kelamin"=>$faker->randomElement(["wanita","pria"]),
        "Email_siswa"=>$faker->email,
        "Alamat_siswa"=>$faker->address(),
        "Status"=>1,
        "Id_kelas" => $faker->randomElement(kelas::all()->pluck("Id_kelas")),
        "Id_jurusan" => $faker->randomElement(jurusan::all()->pluck("Id_jurusan")),
        "Email_siswa"=>$faker->email


    ];
});
