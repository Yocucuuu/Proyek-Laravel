<?php

use App\administrasi;
use App\Imports\SiswaImport;
use App\jurusan;
use App\mapel;
use App\periode_akademik;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        administrasi::create([
            "Nama_administrasi"=>"AdminDede",
            "Username_administrasi"=>"dede1",
            "No_administrasi"=>"082264551111",
            "Alamat_administrasi"=>"Surabaya",
            "Password_admin"=>Hash::make("dede1")
        ]);



        jurusan::create([
            "Nama_jurusan"=>"IPA"
        ]);
        jurusan::create([
            "Nama_jurusan"=>"IPS"
        ]);
        jurusan::create([
            "Nama_jurusan"=>"Bahasa"
        ]);
        jurusan::create([
            "Nama_jurusan"=>"Umum"
        ]);


        mapel::create([
            "Nama_mapel"=>"Matematika",
            "KKM"=>65,
            "Tingkat"=>1,
            "id_jurusan"=>4,
        ]);

        mapel::create([
            "Nama_mapel"=>"IPA",
            "KKM"=>65,
            "Tingkat"=>1,
            "id_jurusan"=>1,
        ]);

        mapel::create([
            "Nama_mapel"=>"IPA",
            "KKM"=>65,
            "Tingkat"=>2,
            "id_jurusan"=>1,
        ]);

        mapel::create([
            "Nama_mapel"=>"IPA",
            "KKM"=>65,
            "Tingkat"=>3,
            "id_jurusan"=>1,
        ]);

        mapel::create([
            "Nama_mapel"=>"IPS",
            "KKM"=>65,
            "Tingkat"=>1,
            "id_jurusan"=>2,
        ]);


        mapel::create([
            "Nama_mapel"=>"IPS",
            "KKM"=>65,
            "Tingkat"=>2,
            "id_jurusan"=>2,
        ]);


        mapel::create([
            "Nama_mapel"=>"IPS",
            "KKM"=>65,
            "Tingkat"=>3,
            "id_jurusan"=>2,
        ]);


        mapel::create([
            "Nama_mapel"=>"Bindo",
            "KKM"=>65,
            "Tingkat"=>1,
            "id_jurusan"=>3,
        ]);

        mapel::create([
            "Nama_mapel"=>"Bindo",
            "KKM"=>65,
            "Tingkat"=>2,
            "id_jurusan"=>3,
        ]);

        mapel::create([
            "Nama_mapel"=>"Bindo",
            "KKM"=>65,
            "Tingkat"=>3,
            "id_jurusan"=>3,
        ]);

        periode_akademik::create([
            "Tahun_ajaran"=>"2004",
            "Semester"=>1,
            "Status"=>1
        ]);


        // $this->call([
        //     GuruSeeder::class,
        //     KelasSeeder::class,
        //     SiswaSeeder::class,
        //     AjarSeeder::class,
        //     RiwayatSeeder::class

        // ]);
    }
}
