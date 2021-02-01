<?php

namespace App\Http\Controllers;

use App\ajar_mengajar;
use App\guru;
use App\history_edit;
use App\Imports\SiswaImport;
use App\jurusan;
use App\kelas;
use App\Mail\NewSiswaMail;
use App\Mail\TestMail;
use App\mapel;
use App\pengumuman;
use App\periode_akademik;
use App\riwayat_akademik;
use App\Rules\batasannilai;
use App\siswa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class Database extends Controller
{
    public function kefilterSiswa(){
        $daftarSiswa = siswa::all();
        $DBkelas = kelas::all();
        $DBJurusan = jurusan::all();
        return view("adminlte.filtersiswa",[
            "daftarSiswa"=>$daftarSiswa,
            "DBkelas"=>$DBkelas,
            "DBJurusan"=>$DBJurusan
        ]);
    }
    public function filterSiswa(Request $request){
        if($request->filterkelas == "none"){
            if($request->filterjurusan == "none"){
                $daftarSiswa = siswa::all();
            }
            else{
                $daftarSiswa = siswa::where("Id_jurusan",$request->filterjurusan)->get();
            }
        }
        else{
            if($request->filterjurusan == "none"){
                $daftarSiswa = siswa::where("Id_kelas",$request->filterkelas)->get();
            }
            else{
                $daftarSiswa = siswa::where("Id_kelas",$request->filterkelas)->where("Id_jurusan",$request->filterjurusan)->get();
            }
        }

        if($request->nama != ""){
            $daftarSiswa = siswa::where("Nama_siswa",$request->nama)->get();
        }
        if($request->nama != "" && $request->filterjurusan != "none"){
            $daftarSiswa = siswa::where("Nama_siswa",$request->nama)->where("Id_jurusan",$request->filterjurusan)->get();
        }
        if($request->nama != "" && $request->filterkelas != "none"){
            $daftarSiswa = siswa::where("Nama_siswa",$request->nama)->where("Id_kelas",$request->filterkelas)->get();
        }
        if($request->nama != "" && $request->filterkelas != "none" && $request->filterjurusan != "none"){
            $daftarSiswa = siswa::where("Nama_siswa",$request->nama)->where("Id_jurusan",$request->filterjurusan)->where("Id_kelas",$request->filterkelas)->get();
        }

        $DBkelas = kelas::all();
        $DBJurusan = jurusan::all();
        return view("adminlte.filtersiswa",[
            "daftarSiswa"=>$daftarSiswa,
            "DBkelas"=>$DBkelas,
            "DBJurusan"=>$DBJurusan
        ]);
    }

    public function updateSiswa(Request $request)
    {
        // dd($request->all());
        $siswa = siswa::find($request->NIS);
        $siswa->NISN = $request->NISN;
        $siswa->Id_kelas = $request->Id_kelas;
        $siswa->Id_jurusan = $request->Id_jurusan;
        $siswa->Nama_siswa = $request->nama;

        $siswa->Password_siswa = Hash::make( $request->password);
        // $siswa->Password_siswa = $request->password;
        $siswa->Tempat_lahir_siswa = $request->tempatLahir;
        $siswa->Tanggal_lahir_siswa = $request->tanggalLahir;
        $siswa->Nama_ibu = $request->namaIbu;
        $siswa->Nama_ayah = $request->namaAyah;
        $siswa->Email_siswa = $request->email;
        $siswa->agama = $request->agama;
        $siswa->Jenis_kelamin = $request->jenisKelamin;
        $siswa->Alamat_Siswa = $request->alamat;
        $siswa->Email_siswa = $request->email;
        $siswa->save();

        // Mail::to($request->email)->send(new NewSiswaMail($request->NIS , $request->password));


        return redirect('/siswa');
    }

    public function deleteSiswa($id)
    {
        $siswa = siswa::find($id);
        $siswa->delete();
        return redirect("/siswa");
    }

    public function toUpdateSiswa($id)
    {
        $siswa  = siswa::find($id);
        Session::put("siswa",$siswa);
        $optionkelas = kelas::all();
        Session::put("optionkelas",$optionkelas);
        $optionjurusan = jurusan::all();
        Session::put("optionjurusan",$optionjurusan);
        return view('adminlte.editSiswa',["siswa"=>$siswa]);
    }


    public function selectSiswa(Request $data)
    {
        // dd($data->all());
        $data->validate([
            "nisn" => "required|numeric",
            "nama" => "required",
            "pw" => "required",
            "tmptLahir" => "required|alpha",
            "tglLahir" => "required",
            "NameMom" => "required",
            "NameDad" => "required",
            "alamat" => "required",
            "email" => "required|email",
            "kelas" => "required",
            "jurusan" => "required",
        ]);

        if ($data->has("Insert")) {

            siswa::create(
                [
                    "Nama_siswa"=>$data->input("nama"),
                    "Password_siswa"=>Hash::make( $data->input("pw")),
                    "Tempat_lahir_siswa"=>$data->input("tmptLahir"),
                    "Tanggal_lahir_siswa"=>$data->input("tglLahir"),
                    "Nama_ibu"=>$data->input("NameMom"),
                    "Nama_ayah"=>$data->input("NameDad"),
                    "Status"=>$data->input("status"),
                    "Email_siswa" =>$data->input("email"),
                    "NISN"=>$data->input("nisn"),
                    "Agama"=>$data->input("agama"),
                    "Jenis_kelamin"=>$data->input("jk"),
                    "Alamat_siswa"=>$data->input("alamat"),
                    "Id_kelas" => $data->input("kelas"),
                    "Id_jurusan" =>$data->input("jurusan")
                ]
            );

            // Mail::to("yoshua_d18@mhs.stts.edu")->send(new TestMail());
            // dd(siswa::latest("NIS")->first()->Email_siswa);
            // Mail::to(siswa::latest("NIS")->first()->Email_siswa)->send(new NewSiswaMail(siswa::latest("NIS")->first()->NIS , $data->pw));



            return redirect("/siswa");
        }

        if ($data->has("Update")) {
            $tempnis = siswa::find($data->input("nis"));
            $tempnis->Nama_siswa = $data->input("nama");
            $tempnis->Password_siswa =Hash::make($data->input("pw"));
            $tempnis->Tempat_lahir_siswa = $data->input("tmptLahir");
            $tempnis->Tanggal_lahir_siswa = $data->input("tglLahir");
            $tempnis->Nama_ibu = $data->input("NameMom");
            $tempnis->Nama_ayah = $data->input("NameDad");
            $tempnis->Alamat_siswa = $data->input("alamat");
            $tempnis->Agama = $data->input("agama");
            $tempnis->Jenis_kelamin = $data->input("jk");
            $tempnis->Status = $data->input("status");
            $tempnis->Id_kelas = $data->input("kelas");
            $tempnis->Id_jurusan = $data->input("jurusan");
            $tempnis->save();
        }
        if ($data->has("Delete")) {
            $valueDelete = $data->input("Delete");
            siswa::where('NIS', '=' , $valueDelete)->delete();
        }

        $daftarSiswa = siswa::all();
        foreach($daftarSiswa as $siswas){
            $siswas->Password_siswa = Hash::make($siswas->Password_siswa);
        }
        return redirect("/siswa")->with('daftarsiswa', $daftarSiswa);
    }

    public function kefilterGuru(){
        $daftarGuru = guru::all();
        return view("adminlte.filterguru",[
            "daftarGuru"=>$daftarGuru
        ]);
    }

    public function filterGuru(Request $request){
        if($request->filterstatus == "none"){
            $daftarGuru = guru::all();
        }
        else{
            $daftarGuru = guru::where("Status_guru",$request->filterstatus)->get();
        }

        if($request->nama != ""){
            $daftarGuru = guru::where("Nama_guru",$request->nama)->get();
        }

        return view("adminlte.filterguru",[
            "daftarGuru"=>$daftarGuru
        ]);
    }

    public function updateGuru(Request $request)
    {
        $guru = guru::find($request->NIG);
        $guru->Nama_guru = $request->nama;
        $guru->Password_guru = Hash::make( $request->password);
        $guru->No_hp_guru = $request->notelp;
        $guru->Alamat_guru = $request->alamat;
        $guru->Status_guru = $request->status;
        $guru->save();
        return redirect('/guru');
    }

    public function deleteGuru($id)
    {
        $guru = guru::find($id);
        $guru->delete();
        return redirect("/guru");
    }

    public function toUpdateGuru($id)
    {
        $guru  = guru::find($id);
        Session::put("guru",$guru);
        return view('adminlte.editGuru',["guru"=>$guru]);
    }

    public function selectGuru(Request $data)
    {
        $data->validate([
            "nama" => "required",
            "pw" => "required",
            "notelp" => "required",
            "alamat" => "required",
            "status" => "required"
        ]);

        // dd($data->all());
        if ($data->has("Insert")) {

            guru::create(
                [
                    "Nama_guru"=>$data->input("nama"),
                    "Password_guru"=>Hash::make($data->input("pw")),
                    "No_hp_guru"=>$data->input("notelp"),
                    "Alamat_guru"=>$data->input("alamat"),
                    "Status_guru"=>$data->input("status")
                ]
            );

            $guru = new guru;
            $guru->Nama_guru = $data->nama;
            $guru->Password_guru = Hash::make( $data->pw);
            $guru->No_hp_guru = $data->notelp;
            $guru->Alamat_guru = $data->alamat;
            $guru->Status_guru = $data->status;
            $guru->save();

        }
        if ($data->has("Update")) {
            $tempnig = guru::find($data->input("nig"));
            $tempnig->Nama_guru = $data->input("nama");
            $tempnig->Password_guru = Hash::make($data->input("pw"));
            $tempnig->No_guru = $data->input("notelp");
            $tempnig->Alamat_guru = $data->input("alamat");
            $tempnig->Status_guru = $data->input("status");
            $tempnig->save();
        }
        if ($data->has("Delete")) {
            $valueDelete = $data->input("Delete");
            guru::where('NIG', '=', $valueDelete)->delete();
        }
        $daftarGuru = guru::all();
        $daftarGuru = siswa::all();
        foreach($daftarGuru as $gurus){
            $gurus->Password_guru = Hash::make($gurus->Password_guru);
        }
        return redirect("/guru")->with('daftarGuru', $daftarGuru);
    }

    public function kefilterPeriode(){
        $daftarPerodAkademik = periode_akademik::all();
        return view("adminlte.filterperiode",[
            "daftarPerodAkademik"=>$daftarPerodAkademik
        ]);
    }

    public function filterPeriode(Request $request){

        $daftarPerodAkademik = periode_akademik::all();
        //filter = 3
        //kalo diisi 1
        if($request->filtertahun != "none")
        {
            $daftarPerodAkademik=periode_akademik::where("Tahun_ajaran", $request->filtertahun)->get();
        }
        if($request->filtersemester != "none")
        {
            $daftarPerodAkademik=periode_akademik::where("Semester", $request->filtersemester)->get();
        }
        if($request->filterstatus != "none")
        {
            $daftarPerodAkademik=periode_akademik::where("Status", $request->filterstatus)->get();
        }
        //kalo diisi 2
        if($request->filtertahun != "none" && $request->filtersemester != "none")
        {
            $daftarPerodAkademik=periode_akademik::where("Tahun_ajaran", $request->filtertahun)->where("Semester", $request->filtersemester)->get();
        }
        if($request->filtertahun != "none" && $request->filterstatus != "none")
        {
            $daftarPerodAkademik=periode_akademik::where("Tahun_ajaran", $request->filtertahun)->where("Status", $request->filterstatus)->get();
        }
        if($request->filterstatus != "none" && $request->filtersemester != "none")
        {
            $daftarPerodAkademik=periode_akademik::where("Status", $request->filterstatus)->where("Semester", $request->filtersemester)->get();
        }

        //kalo diisi semua
        if($request->filtertahun != "none" && $request->filtersemester != "none" && $request->filterstatus != "none")
        {
            $daftarPerodAkademik=periode_akademik::where("Tahun_ajaran", $request->filtertahun)->where("Semester", $request->filtersemester)->where("Status", $request->filterstatus)->get();
        }


        return view("adminlte.filterperiode",[
            "daftarPerodAkademik"=>$daftarPerodAkademik
        ]);
    }

    public function updatePeriode(Request $request)
    {
        $periode_akademik = periode_akademik::find($request->Id_periode);
        $periode_akademik->Tahun_ajaran = $request->Tahun_ajaran;
        $periode_akademik->Semester = $request->Semester;
        $periode_akademik->Status  = $request->Status;
        $periode_akademik->save();
        return redirect('/PeriodeAkademik');
    }

    public function deletePeriode($id)
    {
        $periode_akademik = periode_akademik::find($id);
        $periode_akademik->delete();
        return redirect("/PeriodeAkademik");
    }

    public function toUpdatePeriode($id)
    {
        $periode_akademik  = periode_akademik::find($id);
        Session::put("periode_akademik",$periode_akademik);
        return view('adminlte.editPeriode_akademik',["periode_akademik"=>$periode_akademik]);
    }

    public function selectPerodAkad(Request $data)
    {
        $data->validate([
            "TahunAjaran" => "required",
            "Semester" => "required",
            "Status" => "required"
        ]);
        if ($data->has("Insert")) {
            periode_akademik::create(
                [
                    "Tahun_ajaran"=>$data->input("TahunAjaran"),
                    "Semester"=>$data->input("Semester"),
                    "Status"=>$data->input("Status")
                ]
            );
        }


        if ($data->has("Update")) {
            $tempid_periode = periode_akademik::find($data->input("id"));
            ////////////////////////////////////////////////////////////////////////
            $tempid_periode->Id_periode = $data->input("id");
            $tempid_periode->Tahun_ajaran = $data->input("TahunAjaran");
            $tempid_periode->Semester = $data->input("Semester");
            $tempid_periode->Status = $data->input("status");
            $tempid_periode->save();
        }

        $daftarPerod = periode_akademik::all();
        return redirect("/PeriodeAkademik")->with('daftarPerod', $daftarPerod);
    }

    public function kefilterMapel(){
        $daftarMatPel = mapel::all();
        $DBJurusan = jurusan::all();
        return view("adminlte.filtermapel",[
            "daftarMatPel"=>$daftarMatPel,
            "jurusan"=>$DBJurusan
        ]);
    }

    public function filterMapel(Request $request){
        $daftarMatPel = mapel::all();

        //kalo diisi 1
        if($request->filtertingkatankelas != "none" ){
            $daftarMatPel=mapel::where("Tingkat", $request->filtertingkatankelas)->get();
        }


        if($request->nama != "" ){
            $daftarMatPel=mapel::where("Nama_mapel", $request->nama)->get();
        }


        return view("adminlte.filtermapel",[
            "daftarMatPel"=>$daftarMatPel
        ]);
    }

    public function updateMapel(Request $request)
    {
        $mapel = mapel::find($request->Id_mapel);
        $mapel->Nama_mapel = $request->Nama_mapel;
        $mapel->KKM = $request->KKM;
        $mapel->Tingkat  = $request->Tingkat;
        $mapel->save();
        return redirect('/MataPelajaran');
    }

    public function deleteMapel($id)
    {
        $mapel = mapel::find($id);
        $mapel->delete();
        return redirect("/MataPelajaran");
    }

    public function toUpdateMapel($id)
    {
        $mapel  = mapel::find($id);
        Session::put("mapel",$mapel);
        return view('adminlte.editMapel',["mapel"=>$mapel]);
    }

    public function selectMatPel(Request $data)
    {
        $data->validate([
            "nama" => "required",
            "kkm" => "required"
        ]);
        if ($data->has("Insert")) {
            mapel::create(
                [
                    "Nama_mapel"=>$data->input("nama"),
                    "KKM"=>$data->input("kkm"),
                    "Tingkat"=>$data->input("tingkat"),
                    "Id_jurusan"=>$data->input("id_jurusan")
                ]
            );
        }
        if ($data->has("Update")) {
            mapel::where('Id_mapel','=',$data->input("id"))->update(
                [
                    "Nama_mapel"=>$data->input("nama"),
                    "KKM"=>$data->input("kkm"),
                    "Tingkat"=>$data->input("tingkat")
                ]
            );
        }
        if ($data->has("Delete")) {
            $valueDelete = $data->input("Delete");
            mapel::where('Id_mapel', '=' , $valueDelete)->delete();
        }
        $daftarMapel = mapel::all();
        return redirect("/MataPelajaran")->with('daftarMapel', $daftarMapel);
    }

    public function kefilterRiwayat(){
        $DBriwayat = riwayat_akademik::all();
        $DBsiswa = siswa::all();
        $DBkelas = kelas::all();
        $DBmapel = mapel::all();
        $DBAjar_mengajar = ajar_mengajar::all();
        return view("Guru.filterriwayat",[
            "DBAjar_mengajar"=>$DBAjar_mengajar,
            "DBriwayat"=>$DBriwayat,
            "DBsiswa"=>$DBsiswa,
            "DBkelas"=>$DBkelas,
            "DBmapel"=>$DBmapel
        ]);
    }

    public function filterRiwayat(Request $request){
        $DBriwayat = riwayat_akademik::all();


        if($request->filterajarmengajar != "none" ){
            $DBriwayat=$DBriwayat->where("Id_ajar_mengajar", $request->filterajarmengajar);
        }

        if($request->nama != "" ){
            $nis=siswa::where("Nama_siswa",'like','%'.$request->nama.'%')->pluck("NIS");
            $DBriwayat=riwayat_akademik::whereIn("NIS", $nis)->get();
        }

        if($request->filterajarmengajar != "none" && $request->nama != ""){
            $nis=siswa::where("Nama_siswa",'like','%'.$request->nama.'%')->pluck("NIS");
            $DBriwayat=riwayat_akademik::whereIn("NIS", $nis)->where("Id_ajar_mengajar", $request->filterajarmengajar)->get();
        }

        $DBsiswa = siswa::all();
        $DBkelas = kelas::all();
        $DBmapel = mapel::all();
        $DBAjar_mengajar = ajar_mengajar::all();
        return view("adminlte.filterriwayat",[
            "DBAjar_mengajar"=>$DBAjar_mengajar,
            "DBriwayat"=>$DBriwayat,
            "DBsiswa"=>$DBsiswa,
            "DBkelas"=>$DBkelas,
            "DBmapel"=>$DBmapel
        ]);
    }

    public function deleteRiwayat($id){
        $riwayat_akademik = riwayat_akademik::find($id);
        $riwayat_akademik->delete();
        return redirect("/riwayat");
    }
    public function updateRiwayat(Request $request){

        $this->validate($request,[
            "Quiz1" => ["required",new batasannilai],
            "Quiz2" => ["required",new batasannilai],
            "Tugas1" =>  ["required",new batasannilai],
            "Tugas2" =>  ["required",new batasannilai],
            "UTS" => ["required",new batasannilai],
            "UAS" =>  ["required",new batasannilai],
            "Sikap" => "required",
            "Hasil_akhir" =>  ["required",new batasannilai]
        ]);

        $riwayat_akademik = riwayat_akademik::find($request->Id_riwayat_akademik);
        $riwayat_akademik->Quiz1 = $request->Quiz1;
        $riwayat_akademik->Quiz2 = $request->Quiz2;
        $riwayat_akademik->Tugas1 = $request->Tugas1;
        $riwayat_akademik->Tugas2 = $request->Tugas2;
        $riwayat_akademik->UTS = $request->UTS;
        $riwayat_akademik->UAS = $request->UAS;
        $riwayat_akademik->Sikap = $request->Sikap;
        $riwayat_akademik->Hasil_akhir = $request->Hasil_akhir;
        $riwayat_akademik->save();
        return redirect('/riwayat');
    }
    public function toUpdateRiwayat($id)
    {
        $riwayat_akademik  = riwayat_akademik::find($id);
        Session::put("riwayat_akademik",$riwayat_akademik);
        return view('adminlte.editRiwayat',["riwayat_akademik"=>$riwayat_akademik]);
    }

    public function selectRiwayat(Request $data)
    {
        $this->validate($data,[
            "siswa" => "required",
            "ajar_mengajar" => "required",
            // "Quiz1" => "required",
            // "Quiz2" => "required",
            // "Tugas1" => "required",
            // "Tugas2" => "required",
            // "UTS" => "required",
            // "UAS" => "required",
            // "Sikap" => "required",
            // "Nilai_akhir" => "required"
            // "Quiz1" => ["required",new batasannilai],
            // "Quiz2" => ["required",new batasannilai],
            // "Tugas1" =>  ["required",new batasannilai],
            // "Tugas2" =>  ["required",new batasannilai],
            // "UTS" => ["required",new batasannilai],
            // "UAS" =>  ["required",new batasannilai],
            // "Sikap" => "required",
            // "Nilai_akhir" =>  ["required",new batasannilai]
        ]);
        $ajar = ajar_mengajar::find($data->input("ajar_mengajar"));
        $kelas = $ajar->kelas->Id_kelas;
        $mapel = $ajar->mapel->Id_mapel;
        if ($data->has("Insert")) {
            riwayat_akademik::create(
                [
                    "NIS"=>$data->input("siswa"),
                    "Id_ajar_mengajar"=>$data->input("ajar_mengajar"),
                    "Id_kelas"=>$kelas,
                    "Id_mapel"=>$mapel,
                    "Quiz1"=>0,
                    "Quiz2"=>0,
                    "Tugas1"=>0,
                    "Tugas2"=>0,
                    "UTS"=>0,
                    "UAS"=>0,
                    "Sikap"=>"-",
                    "Hasil_akhir"=>0
                ]
            );
        }
        if ($data->has("Update")) {
            DB::table('mapel')->where('Id_mapel','=',$data->input("id"))->update(
                [
                    "Nama_mapel"=>$data->input("nama"),
                    "KKM"=>$data->input("kkm"),
                    "Tingkat"=>$data->input("tingkat")
                ]
            );
        }
        if ($data->has("Delete")) {
            $valueDelete = $data->input("Delete");
            DB::table('mapel')->where('Id_mapel', '=' , $valueDelete)->delete();
        }
        $daftarMapel = mapel::all();
        return redirect("/riwayat")->with('daftarMapel', $daftarMapel);
    }

    public function kefilterKelas(){
        $daftarKelas = kelas::all();
        $DBPeriode = periode_akademik::where("Status",1)->get();
        $GuruAktif = guru::where("Status_guru",1)->get();
        $DBJurusan = jurusan::all();
        return view("adminlte.filterkelas",[
            "daftarKelas"=>$daftarKelas,
            "DBPeriode"=>$DBPeriode,
            "Guru"=>$GuruAktif,
            "jurusan"=>$DBJurusan
        ]);
    }

    public function filterKelas(Request $request){
        $daftarKelas = kelas::all();


        //filter = 3
        //kalo diisi 1
        if($request->filterguru != "none" ){
            $daftarKelas=kelas::where("NIG", $request->filterguru)->get();
        }
        if($request->filtertingkatankelas != "none" ){
            $daftarKelas=kelas::where("Tingkat_kelas", $request->filtertingkatankelas)->get();
        }
        if($request->filterjurusan != "none" ){
            $daftarKelas=kelas::where("Id_jurusan", $request->filterjurusan)->get();
        }
        //kalo diisi 2
        if($request->filtertingkatankelas != "none" && $request->filterguru != "none"  ){
            $daftarKelas=kelas::where("Tingkat_kelas", $request->filtertingkatankelas)->where("NIG", $request->filterguru)->get();
        }
        if($request->filterjurusan != "none" && $request->filterguru != "none"  ){
            $daftarKelas=kelas::where("Id_jurusan", $request->filterjurusan)->where("NIG", $request->filterguru)->get();
        }
        if($request->filtertingkatankelas != "none" && $request->filterjurusan != "none"  ){
            $daftarKelas=kelas::where("Tingkat_kelas", $request->filtertingkatankelas)->where("Id_jurusan", $request->filterjurusan)->get();
        }

        //kalo diisi semua
        if($request->filtertingkatankelas != "none" && $request->filterguru != "none" && $request->filterjurusan != "none"  ){
            $daftarKelas=kelas::where("Tingkat_kelas", $request->filtertingkatankelas)->where("NIG", $request->filterguru)->where("Id_jurusan", $request->filterjurusan)->get();
        }

        if($request->nama != "" ){
            $daftarKelas=kelas::where("Nama_kelas", $request->nama)->get();
        }

        $DBPeriode = periode_akademik::where("Status",1)->get();
        $GuruAktif = guru::where("Status_guru",1)->get();
        $DBJurusan = jurusan::all();
        return view("adminlte.filterkelas",[
            "daftarKelas"=>$daftarKelas,
            "DBPeriode"=>$DBPeriode,
            "Guru"=>$GuruAktif,
            "jurusan"=>$DBJurusan
        ]);
    }

    public function deleteKelas($id){
        $kelas = kelas::find($id);
        $kelas->delete();
        return redirect("/kelas");
    }
    public function updateKelas(Request $request){
        $kelas = kelas::find($request->Id_kelas);
        $kelas->Id_periode = $request->Id_periode;
        $kelas->NIG = $request->NIG;
        $kelas->Nama_kelas = $request->Nama_kelas;
        $kelas->Tingkat_kelas = $request->Tingkat_kelas;
        $kelas->Id_jurusan = $request->Id_jurusan;
        $kelas->save();
        return redirect('/kelas');
    }
    public function toUpdateKelas($id)
    {
        $kelas  = kelas::find($id);
        Session::put("kelas",$kelas);
        $optionperiode = periode_akademik::all();
        $optionguru = guru::all();
        $optionjurusan = jurusan::all();
        Session::put("optionperiode",$optionperiode);
        Session::put("optionguru",$optionguru);
        Session::put("optionjurusan",$optionjurusan);
        return view('adminlte.editKelas',[
            "kelas"=>$kelas
        ]);
    }
    public function toJadwalKelas($id)
    {
        $jadwalKelas = ajar_mengajar::where('Id_kelas', $id)->get();
        $namaKelas = kelas::find($id);
        //dd($jadwalKelas);

        return view('adminlte.formJadwalKelas',[
            "jadwalKelas"=>$jadwalKelas,
            "namaKelas"=>$namaKelas
        ]);
    }
    public function selectKelas(Request $data)
    {

        $data->validate([
            "period" => "required",
            "nig" => "required",
            "nama" => "required",
            "tingkat" => "required",
            "idJur" => "required"
        ]);
        if ($data->has("Insert")) {
            kelas::create(
                [
                    "Id_periode"=>$data->input("period"),
                    "NIG"=>$data->input("nig"),
                    "Nama_kelas"=>$data->input("nama"),
                    "Tingkat_kelas"=>$data->input("tingkat"),
                    "Id_jurusan"=>$data->input("idJur")
                ]
            );
        }
        if ($data->has("Update")) {
            DB::table('kelas')->where('Id_kelas','=',$data->input("id"))->update(
                [
                    "Id_periode"=>$data->input("period"),
                    "NIG"=>$data->input("nig"),
                    "Nama_kelas"=>$data->input("nama"),
                    "Tingkat_kelas"=>$data->input("tingkat"),
                    "Id_jurusan"=>$data->input("idJur")
                ]
            );
        }
        if ($data->has("Delete")) {
            $valueDelete = $data->input("Delete");
            DB::table('kelas')->where('Id_kelas', '=' , $valueDelete)->delete();
        }
        return redirect("/kelas");
    }

    public function kefilterJadwal(){
        $DBJadwal = ajar_mengajar::all();
        $GuruAktif = guru::where("Status_guru",1)->get();
        $Mapel = mapel::all();
        $kelas = kelas::all();
        return view("adminlte.filterjadwal",[
            "Jadwal"=>$DBJadwal,
            "Guru"=>$GuruAktif,
            "Mapel"=>$Mapel,
            "kelas"=>$kelas]);
    }

    public function filterJadwal(Request $request){
        $DBJadwal = ajar_mengajar::all();
        //filter = 5
        //keisi 1
        if($request->filterhari != "none" ){
            $DBJadwal=ajar_mengajar::where("Hari", $request->filterhari)->get();
        }
        if($request->filtermapel != "none" ){
            $DBJadwal=ajar_mengajar::where("Id_mapel", $request->filtermapel)->get();
        }
        if($request->filterguru != "none" ){
            $DBJadwal=ajar_mengajar::where("NIG", $request->filterguru)->get();
        }
        if($request->filterkelas != "none" ){
            $DBJadwal=ajar_mengajar::where("Id_kelas", $request->filterkelas)->get();
        }
        if($request->filterstatus != "none" ){
            $DBJadwal=ajar_mengajar::where("Status_jadwal", $request->filterstatus)->get();
        }
        //keisi 2
        if($request->filterhari != "none" && $request->filtermapel != "none" ){
            $DBJadwal=ajar_mengajar::where("Hari", $request->filterhari)->where("Id_mapel", $request->filtermapel)->get();
        }
        if($request->filterhari != "none" && $request->filterguru != "none" ){
            $DBJadwal=ajar_mengajar::where("Hari", $request->filterhari)->where("NIG", $request->filterguru)->get();
        }
        if($request->filterhari != "none" && $request->filterkelas != "none" ){
            $DBJadwal=ajar_mengajar::where("Hari", $request->filterhari)->where("Id_kelas", $request->filterkelas)->get();
        }
        if($request->filterhari != "none" && $request->filterstatus != "none" ){
            $DBJadwal=ajar_mengajar::where("Hari", $request->filterhari)->where("Status_jadwal", $request->filterstatus)->get();
        }

        if($request->filterguru != "none" && $request->filtermapel != "none" ){
            $DBJadwal=ajar_mengajar::where("NIG", $request->filterguru)->where("Id_mapel", $request->filtermapel)->get();
        }
        if($request->filterkelas != "none" && $request->filtermapel != "none" ){
            $DBJadwal=ajar_mengajar::where("Id_kelas", $request->filterkelas)->where("Id_mapel", $request->filtermapel)->get();
        }
        if($request->filterstatus != "none" && $request->filtermapel != "none" ){
            $DBJadwal=ajar_mengajar::where("Status_jadwal", $request->filterstatus)->where("Id_mapel", $request->filtermapel)->get();
        }

        if($request->filterguru != "none" && $request->filterkelas != "none" ){
            $DBJadwal=ajar_mengajar::where("NIG", $request->filterguru)->where("Id_kelas", $request->filterkelas)->get();
        }
        if($request->filterguru != "none" && $request->filterstatus != "none" ){
            $DBJadwal=ajar_mengajar::where("NIG", $request->filterguru)->where("Status_jadwal", $request->filterstatus)->get();
        }

        if($request->filterkelas != "none" && $request->filterstatus != "none" ){
            $DBJadwal=ajar_mengajar::where("Id_kelas", $request->filterkelas)->where("Status_jadwal", $request->filterstatus)->get();
        }
        //keisi 3
        if($request->filterhari != "none" && $request->filtermapel != "none" && $request->filterguru != "none" ){
            $DBJadwal=ajar_mengajar::where("Hari", $request->filterhari)->where("Id_mapel", $request->filtermapel)->where("NIG", $request->filterguru)->get();
        }
        if($request->filterhari != "none" && $request->filtermapel != "none" && $request->filterkelas != "none" ){
            $DBJadwal=ajar_mengajar::where("Hari", $request->filterhari)->where("Id_mapel", $request->filtermapel)->where("Id_kelas", $request->filterkelas)->get();
        }
        if($request->filterhari != "none" && $request->filtermapel != "none" && $request->filterstatus != "none" ){
            $DBJadwal=ajar_mengajar::where("Hari", $request->filterhari)->where("Id_mapel", $request->filtermapel)->where("Status_jadwal", $request->filterstatus)->get();
        }

        if($request->filterhari != "none" && $request->filterguru != "none" && $request->filterkelas != "none" ){
            $DBJadwal=ajar_mengajar::where("Hari", $request->filterhari)->where("NIG", $request->filterguru)->where("Id_kelas", $request->filterkelas)->get();
        }
        if($request->filterhari != "none" && $request->filterguru != "none" && $request->filterstatus != "none" ){
            $DBJadwal=ajar_mengajar::where("Hari", $request->filterhari)->where("NIG", $request->filterguru)->where("Status_jadwal", $request->filterstatus)->get();
        }

        if($request->filterhari != "none" && $request->filterkelas != "none" && $request->filterstatus != "none" ){
            $DBJadwal=ajar_mengajar::where("Hari", $request->filterhari)->where("Id_kelas", $request->filterkelas)->where("Status_jadwal", $request->filterstatus)->get();
        }

        if($request->filtermapel != "none" && $request->filterguru != "none" && $request->filterkelas != "none" ){
            $DBJadwal=ajar_mengajar::where("Id_mapel", $request->filtermapel)->where("NIG", $request->filterguru)->where("Id_kelas", $request->filterkelas)->get();
        }
        if($request->filtermapel != "none" && $request->filterguru != "none" && $request->filterstatus != "none" ){
            $DBJadwal=ajar_mengajar::where("Id_mapel", $request->filtermapel)->where("NIG", $request->filterguru)->where("Status_jadwal", $request->filterstatus)->get();
        }

        if($request->filtermapel != "none" && $request->filterstatus != "none" && $request->filterkelas != "none" ){
            $DBJadwal=ajar_mengajar::where("Id_mapel", $request->filtermapel)->where("Status_jadwal", $request->filterstatus)->where("Id_kelas", $request->filterkelas)->get();
        }

        if($request->filterstatus != "none" && $request->filterguru != "none" && $request->filterkelas != "none" ){
            $DBJadwal=ajar_mengajar::where("Status_jadwal", $request->filterstatus)->where("NIG", $request->filterguru)->where("Id_kelas", $request->filterkelas)->get();
        }
        //keisi 4
        if($request->filterhari != "none" && $request->filtermapel != "none" && $request->filterguru != "none" && $request->filterkelas != "none"){
            $DBJadwal=ajar_mengajar::where("Hari", $request->filterhari)->where("Id_mapel", $request->filtermapel)->where("NIG", $request->filterguru)->where("Id_kelas", $request->filterkelas)->get();
        }
        if($request->filterhari != "none" && $request->filtermapel != "none" && $request->filterguru != "none" && $request->filterstatus != "none"){
            $DBJadwal=ajar_mengajar::where("Hari", $request->filterhari)->where("Id_mapel", $request->filtermapel)->where("NIG", $request->filterguru)->where("Status_jadwal", $request->filterstatus)->get();
        }
        if($request->filterhari != "none" && $request->filtermapel != "none" && $request->filterstatus != "none" && $request->filterkelas != "none"){
            $DBJadwal=ajar_mengajar::where("Hari", $request->filterhari)->where("Id_mapel", $request->filtermapel)->where("Status_jadwal", $request->filterstatus)->where("Id_kelas", $request->filterkelas)->get();
        }
        if($request->filterhari != "none" && $request->filterstatus != "none" && $request->filterguru != "none" && $request->filterkelas != "none"){
            $DBJadwal=ajar_mengajar::where("Hari", $request->filterhari)->where("Status_jadwal", $request->filterstatus)->where("NIG", $request->filterguru)->where("Id_kelas", $request->filterkelas)->get();
        }
        if($request->filterstatus != "none" && $request->filtermapel != "none" && $request->filterguru != "none" && $request->filterkelas != "none"){
            $DBJadwal=ajar_mengajar::where("Status_jadwal", $request->filterstatus)->where("Id_mapel", $request->filtermapel)->where("NIG", $request->filterguru)->where("Id_kelas", $request->filterkelas)->get();
        }
        //keisi semua
        if($request->filterhari != "none" && $request->filtermapel != "none" && $request->filterguru != "none" && $request->filterkelas != "none" && $request->filterstatus != "none"){
            $DBJadwal=ajar_mengajar::where("Hari", $request->filterhari)->where("Id_mapel", $request->filtermapel)->where("NIG", $request->filterguru)->where("Id_kelas", $request->filterkelas)->where("Status_jadwal", $request->filterstatus)->get();
        }

        $GuruAktif = guru::where("Status_guru",1)->get();
        $Mapel = mapel::all();
        $kelas = kelas::all();
        return view("adminlte.filterjadwal",[
            "Jadwal"=>$DBJadwal,
            "Guru"=>$GuruAktif,
            "Mapel"=>$Mapel,
            "kelas"=>$kelas]);
    }

    public function deleteJadwal($id){
        $ajar_mengajar = ajar_mengajar::find($id);
        $ajar_mengajar->delete();
        return redirect("/Jadwal");
    }
    public function updateJadwal(Request $request){
        $ajar_mengajar = ajar_mengajar::find($request->Id_ajar_mengajar);
        $ajar_mengajar->Id_kelas = $request->Id_kelas;
        $ajar_mengajar->Id_mapel = $request->Id_mapel;
        $ajar_mengajar->NIG = $request->NIG;
        $ajar_mengajar->Jam_berakhir = $request->Jam_berakhir;
        $ajar_mengajar->Jam_dimulai = $request->Jam_dimulai;
        $ajar_mengajar->Hari = $request->Hari;
        $ajar_mengajar->Jam_belajar = $request->Jam_belajar;
        $ajar_mengajar->Status_jadwal = $request->Status_jadwal;
        $ajar_mengajar->save();
        return redirect('/AjarMengajar');
    }
    public function toUpdateJadwal($id)
    {
        $ajar_mengajar  = ajar_mengajar::find($id);
        Session::put("ajar_mengajar",$ajar_mengajar);
        $optionguru = guru::all();
        $optionkelas = kelas::all();
        $optionmapel = mapel::all();
        Session::put("optionguru",$optionguru);
        Session::put("optionkelas",$optionkelas);
        Session::put("optionmapel",$optionmapel);
        return view('adminlte.editJadwal',[
            "ajar_mengajar"=>$ajar_mengajar

        ]);
    }
    public function selectJadwal(Request $data)
    {
        $data->validate([
            "Id_kelas" => "required",
            "Id_mapel" => "required",
            "NIG" => "required",
            "Hari" => "required",
            "Jam_dimulai" => "required",
            "Jam_berakhir" => "required",
            "Jam_belajar" => "required",
            "Status_jadwal" => "required"
        ]);
        if ($data->has("Insert")) {
            ajar_mengajar::create(
                [
                    "Id_kelas"=>$data->input("Id_kelas"),
                    "Id_mapel"=>$data->input("Id_mapel"),
                    "NIG"=>$data->input("NIG"),
                    "Jam_berakhir"=>$data->input("Jam_berakhir"),
                    "Jam_dimulai"=>$data->input("Jam_dimulai"),
                    "Hari"=>$data->input("Hari"),
                    "Jam_belajar"=>$data->input("Jam_belajar"),
                    "Status_jadwal"=>$data->input("Status_jadwal")
                ]
            );
        }
        return redirect("/AjarMengajar");
    }

    ///////////////////////////////////////////tambahan
    public function selectHistoryEdit(Request $data)
    {
        $data->validate([
            "Id_table" => "required|numeric|size:6",
            "Id_pengedit" => "required|numeric|size:6"
        ]);
        if ($data->has("Insert")) {
            history_edit::create(
                [
                    "Id_table"=>$data->input(""),
                    "Id_pengedit"=>$data->input(""),
                    "Tanggal_edit"=>$data->input("")
                ]
            );
        }
        if ($data->has("Update")) {
            $tempid_history_edit = history_edit::find($data->input(""));
            $tempid_history_edit->Id_table = $data->input("");
            $tempid_history_edit->Id_pengedit = $data->input("");
            $tempid_history_edit->Tanggal_edit = $data->input("");
            $tempid_history_edit->save();
        }
        if ($data->has("Delete")) {
            $valueDelete = $data->input("Delete");
            history_edit::where('Id_history_edit','=',$valueDelete)->delete();
        }
        return redirect("/");
    }

    public function downloadToa($namafile)
    {
        return Storage::disk('local')->download("fileToa/".$namafile);
    }





    public function selectToa(Request $data)
    {
        // ascas
        $data->validate([
            "namaToa" => "required",
            "fileToa" => "required|mimes:pdf"
        ]);
            $namafile = Str::random(8).".".$data->file("fileToa")->getClientOriginalExtension();
            $data->file("fileToa")->storeAs("fileToa",$namafile,"local");
            if ($data->has("Insert")) {
                pengumuman::insert(
                    [
                        "Judul_pengumuman"=>$data->input("namaToa"),
                        "Tanggal_pengumuman"=>new Carbon('now'),
                        "File_pengumuman"=>$namafile
                    ]
                );
            }

        return redirect("/pengumuman");
    }

    public function importSiswa(Request $data)
    {
        // validasi
		$this->validate($data, [
			'fileSiswa' => 'required|mimes:csv,xls,xlsx'
		]);

		// menangkap file excel
		$file = $data->file('fileSiswa');

		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();

		// upload ke folder file_siswa di dalam folder public
		$file->move('file_siswa',$nama_file);


        $array = Excel::toArray(new SiswaImport, public_path('/file_siswa/'.$nama_file));

        if (array_key_exists("nisn",$array[0][0]) && $array[0][0]["nisn"] != null) {
            // import data
            Excel::import(new SiswaImport, public_path('/file_siswa/'.$nama_file));

            // alihkan halaman kembali
            return redirect('/siswa')->with('berhasil','Berhasil Import');
        }else{
            return redirect('/siswa')->with('gagal','Gagal Import');
        }



    }
}
