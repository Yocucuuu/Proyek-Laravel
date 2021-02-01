@extends('adminlte.adminLayout')

@section('editSiswa')
    <div class="container" style="width: 800px">
        <div class="d-flex justify-content-center">
            <h1>Update Jadwal</h1><br>
            <br>
        </div>
        @php
            $ajar_mengajar = Session::get("ajar_mengajar");
            $optionguru = Session::get("optionguru");
            $optionkelas = Session::get("optionkelas");
            $optionmapel = Session::get("optionmapel");
            // dd($siswa);
        @endphp
        <form action="{{url('/updateJadwal')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="control-group">
                        <label class="control-label">Id Jadwal :</label>
                        <div class="controls">
                        <input type="text" class="span11" readonly  style="width: 60pt; height: 40px;  padding: 0.375rem 0.75rem;"  value={{$ajar_mengajar->Id_ajar_mengajar}} placeholder="Nama Lengkap" name="Id_ajar_mengajar" />
                          @error('Id_ajar_mengajar')
                              <br><span style="color: red;">{{ $message }}</span>
                          @enderror
                          </div>
                      </div>
                      <div class="control-group">
                        <label for="">Kelas :</label>
                        <select class="form-control" name="Id_kelas"  style="width: 100pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                            @foreach ($optionkelas as $i)
                                <option value="{{$i->Id_kelas}}" >{{$i->Nama_kelas}}</option>
                            @endforeach
                        </select>
                        @error('Id_kelas')
                              <br><span style="color: red;">{{ $message }}</span>
                          @enderror
                    </div>
                      <div class="control-group">
                        <label for="">Mata Pelajaran :</label>
                        <select class="form-control" name="Id_mapel"  style="width: 100pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                            @foreach ($optionmapel as $i)
                                <option value="{{$i->Id_mapel}}" >{{$i->Nama_mapel}}</option>
                            @endforeach
                        </select>
                        @error('Id_mapel')
                              <br><span style="color: red;">{{ $message }}</span>
                          @enderror
                    </div>
                      <div class="control-group">
                        <label for="">Nama Guru</label>
                        <select class="form-control" name="NIG"  style="width: 250pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                            @foreach ($optionguru as $i)
                        <option value="{{$i->NIG}}" >{{$i->Nama_guru}}</option>
                            @endforeach
                        </select>
                        @error('NIG')
                              <br><span style="color: red;">{{ $message }}</span>
                          @enderror
                    </div>
                    <div class="control-group">
                        <label class="control-label">Hari</label>
                        <div class="controls">
                        <select class="span11" name="Hari"  style="width: 100pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                                <option value="senin">senin</option>
                                <option value="selasa">selasa</option>
                                <option value="rabu">rabu</option>
                                <option value="kamis">kamis</option>
                                <option value="jumat">jumat</option>
                        </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="control-group">
                        <label class="control-label">Jam Mulai :</label>
                        <div class="controls">
                          <input type="time" value="{{$ajar_mengajar->Jam_dimulai}}" name="Jam_dimulai" style="width: 100pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Jam Berakhir :</label>
                        <div class="controls">
                          <input type="time" value="{{$ajar_mengajar->Jam_berakhir}}" name="Jam_berakhir" style="width: 100pt; height: 40px;  padding: 0.375rem 0.75rem; " >
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Jam Belajar :</label>
                        <div class="controls">
                          <input type="time" value="{{$ajar_mengajar->Jam_belajar}}" name="Jam_belajar" style="width: 100pt; height: 40px;  padding: 0.375rem 0.75rem; " >
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Status: </label>
                        <div class="controls">
                        <select class="span11" name="Status_jadwal" style="width: 100pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                                <option value="1">Aktif</option>
                                <option value="0">Non Aktif</option>
                        </select>
                        </div>
                    </div>
                </div>
            </div>

            <button class="btn btn-primary" > <a class="text-white" href="/AjarMengajar">Cancel</a></button>
            <input class="btn btn-success" type="submit" value="Update">
        </form>

    </div>
@endsection
