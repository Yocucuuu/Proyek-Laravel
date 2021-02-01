@extends('adminlte.adminLayout')

@section('formGuru')
<div class="row-fluid">
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        <h5>Input Guru</h5>
        </div>

        <div class="widget-content nopadding">
        <form action="/guru/crud" method="POST" class="form-horizontal">
            @csrf
            <div class="control-group">
            <label class="control-label">Nama Lengkap Guru:</label>
            <div class="controls">
                <input type="text" class="span11" placeholder="Nama Lengkap Guru" name="nama" value="{{old("nama")}}" style="width: 250pt; height: 40px;  padding: 0.375rem 0.75rem; "/>
                @error('nama')
                    <br><span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
            </div>
            <div class="control-group">
            <label class="control-label">Kata Sandi :</label>
            <div class="controls">
                <input type="password"  class="span11" placeholder="Kata Sandi" name="pw" value="Pass1" style="width: 250pt; height: 40px;  padding: 0.375rem 0.75rem; "/>
                @error('pw')
                <br><span style="color: red;">{{ $message }}</span>
            @enderror
            </div>
            </div>
            <div class="control-group">
            <label class="control-label">Alamat :</label>
            <div class="controls">
                <input type="text"  class="span11" placeholder="Alamat" name="alamat" value="{{old("alamat")}}" style="width: 300pt; height: 40px;  padding: 0.375rem 0.75rem; "/>
                @error('alamat')
                <br><span style="color: red;">{{ $message }}</span>
            @enderror
            </div>
            </div>
            <div class="control-group">
                <label for="normal" class="control-label">Nomor Telepon</label>
                <div class="controls">
                <input type="text" class="span11" name="notelp" placeholder="No Telpon"value="{{old("notelp")}}" style="width: 100pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                @error('notelp')
                <br><span style="color: red;">{{ $message }}</span>
            @enderror
            </div>
            <div class="control-group">
                <label class="control-label">Status Guru</label>
                <div class="controls">
                <select class="span11" name="status" style="width: 90pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                    <option value="1" selected>Wali Kelas</option>
                    <option value="0">Guru Umum</option>
                </select>

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


</div>
<div class="widget-box">
    <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
      <h5>Table Guru</h5>
      <form action="/kefilterGuru" method="get">
        <input class="btn btn-success" style="margin-top: 1mm; margin-left: 80%;" type="submit" value="Filter Guru">
      </form>
    </div>
    <div class="widget-content nopadding">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>NIG</th>
            <th>Nama</th>
            <th>No HP</th>
            <th>Alamat</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($daftarGuru as $guru)
                <tr>
                    <td>{{$guru->NIG}}</td>
                    <td>{{$guru->Nama_guru}}</td>
                    <td>{{$guru->No_hp_guru}}</td>
                    <td>{{$guru->Alamat_guru}}</td>
                    <td>{{$guru->Status_guru}}</td>
                    <td>
                        <td>
                            <button class="btn btn-primary "><a class="text-white" href="toUpdateGuru/{{$guru->NIG}}">Update</a></button>

                            <button class="btn btn-danger"><a class="text-white" href="deleteGuru/{{$guru->NIG}}">Delete</a></button>

                        </td>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
<!--Chart-box-->

<!--End-Chart-box-->


{{--  --}}
@endsection
