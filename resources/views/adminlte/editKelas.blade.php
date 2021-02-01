@extends('adminlte.adminLayout')

@section('editSiswa')
    <div class="container" style="width: 800px">
        <div class="d-flex justify-content-center">
            <h1>Update Kelas</h1><br>
            <br>
        </div>
        @php
            $kelas = Session::get("kelas");
            $optionperiode = Session::get("optionperiode");
            $optionguru = Session::get("optionguru");
            $optionjurusan = Session::get("optionjurusan");
            // dd($siswa);
        @endphp
        <form action="{{url('/updateKelas')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="control-group">
                        <label class="control-label">Id Kelas :</label>
                        <div class="controls">
                        <input type="text" class="span11" value="{{$kelas->Id_kelas}}" readonly placeholder="Nama Lengkap" name="Id_kelas"  style="width: 60pt; height: 40px;  padding: 0.375rem 0.75rem; "/>
                          @error('Id_kelas')
                              <br><span style="color: red;">{{ $message }}</span>
                          @enderror
                          </div>
                      </div>
                      <div class="control-group">
                        <label for="">Periode</label>
                        <select class="form-control" name="Id_periode"  style="width: 150pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                            @foreach ($optionperiode as $i)
                        <option value="{{$i->Id_periode}}" >{{$i->Tahun_ajaran}} - Semester {{$i->Semester}}</option>
                            @endforeach
                        </select>
                        @error('Id_periode')
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


                </div>
                <div class="col-md-6">
                    <div class="control-group">
                        <label class="control-label">Nama Kelas :</label>
                        <div class="controls">
                          <input type="text" class="span11" placeholder="Nama Lengkap" name="Nama_kelas"  style="width: 150pt; height: 40px;  padding: 0.375rem 0.75rem; "/>
                          @error('Nama_kelas')
                              <br><span style="color: red;">{{ $message }}</span>
                          @enderror
                          </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Tingkat Kelas :</label>
                        <div class="controls">
                          <input type="text"  class="span11" placeholder="Tingkat Kelas" name="Tingkat_kelas"   style="width: 100pt; height: 40px;  padding: 0.375rem 0.75rem; "/>
                          @error('Tingkat_kelas')
                              <br><span style="color: red;">{{ $message }}</span>
                          @enderror
                          </div>
                      </div>
                      <div class="control-group">
                          <label for="">Jurusan</label>
                          <select class="form-control" name="Id_jurusan"  style="width: 100pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                              @foreach ($optionjurusan as $i)
                                  <option value="{{$i->Id_jurusan}}" >{{$i->Nama_jurusan}}</option>
                              @endforeach
                          </select>
                          @error('Id_jurusan')
                                <br><span style="color: red;">{{ $message }}</span>
                            @enderror
                      </div>
                </div>
            </div>

            <button class="btn btn-primary" > <a class="text-white" href="/kelas">Cancel</a></button>
            <input class="btn btn-success" type="submit" value="Update">
        </form>

    </div>
@endsection
