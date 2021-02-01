@extends('adminlte.adminLayout')

@section('formMapel')
<!--Chart-box-->

<div>
    <form action="/filterMapel" method="post" class="form-horizontal">
        @csrf
        <h3>Filter </h3>
        <label class="control-label">Nama Mata Pelajaran :</label>
        <input type="text" class="span7" placeholder="Search Nama Kelas" name="nama"  style="width: 200pt; height: 40px;  padding: 0.375rem 0.75rem; "/>
        <br>
        <br>
        <label class="control-label">Tingkatan Kelas: </label>
            <select class="span11" name="filtertingkatankelas" style="width: 100pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                <option value="none"selected>None</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
        <br>
        <br>
        <button style="margin-left: 6.5cm" type="submit" class="btn btn-success" name="filter">Filter</button>
    </form>
</div>

<div class="widget-box">
    <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
      <h5>Table Mata Pelajaran</h5>
    </div>
    <div class="widget-content nopadding">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nama Mata Pelajaran</th>
            <th>KKM</th>
            <th>Tingkat</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($daftarMatPel as $mapel)
                <tr>
                    <td>{{$mapel->Id_mapel}}</td>
                    <td>{{$mapel->Nama_mapel}}</td>
                    <td>{{$mapel->KKM}}</td>
                    <td>{{$mapel->Tingkat}}</td>
                    <td>
                        <form action="/mapel/crud" method="post" class="form-horizontal">
                            @csrf
                            <button type="submit" class="btn btn-danger" name="Delete" value="{{$mapel->Id_mapel}}">Delete</button>
                        </form>
                        <button class="btn btn-primary "><a class="text-white" href="toUpdateMapel/{{$mapel->Id_mapel}}">Update</a></button>

                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>

@endsection
