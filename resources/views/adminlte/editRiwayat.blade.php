@extends('adminlte.adminLayout')

@section('editRiwayat')
    <div class="container" style="width: 800px">
        <div class="d-flex justify-content-center">
            <h1>Update Riwayat Akademik</h1>
        </div>
        <br>
        <br>
        @php
            $riwayat_akademik = Session::get("riwayat_akademik");
            // dd($siswa);
        @endphp
        <form action="{{url('/updateRiwayat')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Id Riwayat Akademik</label>
                        <input name="Id_riwayat_akademik"  value="{{$riwayat_akademik->Id_riwayat_akademik}}" type="text" class="form-control" aria-describedby="" placeholder="Enter Nilai" readonly style="width: 60pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                    </div>
                    <div class="form-group">
                        <label for="">Nilai Quiz1</label>
                        <input name="Quiz1"  value="{{$riwayat_akademik->Quiz1}}"  max="100" min="0"  type="text" class="form-control" aria-describedby="" placeholder="Enter Nilai" style="width: 50pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                    </div>
                    <div class="form-group">
                        <label for="">Nilai Quiz2</label>
                        <input name="Quiz2"  value="{{$riwayat_akademik->Quiz2}}" max="100" min="0"  type="text" class="form-control" aria-describedby="" placeholder="Enter Nilai" style="width: 50pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                    </div>
                    <div class="form-group">
                        <label for="">Nilai Tugas1</label>
                        <input name="Tugas1"  value="{{$riwayat_akademik->Tugas1}}" max="100" min="0"  type="text" class="form-control" aria-describedby="" placeholder="Enter Nilai" style="width: 50pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                    </div>
                    <div class="form-group">
                        <label for="">Nilai Tugas2</label>
                        <input name="Tugas2"  value="{{$riwayat_akademik->Tugas2}}" max="100" min="0"  type="text" class="form-control" aria-describedby="" placeholder="Enter Nilai" style="width: 50pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Nilai UTS</label>
                        <input name="UTS"  value="{{$riwayat_akademik->UTS}}" type="text" class="form-control" aria-describedby="" placeholder="Enter Nilai" style="width: 50pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                    </div>
                    <div class="form-group">
                        <label for="">Nilai UAS</label>
                        <input name="UAS"  value="{{$riwayat_akademik->UAS}}" type="text" class="form-control" aria-describedby="" placeholder="Enter Nilai" style="width: 50pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                    </div>
                    <div class="form-group">
                        <label for="">Sikap </label>
                        <input name="Sikap"  value="{{$riwayat_akademik->Sikap}}" type="text" class="form-control" aria-describedby="" placeholder="Enter Nilai" style="width: 50pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                    </div>
                    <div class="form-group">
                        <label for="">Hasil akhir</label>
                        <input name="Hasil_akhir"  value="{{$riwayat_akademik->Hasil_akhir}}" type="text" class="form-control" aria-describedby="" placeholder="Enter Nilai" style="width: 50pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                    </div>
                </div>
            </div>

            <button class="btn btn-primary" > <a class="text-white" href="/riwayat">Cancel</a></button>
            <input class="btn btn-success" type="submit" value="Update">
        </form>

    </div>
@endsection
