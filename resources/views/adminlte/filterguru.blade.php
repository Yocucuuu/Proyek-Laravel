@extends('adminlte.adminLayout')

@section('formGuru')

<div>
    <form action="/filterGuru" method="post" class="form-horizontal">
        @csrf
        <h3>Filter </h3>
        <label class="control-label">Nama :</label>
        <input type="text" class="span7" placeholder="Search Nama Guru" name="nama"  style="width: 200pt; height: 40px;  padding: 0.375rem 0.75rem; "/>
        <br>
        <br>
        <label class="control-label">Status :</label>
        <select class="span11" name="filterstatus" style="width: 90pt; height: 40px;  padding: 0.375rem 0.75rem; ">
            <option value="none" selected>None</option>
            <option value="1" >Wali Kelas</option>
            <option value="0">Guru Umum</option>
        </select>
        <br>
        <br>
        <button style="margin-left: 6.5cm" type="submit" class="btn btn-success" name="filter">Filter</button>
    </form>
</div>

<div class="widget-box">
    <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
      <h5>Table Guru</h5>
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
