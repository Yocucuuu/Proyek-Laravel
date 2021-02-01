@extends('siswa.siswaLayout')

@section('lihatNilai')

<!--Chart-box-->

            <div class="row-fluid">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Table Nilai</h5>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Mata Pelajaran</th>
                                <th>Kelas</th>
                                <th>Quiz 1</th>
                                <th>Quiz 2</th>
                                <th>Tugas 1</th>
                                <th>Tugas 2</th>
                                <th>UTS</th>
                                <th>UAS</th>
                                <th>Sikap</th>
                                <th>Hasil Akhir</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @isset($nilaiSiswa) --}}
                                @foreach ($nilaiSiswa as $i)
                                    <tr>
                                        <td style="text-align: center;">{{$i->mapel->Nama_mapel}}</td>
                                        <td style="text-align: center;">{{$i->kelas->Nama_kelas}}</td>
                                        <td style="text-align: center;">{{$i->Quiz1}}</td>
                                        <td style="text-align: center;">{{$i->Quiz2}}</td>
                                        <td style="text-align: center;">{{$i->Tugas1}}</td>
                                        <td style="text-align: center;">{{$i->Tugas2}}</td>
                                        <td style="text-align: center;">{{$i->UTS}}</td>
                                        <td style="text-align: center;">{{$i->UAS}}</td>
                                        <td style="text-align: center;">{{$i->Sikap}}</td>
                                        <td style="text-align: center;">{{$i->Hasil_akhir}}</td>
                                    </tr>
                                @endforeach
                            {{-- @endisset --}}
                        </tbody>
                    </table>
                </div>
            </div>
            </div>

          </div>
<!--End-Chart-box-->
    <hr/>
</div>

@endsection
