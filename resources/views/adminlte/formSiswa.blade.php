@extends('adminlte.adminLayout')

@section('formSiswa')
    @if (Session::has('berhasil'))
        <div class="alert alert-success">
            <h1>{{ Session::get('berhasil') }}</h1>
        </div>
    @endif
    @if (Session::has('gagal'))
        <div class="alert alert-danger">
            <h1>{{ Session::get('gagal') }}</h1>
        </div>
    @endif
<div class="widget-box">

<div class="row-fluid">
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Input Siswa</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="/siswa/crud" method="post" class="form-horizontal">
            @csrf
            <div class="control-group">
              <label class="control-label">NISN :</label>
              <div class="controls">
                <input type="text" class="span7" placeholder="NISN" name="nisn" style="width: 100pt; height: 40px;  padding: 0.375rem 0.75rem; "/>
              </div>
            </div>
            {{-- <div class="control-group">
              <label class="control-label">NIS :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="NIS" name="nis"/> --}}
                {{-- @error('nis')
                    <br><span style="color: red;">{{ $message }}</span>
                @enderror --}}
              {{-- </div> --}}
            {{-- </div> --}}
            <div class="control-group">
              <label class="control-label">Nama Lengkap :</label>
              <div class="controls">
                <input type="text" class="span7" placeholder="Nama Lengkap" name="nama" style="width: 200pt; height: 40px;  padding: 0.375rem 0.75rem; " />
                @error('nama')
                    <br><span style="color: red;">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Kata Sandi :</label>
              <div class="controls">
                <input type="password" class="span7" value="Pass1" placeholder="Kata Sandi" name="pw"  style="width: 200pt; height: 40px;  padding: 0.375rem 0.75rem; "/>
                @error('pw')
                    <br><span style="color: red;">{{ $message }}</span>
                @enderror
              </div>

            </div>
            <div class="control-group">
              <label class="control-label">Tempat Lahir :</label>
              <div class="controls">
                <input type="text"  class="span7" placeholder="Tempat lahir" name="tmptLahir"  style="width: 150pt; height: 40px;  padding: 0.375rem 0.75rem; "/>
                @error('tmptLahir')
                    <br><span style="color: red;">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Email  :</label>
              <div class="controls">
                <input type="text"  class="span7" placeholder="Email Siswa" name="email" />
                @error('email')
                    <br><span style="color: red;">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Tanggal Lahir :</label>
              <div class="controls">
                  <input type="date" value="12-02-2012"  data-date-format="dd-mm-yyyy" class="span7" name="tglLahir" style="width: 120pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                  @error('tglLahir')
                    <br><span style="color: red;">{{ $message }}</span>
                  @enderror
              </div>
            </div>
            <div class="control-group">
                <label class="control-label">Nama Ibu :</label>
                <div class="controls">
                    <input type="text"  class="span7" placeholder="Nama Ibu" name="NameMom"  style="width: 200pt; height: 40px;  padding: 0.375rem 0.75rem; "/>
                    @error('NameMom')
                        <br><span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Nama Ayah :</label>
                <div class="controls">
                    <input type="text"  class="span7" placeholder="Nama Ayah" name="NameDad"  style="width: 200pt; height: 40px;  padding: 0.375rem 0.75rem; "/>
                    @error('NameDad')
                        <br><span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="control-group">
              <label for="normal" class="control-label">Alamat :</label>
              <div class="controls">
                <input type="text" class="form-control span7" name="alamat" placeholder="alamat" style="width: 300pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                @error('alamat')
                        <br><span style="color: red;">{{ $message }}</span>
                    @enderror
            </div>
            <div class="control-group">
              <label class="control-label">Agama :</label>
              <div class="controls">
                <select class="form-control span7" name="agama"  style="width: 100pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                    <option value="Islam" selected>Islam</option>
                    <option value="Budha">Budha</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Katholik">Katolik</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Konghucu">Konghucu</option>
                </select>
                @error('agama')
                    <br><span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
            </div>
            <div class="control-group">
                <label class="control-label">Jenis Kelamin</label>
                <div class="controls">
                  <select class="span7" name="jk">
                    <option value="pria" selected>Pria</option>
                    <option value="wanita">Wanita</option>
                  </select>
                  @error('jk')
                        <br><span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Status Siswa</label>
                <div class="controls">
                  <select class="form-control span7" name="status" style="width: 100pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                    <option value="1" selected>Aktif</option>
                    <option value="0">Tidak Aktif</option>
                  </select>
                  @error('status')
                        <br><span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Kelas</label>
                <div class="controls">
                  <select class="span7" name="kelas" style="width: 130pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                      @isset($DBkelas)
                        @foreach ($DBkelas as $i)
                        <option value="{{$i->Id_kelas}}" selected>{{$i->Nama_kelas . "- Tingkat ".$i->Tingkat_kelas}}</option>
                        @endforeach
                      @endisset
                  </select>
                  @error('kelas')
                        <br><span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Jurusan</label>
                <div class="controls">
                  <select class="span7" name="jurusan" style="width: 130pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                      @isset($DBJurusan)
                        @foreach ($DBJurusan as $i)
                        <option value="{{$i->Id_jurusan}}" selected>{{$i->Nama_jurusan}}</option>
                        @endforeach
                      @endisset
                  </select>
                  @error('jurusan')
                        <br><span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
              </div>
            <div class="form-actions">
              <button type="submit" class="btn btn-success" name="Insert">Insert</button>
              {{-- <button type="submit" class="btn btn-success" name="Update">Update</button> --}}
            </div>
          </form>
          {{-- form untuk admin input siswa dengan excel --}}
            <div class="controls">
                <form action="GetFormatSiswa" method="get">
                    @csrf
                    Download Format Siswa:
                    <input type="submit" value="Format Input Siswa">
                </form>
            </div>
            <form action="/siswa/import" method="post" enctype="multipart/form-data">
                @csrf
                <div class="control-group">
                    <label class="control-label">File Siswa:</label>
                    <div class="controls">

                    <input type="file" accept=".xlsx, .xls, .csv" id="file" name="fileSiswa" onchange="checkfile(this);"  /> Import Siswa Format File: Excel
                    </div>
                </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success" name="Insert">Import</button>
                        {{-- <button type="submit" class="btn btn-success" name="Update">Update</button> --}}
                      </div>
            </form>


        </div>
    </div>
</div>



<div class="widget-box">
    <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
      <h5>Table Siswa</h5>
      <form action="/kefilterSiswa" method="get">
        <input class="btn btn-success" style="margin-top: 1mm; margin-left: 80%;" type="submit" value="Filter Siswa">
      </form>
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
    <script>
        function checkfile(sender) {
            var validExts = new Array(".xlsx", ".xls", ".csv");
            var fileExt = sender.value;
            fileExt = fileExt.substring(fileExt.lastIndexOf('.'));
            if (validExts.indexOf(fileExt) < 0) {
            alert("Invalid file selected, valid files are of " +
                    validExts.toString() + " types.");
            return false;
            }
            else return true;
        }
    </script>

<!--End-Chart-box-->

@endsection
