@extends('siswa.siswaLayout')

@section('editBiodata')

<!--Chart-box-->
    <div class="row-fluid">
        <div class="widget-box">
            <div class="widget-title bg_lo"  data-toggle="collapse" href="#collapseG3" > <span class="icon"> <i class="icon-chevron-down"></i> </span>
              <h5>Biodata</h5>
            </div>
            <input type="text" name="" id="" placeholder="Nama"><br>
            <input type="text" name="" id="" placeholder="Tempat Lahir"><br>
            <input type="text" name="" id="" placeholder="Tanggal Lahir"><br>
            <input type="text" name="" id="" placeholder="Nama Ibu"><br>
            <input type="text" name="" id="" placeholder="Nama Ayah"><br>
            <input type="text" name="" id="" placeholder="Agama"><br>
            <input type="text" name="" id="" placeholder="Alamat"><br>
            <input type="password" name="" id="" placeholder="Password"><br>
            <input type="password" name="" id="" placeholder="Confirm Password"><br>
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

@endsection
