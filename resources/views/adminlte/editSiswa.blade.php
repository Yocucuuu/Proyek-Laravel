@extends('adminlte.adminLayout')

@section('editSiswa')
    <div class="container" style="width: 800px">
        <div class="d-flex justify-content-center">
            <h1>Update Siswa</h1>
        </div><br>
        <br>
        @php
            $siswa = Session::get("siswa");
            $optionkelas = Session::get("optionkelas");
            $optionjurusan = Session::get("optionjurusan");
            // dd($siswa);
        @endphp
        <form action="{{url('/updateSiswa')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">NIS</label>
                        <input name="NIS" value="{{$siswa->NIS}}" readonly type="text" class="form-control" aria-describedby="" placeholder="" style="width: 60pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>
                    <div class="form-group">
                        <label for="">NISN</label>
                        <input name="NISN" value="{{$siswa->NISN}}" type="text" class="form-control" aria-describedby="" placeholder="Enter NISN" style="width: 80pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                    </div>
                    <div class="form-group">
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
                    <div class="form-group">
                        <label for="">Jurusan :</label>
                        <select class="form-control" name="Id_jurusan"  style="width: 100pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                            @foreach ($optionjurusan as $i)
                                <option value="{{$i->Id_jurusan}}" >{{$i->Nama_jurusan}}</option>
                            @endforeach
                        </select>
                        @error('Id_kelas')
                              <br><span style="color: red;">{{ $message }}</span>
                          @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Nama Siswa</label>
                        <input value="{{$siswa->Nama_siswa}}" name="nama" type="text" class="form-control" aria-describedby="" placeholder="Enter Nama Siswa" style="width: 270pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                    </div>
                    <div class="form-group">
                        <label for="">Password Siswa</label>
                        <input value="" name="password" type="text" class="form-control" aria-describedby="" placeholder="Enter Password Siswa" style="width: 270pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                    </div>
                    <div class="form-group">
                        <label for="">Tempat Tanggal Lahir</label>
                        <input value="{{$siswa->Tempat_lahir_siswa}}" name="tempatLahir" type="text" class="form-control" aria-describedby="" placeholder="Enter Tempat tanggal lahir" style="width: 150pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                    </div>


                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Tanggal Lahir Siswa</label>
                        <input value="{{$siswa->Tanggal_lahir_siswa}}" name="tanggalLahir" type="date" class="form-control" aria-describedby="" placeholder="Enter  Tanggal lahir" style="width: 130pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                    </div>
                    <div class="form-group">
                        <label for="">Email Siswa</label>
                        <input value="{{$siswa->Email_siswa}}" name="email" type="email" class="form-control" aria-describedby="" placeholder="Enter Emai" style="width: 130pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                    </div>
                    <div class="form-group">
                        <label for="">Nama Ibu</label>
                        <input value="{{$siswa->Nama_ibu}}" name="namaIbu" type="text" class="form-control" aria-describedby="" placeholder="Enter Nama Ibu" style="width: 270pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                    </div>
                    <div class="form-group">
                        <label for="">Nama Ayah</label>
                        <input value="{{$siswa->Nama_ayah}}" name="namaAyah" type="text" class="form-control" aria-describedby="" placeholder="Enter Nama Ayah" style="width: 270pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                    </div>
                    <div class="form-group">
                        <label for="">Agama</label>
                        <select class="form-control" name="agama"  style="width: 100pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                            <option value="Islam" selected>Islam</option>
                            <option value="Budha">Budha</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Katholik">Katolik</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Konghucu">Konghucu</option>
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <select class="form-control" name="jenisKelamin" style="width: 75pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                            <option value="pria" selected>Pria</option>
                            <option value="wanita">Wanita</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Alamat Siswa</label>
                        <input value="{{$siswa->Alamat_siswa}}" name="alamat" type="text" class="form-control" aria-describedby="" placeholder="Enter Alamat"  style="width: 270pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                    </div>
                </div>
            </div>

            <button class="btn btn-primary" > <a class="text-white" href="/siswa">Cancel</a></button>
            <input class="btn btn-success" type="submit" value="Update">
        </form>

    </div>
@endsection
