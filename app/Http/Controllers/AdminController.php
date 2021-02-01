<?php

namespace App\Http\Controllers;

use App\ajar_mengajar;
use App\guru;
use App\jurusan;
use App\kelas;
use App\mapel;
use App\pengumuman;
use App\periode_akademik;
use App\riwayat_akademik;
use App\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{

    public function toHome(Request $request)
    {
        $pengumuman = pengumuman::all();

        return view("adminlte.index" , [
            "pengumuman"=>$pengumuman,
            // "fileToa"=>$myPenting
            ]);
    }

    public function PindahDashboard()
    {
        $pengumuman = pengumuman::all();
        return view("adminlte.index" , ["pengumuman"=>$pengumuman]);
    }

    public function pindahPengumuman(Request $data)
    {
        // $sessionAdmin= Auth::guard('admin');

        // dd($sessionAdmin);

        // $penToa = $data->session()->get("loggedAdmin");
        // dd($penToa);
        $daftarToa = pengumuman::all();
        return view("adminlte.FormPengumuman",[
            "daftarToa"=>$daftarToa
        ]);
    }

    public function pindahSiswa()
    {
        $daftarSiswa = siswa::all();
        $DBkelas = kelas::all();
        $DBJurusan = jurusan::all();
        return view("adminlte.formSiswa",[
            "daftarSiswa"=>$daftarSiswa,
            "DBkelas"=>$DBkelas,
            "DBJurusan"=>$DBJurusan
        ]);
    }

    public function pindahGuru()
    {
        $daftarGuru = guru::all();
        return view("adminlte.formGuru",[
            "daftarGuru"=>$daftarGuru
        ]);
    }

    public function pindahKelas()
    {
        $daftarKelas = kelas::all();
        $DBPeriode = periode_akademik::where("Status",1)->get();
        $GuruAktif = guru::where("Status_guru",1)->get();
        $DBJurusan = jurusan::all();
        return view("adminlte.formKelas",[
            "daftarKelas"=>$daftarKelas,
            "DBPeriode"=>$DBPeriode,
            "Guru"=>$GuruAktif,
            "jurusan"=>$DBJurusan
        ]);
    }

    public function pindahMatPel()
    {
        $daftarMatPel = mapel::all();
        $DBJurusan = jurusan::all();
        return view("adminlte.formMatPel",[
            "daftarMatPel"=>$daftarMatPel,
            "jurusan"=>$DBJurusan
        ]);
    }

    public function pindahRiwayat()
    {
        $DBriwayat = riwayat_akademik::all();
        $DBsiswa = siswa::all();
        $DBkelas = kelas::all();
        $DBmapel = mapel::all();
        $DBAjar_mengajar = ajar_mengajar::all();
        return view("adminlte.formRiwayat",[
            "DBAjar_mengajar"=>$DBAjar_mengajar,
            "DBriwayat"=>$DBriwayat,
            "DBsiswa"=>$DBsiswa,
            "DBkelas"=>$DBkelas,
            "DBmapel"=>$DBmapel
        ]);
    }



    public function pindahJadwal()
    {
        $DBJadwal = ajar_mengajar::all();
        $GuruAktif = guru::where("Status_guru",1)->get();
        $Mapel = mapel::all();
        $kelas = kelas::all();
        return view("adminlte.jadwal",[
            "Jadwal"=>$DBJadwal,
            "Guru"=>$GuruAktif,
            "Mapel"=>$Mapel,
            "kelas"=>$kelas]);
    }

    public function pindahPerodAkademik()
    {
        $daftarPerodAkademik = periode_akademik::all();
        return view("adminlte.formPeriodeAkademik",[
            "daftarPerodAkademik"=>$daftarPerodAkademik
        ]);

    }

    public function PindahSiswaAktif()
    {
        $DBsiswa=siswa::where('status', 1)->get();
        return view("adminlte.formSiswaAktif",[
            "DBsiswa"=>$DBsiswa
        ]);

    }

    public function NaikKelas(Request $data)
    {
        $DBsiswa=siswa::where('status', 1)->get();
        $countDBsiswa = siswa::where('status', 1)->count();
        $periodeAktif = periode_akademik::select('Id_periode')->where('Status',1)->where('Semester',2)->get();

        for ($i=0; $i <$countDBsiswa ; $i++) {
            $kelasSiswa = kelas::select('Id_kelas')
                    ->where('Id_kelas',$DBsiswa[$i]->Id_kelas)
                    ->whereIn('Id_periode',$periodeAktif[0])->get();
            $riwayatSiswa=riwayat_akademik::where('NIS', $DBsiswa[$i]->NIS)
                    ->where('Id_kelas',$kelasSiswa[0]->Id_kelas)->get();
            $countRiwayat = riwayat_akademik::where('NIS', $DBsiswa[$i]->NIS)
                    ->where('Id_kelas',$kelasSiswa[0]->Id_kelas)->count();
            $countKKM=0;
            for ($j=0; $j < $countRiwayat ; $j++) {
                $countKKM = $countKKM +mapel::where('KKM','>=',$riwayatSiswa[$j]->Hasil_akhir)
                            ->where('Id_mapel',$riwayatSiswa[$j]->Id_mapel)->count();
            }

            // echo($kelasSiswa[0]->Id_kelas);
            // echo("<br>");
            // echo($DBsiswa[$i]->NIS . " - " . $DBsiswa[$i]->Nama_siswa . " - kelas:" .
            // $DBsiswa[$i]->Id_kelas. " -  gk lulus:" . $countKKM . " - Tingkat : " . $DBsiswa[$i]->kelas->Tingkat_kelas);
            // echo("<br>");
            // echo();
            // dd($DBsiswa[$i]->jurusan);
            if ($countKKM<=3 && $DBsiswa[$i]->kelas->Tingkat_kelas == 2) {
                if ($DBsiswa[$i]->Id_jurusan == 3) {
                    $siswa = siswa::find($DBsiswa[$i]->NIS);
                    // dd($siswa);
                    $periodeGanjilAktif = periode_akademik::select('Id_periode')->where('Status',1)->where('Semester',1)->get();
                    // dd($periodeGanjilAktif[0]->Id_periode);
                    $updateKelas = kelas::where("id_jurusan" , 3)
                                    ->where("id_periode", $periodeGanjilAktif[0]->Id_periode)
                                    ->inRandomOrder()->first();
                    // dd($updateKelas->Id_kelas);
                    $siswa->Id_kelas = $updateKelas->Id_kelas;
                    $siswa->save();
                }else if ($DBsiswa[$i]->Id_jurusan == 2) {
                    $siswa = siswa::find($DBsiswa[$i]->NIS);

                    $periodeGanjilAktif = periode_akademik::select('Id_periode')->where('Status',1)->where('Semester',1)->get();
                    // dd($periodeGanjilAktif[0]->Id_periode);
                    $updateKelas = kelas::where('Id_periode',$periodeGanjilAktif[0]->Id_periode)
                                    ->where('Id_jurusan', 2)
                                    ->where("Tingkat_kelas",3)->get();
                    // dd($updateKelas);
                    $siswa->Id_kelas = $updateKelas->Id_kelas;
                    $siswa->save();
                }else if($DBsiswa[$i]->Id_jurusan == 1){
                    $siswa = siswa::find($DBsiswa[$i]->NIS);
                    $periodeGanjilAktif = periode_akademik::select('Id_periode')->where('Status',1)->where('Semester',1)->get();
                    // dd($periodeGanjilAktif[0]->Id_periode);
                    $updateKelas = kelas::where('Id_periode',$periodeGanjilAktif[0]->Id_periode)
                                    ->where('Id_jurusan', 1)
                                    ->where("Tingkat_kelas",3)->get();
                    // dd($updateKelas);
                    $siswa->Id_kelas = $updateKelas->Id_kelas;
                    $siswa->save();
                }
            }
            if ($countKKM<=3 && $DBsiswa[$i]->kelas->Tingkat_kelas == 3) {
                if ($DBsiswa[$i]->Id_jurusan == 3) {
                    $siswa = siswa::find($DBsiswa[$i]->NIS);
                    $siswa->Status = 0;
                    $siswa->save();
                }else if ($DBsiswa[$i]->Id_jurusan == 2) {
                    $siswa = siswa::find($DBsiswa[$i]->NIS);
                    $siswa->Status = 0;
                    $siswa->save();
                }else if($DBsiswa[$i]->Id_jurusan == 1){
                    $siswa = siswa::find($DBsiswa[$i]->NIS);
                    $siswa->Status = 0;
                    $siswa->save();
                }
            }
        }

        return redirect("/homeAdmin");
        // dd($DBsiswa);


        // dd($kelasSiswa[0]);
        // $riwayatSiswa=riwayat_akademik::whereIn('NIS', $DBsiswa->NIS)
        //             ->where('Id_kelas',$kelasSiswa[0]->Id_kelas)->get();
        // // dd($riwayatSiswa);
        // $countRiwayat = riwayat_akademik::whereIn('NIS', $DBsiswa->NIS)
        // ->where('Id_kelas',$kelasSiswa[0]->Id_kelas)->count();

        // $countRiwayat = riwayat_akademik::whereIn('NIS', $DBsiswa->NIS)
        // ->where('Id_kelas',$kelasSiswa[0]->Id_kelas)->count();


        // return view('adminlte.coba',[
        //     'DBsiswa'=>$DBsiswa
        // ]);
    }

    public function cetakAbsensi($kelas)
    {
        $siswaKelas = siswa::where('Id_kelas',$kelas)->get();
        $kelasAbsensi = kelas::where('Id_kelas', $kelas)->first();
        // dd($kelasAbsensi);
        return view('adminlte.cetakAbsensi',[
            "siswaKelas"=>$siswaKelas,
            "kelasAbsensi"=>$kelasAbsensi]);
    }
}
