@extends('guru.guruLayout')

@section('inputNilai')

<div>
    <form action="/filterRiwayatGuru" method="post" class="form-horizontal">
        @csrf
        <h3>Filter </h3>
        <label class="control-label">Nama Siswa :</label>
        <input type="text" class="span7" placeholder="Search Nama Siswa" name="nama"  style="width: 200pt; height: 40px;  padding: 0.375rem 0.75rem; "/>
        <br>
        <br>
        <label class="control-label">Jadwal :</label>
                  <select class="form-control span11" name="filterajarmengajar" style="width: 250pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                    <option value="none" selected>None</option>
                      @isset($DBAjar_mengajar)
                          @foreach ($DBAjar_mengajar as $i)
                    <option value="{{$i->Id_ajar_mengajar}}" >{{$i->mapel->Nama_mapel}} -
                    {{$i->kelas->Nama_kelas}} - {{$i->kelas->Tingkat_kelas}} </option>
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
              <th>Siswa</th>
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
              <th>Action</th>

            </tr>
          </thead>
          <tbody>
              @foreach ($DBriwayat as $r)
                  <tr>
                    <td>{{$r->siswa->Nama_siswa}}</td>
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

                        <td class="text-center"><button class="btn btn-success"><a href="/toEditNilai/{{$r->Id_riwayat_akademik}}">Edit</a></button></td>

                  </tr>
              @endforeach
          </tbody>
        </table>
      </div>
</div>
</div>
</div>
@endsection
