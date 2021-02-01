@extends('siswa.siswaLayout')

@section('jurusan')

<!--Chart-box-->
<form action="/JurusanTerpilih" method="post">
    @csrf
    <div class="row-fluid">
        <div class="widget-box">
                <div class="widget-title bg_lo"  data-toggle="collapse" href="#collapseG3" > <span class="icon">
                    <i class="icon-chevron-down"></i> </span>
                <h5>Pilih Jurusan</h5>
                </div>
                <div class="control-group">
                    <label class="control-label">Jurusan Yang Dipilih</label>
                    <div class="controls">
                    <select class="span11" name="id_jurusan">
                        @foreach ($DBJurusan as $i)
                            <option value="{{$i->Id_jurusan}}">{{$i->Nama_jurusan}}</option>
                        @endforeach
                    </select>
                </div>
                    @isset($jurusanRekomendasi)
                        Rekomendasi : {{$jurusanRekomendasi}}
                    @endisset
                </div>
                <button type="submit" class="btn btn-success" name="pilihJurusan">Pilih Jurusan</button>
            </div>
        </div>
    </div>
</form>
<!--End-Chart-box-->
    <hr/>
</div>

@endsection
