@extends('siswa.siswaLayout')

@section('biodata')

<!--Chart-box-->
    <div class="row-fluid">
        <div class="widget-box">
            <div class="widget-title bg_lo"  data-toggle="collapse" href="#collapseG3" > <span class="icon"> <i class="icon-chevron-down"></i> </span>
              <h5>Biodata</h5>
            </div>
            NIS: {{$biodata->NIS}}<br>
            NISN: {{$biodata->NISN}}<br>
            Nama: {{$biodata->Nama_siswa}}<br>
            Tempat,Tanggal Lahir: {{$biodata->Tempat_lahir_siswa}},{{$biodata->Tanggal_lahir_siswa}}<br>
            Nama Ibu: {{$biodata->Nama_ibu}}<br>
            Nama Ayah: {{$biodata->Nama_ayah}}<br>
            Agama: {{$biodata->Agama}}<br>
            Alamat: {{$biodata->Alamat_siswa}}<br>
            <form action="EditBiodata" method="get">
                <input type="submit" value="Edit">
            </form>
            </div>

          </div>
        </div>
    </div>
<!--End-Chart-box-->
    <hr/>
</div>
@if (Session::has('message'))
        <script>alert(`{{ Session::get('message') }}`)</script>
    @endif
@endsection
