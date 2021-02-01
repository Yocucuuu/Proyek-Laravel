@extends('guru.guruLayout')

@section('editNilai')
<div class="container" style="width: 800px">
    <div class="d-flex justify-content-center">
        <h1>Update Riwayat</h1>
    </div>
    <div class="d-flex justify-content-center">
        <h2>{{$riwayat->siswa->Nama_siswa.' - '.$riwayat->kelas->Tingkat_kelas.$riwayat->kelas->Nama_kelas.' - '.$riwayat->mapel->Nama_mapel}}</h2>
    </div>

    <script>
        function rata(){
            var quiz1= parseInt($("#quiz1").val());
            var quiz2= parseInt($("#quiz2").val());
            var tugas1= parseInt($("#tugas1").val());
            var tugas2= parseInt($("#tugas2").val());
            var uts= parseInt($("#UTS").val());
            var uas= parseInt($("#UAS").val());
            var akhir= $("#nilaiAkhir").val();
            var nilai = (uas*(0.4))+(uts*(0.3))+(((quiz1+quiz2+tugas1+tugas2)/4)*(0.3));
            return nilai;
        }
        $("document").ready(function(){
            $("#nilaiAkhir").val(rata());

            $(".nilai").change(function(){
                $("#nilaiAkhir").val(rata());
            });

        });

    </script>
    <form action="{{url('/updateRiwayat')}}" method="POST">
        @csrf
        <input type="hidden" name="idRiwayat" value="{{$riwayat->Id_riwayat_akademik}}">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Quiz 1</label>
                    <input class="form-control nilai" value="{{$riwayat->Quiz1}}" max="100" min="0" id="quiz1" name="quiz1" type="number" aria-describedby="" placeholder="" style="height: 40px">
                </div>
                <div class="form-group">
                    <label for="">Quiz 2</label>
                    <input id="quiz2" class="form-control nilai" value="{{$riwayat->Quiz2}}" max="100" min="0"  name="quiz2" type="number" aria-describedby="" placeholder="" style="height: 40px">
                </div>
                <div class="form-group">
                    <label for="">Tugas 1</label>
                    <input id="tugas1" class="form-control nilai" value="{{$riwayat->Tugas1}}" max="100" min="0"  name="tugas1" type="number" aria-describedby="" placeholder="" style="height: 40px">
                </div>
                <div class="form-group">
                    <label for="">Tugas 2</label>
                    <input id="tugas2" class="form-control nilai" value="{{$riwayat->Tugas2}}" max="100" min="0"  name="tugas2" type="number" aria-describedby="" placeholder="" style="height: 40px">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="">UTS</label>
                    <input id="UTS" class="form-control nilai" value="{{$riwayat->UTS}}" max="100" min="0"  name="UTS" type="number" aria-describedby="" placeholder="" style="height: 40px">
                </div>
                <div class="form-group">
                    <label for="">UAS</label>
                    <input id="UAS" class="form-control nilai" value="{{$riwayat->UAS}}" max="100" min="0"  name="UAS" type="number" aria-describedby="" placeholder="" style="height: 40px">
                </div>

                <div class="form-group">
                    <label for="">Sikap</label>
                    <select class="form-control" name="sikap" style="height: 40px">
                        <option value="a" selected>A</option>
                        <option value="b" >B</option>
                        <option value="c" >C</option>
                        <option value="d" >D</option>
                    </select>
                </div>
            </div>
        </div>
                    <div class="form-group">
                        <h3>Nilai Akhir</h3>
                        <input id="nilaiAkhir" name="nilaiAkhir" type="text" readonly class="form-control" value=""  style="height: 40px; width: 80px" >
                    </div>

        <button class="btn btn-primary" > <a class="text-white" href="/inputNilai">Cancel</a></button>
        <input class="btn btn-success" type="submit" value="Update">
    </form>

</div>
@endsection
