@extends('adminlte.adminLayout')

@section('formPengumuman')

<div class="widget-box">
    <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
      <h5>Table Siswa</h5>
    </div>
    <div class="widget-content nopadding">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Tanggal</th>
            <th>Nama File</th>
            <th>ID Admin</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($daftarToa as $Toa)
                <tr>
                    <td>{{$Toa->Id_pengumuman}}</td>
                    <td>{{$Toa->Judul_pengumuman}}</td>
                    <td>{{$Toa->Tanggal_pengumuman}}</td>
                    <td>{{$Toa->File_pengumuman}}</td>
                    <td>{{$Toa->Id_administrasi}}</td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
<!--Chart-box-->
    <div class="row-fluid">
        <div class="widget-box">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                <h5>Input Pengumuman</h5>
                </div>
                <div class="widget-content nopadding">
                <form action="/toa/crud" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <div class="control-group">
                        <label class="control-label">Judul :</label>
                        <div class="controls">
                          <input type="text" class="span11" placeholder="Nama Lengkap" name="namaToa"/>
                          @error('namaToa')
                        <br><span style="color: red;">{{ $message }}</span>
                    @enderror
                        </div>
                      </div>
                    <div class="control-group">
                        <label class="control-label">File Pengumuman Input</label>
                        <div class="controls">
                          <input type="file" name="fileToa"/>
                            @error('fileToa')
                                <br><span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>
                      </div>
                    <div class="form-actions">
                    <button type="submit" class="btn btn-success" name="Insert">Insert</button>
                    </div>
                </form>
                </div>
            </div>
          </div>
        </div>
    </div>
<!--End-Chart-box-->
    <hr/>
</div>
@endsection
