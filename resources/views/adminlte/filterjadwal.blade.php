@extends('adminlte.adminLayout')

@section('jadwal')

<div>
    <form action="/filterJadwal" method="post" class="form-horizontal">
        @csrf
        <h3>Filter </h3>
        <label class="control-label">Hari :</label>
            <select class="span11" name="filterhari" style="width: 100pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                <option value="none"selected>None</option>
                <option value="senin">senin</option>
                <option value="selasa">selasa</option>
                <option value="rabu">rabu</option>
                <option value="kamis">kamis</option>
                <option value="jumat">jumat</option>
            </select>
        <br>
        <br>
        <label class="control-label">Mapel :</label>
        <select class="span7" name="filtermapel" style="width: 130pt; height: 40px;  padding: 0.375rem 0.75rem; ">
            @isset($Mapel)
              <option value="none"selected>None</option>
              @foreach ($Mapel as $i)
              <option value="{{$i->Id_mapel}}" >{{$i->Nama_mapel}}</option>
              @endforeach
            @endisset
        </select>
        <br>
        <br>
        <label class="control-label">Guru :</label>
        <select class="span7" name="filterguru" style="width: 130pt; height: 40px;  padding: 0.375rem 0.75rem; ">
            @isset($Guru)
                <option value="none"selected>None</option>
              @foreach ($Guru as $i)
              <option value="{{$i->NIG}}" >{{$i->Nama_guru}}</option>
              @endforeach
            @endisset
        </select>
        <br>
        <br>
        <label class="control-label">Kelas :</label>
        <select class="span7" name="filterkelas" style="width: 130pt; height: 40px;  padding: 0.375rem 0.75rem; ">
            @isset($kelas)
                <option value="none"selected>None</option>
              @foreach ($kelas as $i)
              <option value="{{$i->Id_kelas}}" >{{$i->Nama_kelas}}</option>
              @endforeach
            @endisset
        </select>
        <br>
        <br>
        <label class="control-label">Status: </label>
            <select class="span11" name="filterstatus" style="width: 100pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                <option value="none"selected>None</option>
                <option value="1">Aktif</option>
                <option value="0">Tidak Aktif</option>
            </select>
        <br>
        <br>
        <button style="margin-left: 6.5cm" type="submit" class="btn btn-success" name="filter">Filter</button>
    </form>
</div>

<div class="widget-box">
    <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
        <h5>Table Jadwal</h5>
      </div>
    <div class="widget-content nopadding">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID Kelas</th>
              <th>ID Mapel</th>
              <th>NIG</th>
              <th>Jam Mulai</th>
              <th>Jam Berakhir</th>
              <th>Hari</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($Jadwal as $i)
                  <tr>
                      <td>{{$i->kelas->Nama_kelas}}</td>
                      <td>{{$i->mapel->Nama_mapel}}</td>
                      <td>{{$i->guru->Nama_guru}}</td>
                      <td>{{$i->Jam_dimulai}}</td>
                      <td>{{$i->Jam_berakhir}}</td>
                      <td>{{$i->Hari}}</td>
                      <td>{{$i->Status_jadwal}}</td>
                      <td>
                        <button class="btn btn-danger"><a class="text-white" href="deleteJadwal/{{$i->Id_ajar_mengajar}}">Delete</a></button>
                        <button class="btn btn-success"><a class="text-white" href="toUpdateJadwal/{{$i->Id_ajar_mengajar}}">Update</a></button>
                    </td>
                  </tr>
              @endforeach
          </tbody>
        </table>
      </div>
</div>



@endsection
