@extends('guru.guruLayout')

@section('inputNilai')

<div class="widget-box">
    <!--Chart-box-->
    <!--End-Chart-box-->
    <!--Chart-box-->

    <!--End-Chart-box-->
    <div class="widget-title">
        <span class="icon"> <i class="icon-th"></i> </span>
        <h5>Murid Kelas</h5>
    </div>
    <div class="widget-content">
        <table class="table" >
            <thead >
              <tr>
                <th scope="col">Nama Murid</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @isset($siswaKelas)
                    @foreach ($siswaKelas as $i)
                        <tr>
                            <td class="text-center">{{$i->Nama_siswa}}</td>
                            <td class="text-center">
                                <button class="btn btn-success">
                                    <a href="/toRaport/{{$i->NIS}}">
                                        Raport Akademik
                                    </a>
                                </button>
                            </td>
                        </tr>
                    @endforeach

                @endisset
            </tbody>
          </table>
    </div>
  </div>

    <hr/>
</div>

@endsection
