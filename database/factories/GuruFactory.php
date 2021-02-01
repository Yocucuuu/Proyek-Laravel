<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\guru;
use App\Model;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

$factory->define(guru::class, function (Faker $faker) {
    return [
    'Nama_guru'=>$faker->name(),
    'Password_guru'=>Hash::make("guru"),
    'No_hp_guru'=>$faker->tollFreePhoneNumber(),
    'Alamat_guru'=>$faker->address(),
    'Status_guru'=>1
    ];
});
