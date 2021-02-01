@extends('siswa.siswaLayout')

@section('lihatNilai')

<div>
    <form action="/filterRiwayatSiswa" method="post" class="form-horizontal">
        @csrf
        <h3>Filter </h3>

        <label class="control-label">Periode Akademik :</label>
                  <select class="form-control span11" name="filterajarmengajar" style="width: 250pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                    <option value="none" selected>None</option>
                      @isset($DBperiode)
                          @foreach ($DBperiode as $i)
                    <option value="{{$i->Id_periode}}" >Tahun Ajaran {{$i->Tahun_ajaran}} -
                    Semester {{$i->Semester}}</option>
                          @endforeach
                      @endisset
                  </select>
        <br>
        <br>
        <button style="margin-left: 6.5cm" type="submit" class="btn btn-success" name="filter">Filter</button>
    </form>
</div>

<div class="widget-box">
    <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
        <h5>Table Riwayat Akademik</h5>
    </div>
    <div class="widget-content nopadding">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Kelas</th>
              <th>Mapel</th>
              <th>Quiz 1</th>
              <th>Quiz 2</th>
              <th>Tugas 1</th>
              <th>Tugas 2</th>
              <th>UTS</th>
              <th>UAS</th>
              <th>Sikap</th>
              <th>Hasil Akhir</th>

            </tr>
          </thead>
          <tbody>
              @foreach ($DBriwayat as $r)
                @if ($r->mapel->KKM > $r->Hasil_akhir)
                    <tr class="alert-danger">
                        <td>{{$r->kelas->Nama_kelas}}</td>
                        <td>{{$r->mapel->Nama_mapel}}</td>
                        <td>{{$r->Quiz1}}</td>
                        <td>{{$r->Quiz2}}</td>
                        <td>{{$r->Tugas1}}</td>
                        <td>{{$r->Tugas2}}</td>
                        <td>{{$r->UTS}}</td>
                        <td>{{$r->UAS}}</td>
                        <td>{{strtoupper($r->Sikap)}}</td>
                        <td>{{$r->Hasil_akhir}}</td>
                    </tr>
                @endif
                @if ($r->Hasil_akhir > $r->mapel->KKM)
                    <tr class="success">
                        <td>{{$r->kelas->Nama_kelas}}</td>
                        <td>{{$r->mapel->Nama_mapel}}</td>
                        <td>{{$r->Quiz1}}</td>
                        <td>{{$r->Quiz2}}</td>
                        <td>{{$r->Tugas1}}</td>
                        <td>{{$r->Tugas2}}</td>
                        <td>{{$r->UTS}}</td>
                        <td>{{$r->UAS}}</td>
                        <td>{{strtoupper($r->Sikap)}}</td>
                        <td>{{$r->Hasil_akhir}}</td>
                    </tr>
                @endif

              @endforeach
          </tbody>
        </table>
      </div>
</div>
</div>
</div>
@endsection
