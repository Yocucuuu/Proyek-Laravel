@extends('adminlte.adminLayout')

@section('formSiswa')

<div>
    <form action="/filterSiswa" method="post" class="form-horizontal">
        @csrf
        <h3>Filter </h3>
        <label class="control-label">Nama :</label>
        <input type="text" class="span7" placeholder="Search Nama Siswa" name="nama"  style="width: 200pt; height: 40px;  padding: 0.375rem 0.75rem; "/>
<br><br>
        <label class="control-label">Jurusan :</label>
        <select class="span7" name="filterjurusan" style="width: 130pt; height: 40px;  padding: 0.375rem 0.75rem; ">
            @isset($DBJurusan)
            <option value="none"selected>None</option>
              @foreach ($DBJurusan as $i)
              <option value="{{$i->Id_jurusan}}" >{{$i->Nama_jurusan}}</option>
              @endforeach
            @endisset
        </select>
        <br>
        <br>
        <label class="control-label">Kelas :</label>
        <select class="span7" name="filterkelas" style="width: 130pt; height: 40px;  padding: 0.375rem 0.75rem; ">
            @isset($DBkelas)
                <option value="none"selected>None</option>
              @foreach ($DBkelas as $i)
              <option value="{{$i->Id_kelas}}" >{{$i->Nama_kelas}}</option>
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
      <h5>Table Siswa</h5>
    </div>

    <div class="widget-content nopadding">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>NISN</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Tempat dan Tanggal Lahir</th>
            <th>Agama</th>
            <th>Nama Ibu</th>
            <th>Nama Ayah</th>
            <th>Alamat</th>
            <th>Jenis Kelamin</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($daftarSiswa as $siswa)
                <tr>
                    <td>{{$siswa->NISN}}</td>
                    <td>{{$siswa->NIS}}</td>
                    <td>{{$siswa->Nama_siswa}}</td>
                    <td>{{$siswa->Tempat_lahir_siswa}} , {{$siswa->Tanggal_lahir_siswa}}</td>
                    <td>{{$siswa->Agama}}</td>
                    <td>{{$siswa->Nama_ibu}}</td>
                    <td>{{$siswa->Nama_ayah}}</td>
                    <td>{{$siswa->Alamat_siswa}}</td>
                    <td>{{$siswa->Jenis_kelamin}}</td>
                    @if ($siswa->Status == 1)
                    <td>
                        <button class="btn btn-danger "><a class="text-white" href="aktifNonaktifSiswa/{{$siswa->NIS}}">Nonaktifkan</a></button>
                    </td>
                    @else
                    <td>
                        <button class="btn btn-success "><a class="text-white" href="aktifNonaktifSiswa/{{$siswa->NIS}}">Aktifkan</a></button>
                    </td>
                    @endif
                    <td>
                        <button class="btn btn-primary "><a class="text-white" href="toUpdateSiswa/{{$siswa->NIS}}">Update</a></button>

                        <button class="btn btn-danger"><a class="text-white" href="deleteSiswa/{{$siswa->NIS}}">Delete</a></button>
                        {{-- <form action="/siswa/crud" method="post" class="form-horizontal">
                            @csrf
                            <button type="submit" class="btn btn-danger" name="Delete" value="{{$siswa->NIS}}">Delete</button>
                        </form> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>


</div>
@endsection
