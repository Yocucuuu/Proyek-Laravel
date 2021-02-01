@extends('adminlte.adminLayout')

@section('formPeriodeAkademik')
<!--Chart-box-->
<div class="row-fluid">
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Input Periode</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="/perodAkad/crud" method="post" class="form-horizontal">
            @csrf
            <div class="control-group">
              <label class="control-label">Tahun Ajaran :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Tahun Ajaran" name="TahunAjaran" style="width: 50pt; height: 40px;  padding: 0.375rem 0.75rem; "/>
                @error('TahunAjaran')
                            <br><span style="color: red;">{{ $message }}</span>
                        @enderror
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Semester :</label>
              <div class="controls">
                <input type="text"  class="span11" placeholder="Semester" name="Semester" style="width: 65pt; height: 40px;  padding: 0.375rem 0.75rem; " />
                @error('Semester')
                            <br><span style="color: red;">{{ $message }}</span>
                        @enderror
              </div>
            </div>
            <div class="control-group">
                <label class="control-label">Status Periode Akademik</label>
                <div class="controls">
                <select class="span11" name="Status" style="width: 100pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                    <option value="1" selected>Aktif</option>
                    <option value="0">Tidak Aktif</option>
                </select>
                @error('status')
                            <br><span style="color: red;">{{ $message }}</span>
                        @enderror
                </div>
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
      <h5>Table Periode Akademik</h5>
    </div>
    <div class="widget-content nopadding">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>TAHUN AJARAN</th>
            <th>SEMESTER</th>
            <th>STATUS</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($daftarPerodAkademik as $PA)
                <tr>
                    <td>{{$PA->Id_periode}}</td>
                    <td>{{$PA->Tahun_ajaran}}</td>
                    <td>{{$PA->Semester}}</td>
                    <td>{{$PA->Status}}</td>
                        <td>
                            <button class="btn btn-primary "><a class="text-white" href="toUpdatePeriode/{{$PA->Id_periode}}">Update</a></button>

                            <button class="btn btn-danger"><a class="text-white" href="deletePeriode/{{$PA->Id_periode}}">Delete</a></button>

                        </td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>

@endsection
