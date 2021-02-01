<?php

namespace App\Http\Controllers;

use App\jurusan;
use App\kelas;
use App\mapel;
use App\pengumuman;
use App\periode_akademik;
use App\riwayat_akademik;
use App\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    //
    public function PindahDashboardSiswa()
    {

        $pengumuman = pengumuman::all();
        return view("siswa.dashboard" , ["pengumuman"=>$pengumuman]);
    }
    public function PindahJurusan()
    {
        $Databiodata=Auth::guard('siswa')->user();
        // dd($Databiodata->Id_jurusan);
        $periodeAktif = periode_akademik::select('Id_periode')->where('Status',1)->where('Semester',2)->get();
        // dd($periodeAktif[0]);
        $kelasSiswa = kelas::select('Id_kelas')
                    ->where('Id_kelas',$Databiodata->Id_kelas)
                    ->whereIn('Id_periode',$periodeAktif[0])->get();
        // dd($kelasSiswa[0]);
        $riwayatSiswa=riwayat_akademik::where('NIS', $Databiodata->NIS)
                    ->where('Id_kelas',$kelasSiswa[0]->Id_kelas)->get();
        // dd($riwayatSiswa);
        $countRiwayat = riwayat_akademik::where('NIS', $Databiodata->NIS)
        ->where('Id_kelas',$kelasSiswa[0]->Id_kelas)->count();
        // dd($countRiwayat);
        $jurusanRekomendasi = "Tidak Ada";
        $IPA = jurusan::where("Nama_jurusan","IPA")->get();
        $IPS = jurusan::where("Nama_jurusan","IPS")->get();
        $Bahasa = jurusan::where("Nama_jurusan","Bahasa")->get();
        $mapelIPA = mapel::select("Id_mapel")->where("Id_jurusan", $IPA[0]->Id_jurusan)->get();
        $mapelIPS = mapel::select("Id_mapel")->where("Id_jurusan", $IPS[0]->Id_jurusan)->get();
        $mapelBahasa = mapel::select("Id_mapel")->where("Id_jurusan", $Bahasa[0]->Id_jurusan)->get();
        // dd($mapelIPA->Id_mapel);
        $totalRiwayatSiswaIPA = 0;
        $totalRiwayatSiswaIPA =$totalRiwayatSiswaIPA + riwayat_akademik::whereIn('Id_mapel', $mapelIPA)
                            ->where('NIS', $Databiodata->NIS)
                            ->where('Id_kelas', $Databiodata->Id_kelas)->sum('Hasil_akhir');
        $totalRiwayatSiswaIPS = 0;
        $totalRiwayatSiswaIPS =$totalRiwayatSiswaIPS + riwayat_akademik::whereIn('Id_mapel', $mapelIPS)
                            ->where('NIS', $Databiodata->NIS)
                            ->where('Id_kelas', $Databiodata->Id_kelas)->sum('Hasil_akhir');
        $totalRiwayatSiswaBHS = 0;
        $totalRiwayatSiswaBHS =$totalRiwayatSiswaBHS + riwayat_akademik::whereIn('Id_mapel', $mapelBahasa)
                            ->where('NIS', $Databiodata->NIS)
                            ->where('Id_kelas', $Databiodata->Id_kelas)->sum('Hasil_akhir');
        $countKKM=0;
        for ($i=0; $i < $countRiwayat ; $i++) {
            $countKKM = $countKKM +mapel::where('KKM','>=',$riwayatSiswa[$i]->Hasil_akhir)
                        ->where('Id_mapel',$riwayatSiswa[$i]->Id_mapel)->count();
        }
        // dd($countKKM);
        $DBJurusan = jurusan::all();
        if ($Databiodata->Id_jurusan == 4 && $countKKM<=3) {
            if ($totalRiwayatSiswaIPS > $totalRiwayatSiswaBHS && $totalRiwayatSiswaIPS > $totalRiwayatSiswaIPA) {
                $jurusanRekomendasi = "IPS";
            }
            if ($totalRiwayatSiswaIPA > $totalRiwayatSiswaBHS && $totalRiwayatSiswaIPA > $totalRiwayatSiswaIPS) {
                $jurusanRekomendasi = "IPA";
            }
            if ($totalRiwayatSiswaBHS > $totalRiwayatSiswaIPA && $totalRiwayatSiswaBHS > $totalRiwayatSiswaIPS) {
                $jurusanRekomendasi = "Bahasa";
            }

            return view("siswa.jurusan" , [
                    "jurusanRekomendasi"=>$jurusanRekomendasi,
                    "DBJurusan"=>$DBJurusan
                ]);
        }else {
            return redirect()->back();
        }

        // $CekKKM = mapel::where('KKM','>=',$riwayatSiswa[0]->Hasil_akhir)->where('Id_mapel',$riwayatSiswa[0]->Id_mapel)->count();
        // dd($CekKKM);
        // dd($countKKM);
        // $CekKKM = mapel::whereIn('KKM','>=',$riwayatSiswa[0]->Hasil_akhir)->count();


    }
    public function PindahBiodata()
    {
        $Databiodata=Auth::guard('siswa')->user();
        return view("siswa.biodata" , ["biodata"=>$Databiodata]);
    }
    public function EditBiodata()
    {
        return redirect('/biodata')->with('message', 'Hubungi TU untuk mengganti biodata');
    }
    public function LihatNilai()
    {
        $Databiodata=Auth::guard('siswa')->user();
        $dataNilaiSiswa = riwayat_akademik::with('kelas')->with('mapel')->where("NIS",$Databiodata->NIS)->get();
        //cari periode
        $DBriwayat = riwayat_akademik::select('Id_kelas')->whereIn('NIS', $Databiodata)->get();
        $DBkelas = kelas::select('Id_periode')->whereIn('Id_kelas',$DBriwayat)->get();
        // dd($DBkelas);
        $DBperiode = periode_akademik::whereIn('Id_periode',$DBkelas)->get();
        // dd($DBperiode);
        // $DBperiode = periode_akademik::


        // dd($dataNilaiSiswa[0]);
        return view("siswa.filterriwayat" , [
            "DBriwayat"=>$dataNilaiSiswa,
            "DBperiode"=>$DBperiode]);
    }

    public function FilterNilai(Request $request)
    {
        $Databiodata=Auth::guard('siswa')->user();
        // dd($Databiodata->NIS);

        // $DBriwayat = riwayat_akademik::all();

        if($request->filterajarmengajar != "none" ){
            // dd($DBkelas);
            $DBkelas = kelas::select('Id_kelas')->where('Id_periode',$request->filterajarmengajar)->where('Id_kelas',$Databiodata->Id_kelas)->get();
            // dd($DBkelas);
            $lihatNilaiSiswaFilter =riwayat_akademik::with('kelas')->with('mapel')->where('NIS', $Databiodata->NIS)->whereIn('Id_kelas',$DBkelas)->get();
            // dd($DBRiwayat);
        }
        //cari periode
        $DBriwayat = riwayat_akademik::select('Id_kelas')->whereIn('NIS', $Databiodata)->get();
        $DBkelas = kelas::select('Id_periode')->whereIn('Id_kelas',$DBriwayat)->get();
        // dd($DBkelas);
        $DBperiode = periode_akademik::whereIn('Id_periode',$DBkelas)->get();
        // dd($DBperiode);
        // $DBperiode = periode_akademik::

        // dd($dataNilaiSiswa[0]);
        return view("siswa.filterriwayat" , [
            "DBriwayat"=>$lihatNilaiSiswaFilter,
            "DBperiode"=>$DBperiode]);


    }

    public function downloadFormatSiswa()
    {
        return Storage::disk('local')->download("formatSiswa/FormatSiswa.xlsx");
    }

    public function pilihJurusan(Request $data)
    {
        $Databiodata = Auth::guard('siswa')->user();
        $jurusanDipilih = $data->input('id_jurusan');

        // $cek = $data->id_jurusan;
        // dd($cek);
        $periodeAktif = periode_akademik::where("status",1)
                        ->where("Semester", 1)->get();
        // dd($periodeAktif[0]->Id_periode);
        // $kelasRandom = kelas::where("id_jurusan" , $jurusanDipilih)->get();
        $kelasRandom = kelas::where("id_jurusan" , $jurusanDipilih)
                    ->where("id_periode", $periodeAktif[0]->Id_periode)
                    ->inRandomOrder()->first();

        // dd($kelasRandom->Id_kelas);
        $updateSiswa = siswa::find($Databiodata->NIS);
        // dd($updateSiswa);
        $updateSiswa->Id_kelas = $kelasRandom->Id_kelas;
        $updateSiswa->Id_jurusan = $data->id_jurusan;
        $updateSiswa->save();
        return redirect('/dashboardSiswa');
    }
    
}
