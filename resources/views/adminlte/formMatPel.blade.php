@extends('adminlte.adminLayout')

@section('formMapel')
<!--Chart-box-->
<div class="row-fluid">
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Input Mata Pelajaran</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="/mapel/crud" method="post" class="form-horizontal">
            @csrf
            <div class="control-group">
              <label class="control-label">Nama Mata Pelajaran :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Nama Mata Pelajaran" name="nama" style="width: 150pt; height: 40px;  padding: 0.375rem 0.75rem; "/>
                @error('nama')
                        <br><span style="color: red;">{{ $message }}</span>
                    @enderror
            </div>
            </div>
            <div class="control-group">
              <label class="control-label">KKM :</label>
              <div class="controls">
                <input type="text"  class="span11" placeholder="KKM"  name="kkm" style="width: 50pt; height: 40px;  padding: 0.375rem 0.75rem; "/>
                @error('kkm')
                        <br><span style="color: red;">{{ $message }}</span>
                    @enderror
            </div>
            </div>
            <div class="control-group">
              <label class="control-label">Tingkat Mata Pelajaran :</label>
              <div class="controls">
                <select class="span11" name="tingkat" style="width: 250pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                </select>
                 @error('tingkat')
                        <br><span style="color: red;">{{ $message }}</span>
                    @enderror
            </div>
            </div>
            <label class="control-label">Jurusan :</label>
                <div class="controls">
                  <select class="form-control span11" name="id_jurusan" style="width: 250pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                      @isset($jurusan)
                          @foreach ($jurusan as $i)
                  <option value="{{$i->Id_jurusan}}">{{$i->Nama_jurusan}}
                     </option>
                          @endforeach
                      @endisset
                  </select>
                  @error('id_jurusan')
                      <br><span style="color: red;">{{ $message }}</span>
                  @enderror
                  </div>
            <div class="form-actions">
              <button type="submit" class="btn btn-success" name="Insert">Insert</button>
              <button type="submit" class="btn btn-success" name="Update">Update</button>
            </div>
          </form>
        </div>
    </div>
</div>


<div class="widget-box">
    <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
      <h5>Table Mata Pelajaran</h5>
      <form action="/kefilterMapel" method="get">
        <input class="btn btn-success" style="margin-top: 1mm; margin-left: 80%;" type="submit" value="Filter Mapel">
      </form>
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
