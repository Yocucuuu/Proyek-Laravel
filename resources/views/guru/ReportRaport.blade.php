<div class="row-fluid">
    <div class="widget-box">
        @isset($siswaRaport)
            <h4>Nama:{{$siswaRaport->Nama_siswa}}</h4>
        @endisset
        @isset($kelasRaport)
            <h4>Kelas:{{$kelasRaport->Nama_kelas}}</h4>
            <h4>Semester:{{$kelasRaport->periode->Semester}}</h4>
        @endisset
        <table class="table" style="border: 1px solid black;border-collapse: collapse;">
            <thead>
                <tr>
                    <th style="border: 1px solid black;border-collapse: collapse;">Mata Pelajaran</th>
                    <th style="border: 1px solid black;border-collapse: collapse;">KKM</th>
                    <th style="border: 1px solid black;border-collapse: collapse;">Quiz 1</th>
                    <th style="border: 1px solid black;border-collapse: collapse;">Quiz 2</th>
                    <th style="border: 1px solid black;border-collapse: collapse;">Tugas 1</th>
                    <th style="border: 1px solid black;border-collapse: collapse;">Tugas 2</th>
                    <th style="border: 1px solid black;border-collapse: collapse;">UTS</th>
                    <th style="border: 1px solid black;border-collapse: collapse;">UAS</th>
                    <th style="border: 1px solid black;border-collapse: collapse;">Sikap</th>
                    <th style="border: 1px solid black;border-collapse: collapse;">Hasil Akhir</th>
                    <th style="border: 1px solid black;border-collapse: collapse;">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @isset($riwayatRaport)
                    @foreach ($riwayatRaport as $i)
                        @if ($i->Hasil_akhir < $i->mapel->KKM)
                            <tr>
                                <td style="text-align: center;border: 1px solid black;color:red;border-collapse: collapse;">{{$i->mapel->Nama_mapel}}</td>
                                <td style="text-align: center;border: 1px solid black;color:red;border-collapse: collapse;">{{$i->mapel->KKM}}</td>
                                <td style="text-align: center;border: 1px solid black;color:red;border-collapse: collapse;">{{$i->Quiz1}}</td>
                                <td style="text-align: center;border: 1px solid black;color:red;border-collapse: collapse;">{{$i->Quiz2}}</td>
                                <td style="text-align: center;border: 1px solid black;color:red;border-collapse: collapse;">{{$i->Tugas1}}</td>
                                <td style="text-align: center;border: 1px solid black;color:red;border-collapse: collapse;">{{$i->Tugas2}}</td>
                                <td style="text-align: center;border: 1px solid black;color:red;border-collapse: collapse;">{{$i->UTS}}</td>
                                <td style="text-align: center;border: 1px solid black;color:red;border-collapse: collapse;">{{$i->UAS}}</td>
                                <td style="text-align: center;border: 1px solid black;color:red;border-collapse: collapse;">{{$i->Sikap}}</td>
                                <td style="text-align: center;border: 1px solid black;color:red;border-collapse: collapse;">{{$i->Hasil_akhir}}</td>
                                <td style="text-align: center;border: 1px solid black;color:red;border-collapse: collapse;">Tidak Lulus</td>
                            </tr>
                        @endif
                        @if ($i->Hasil_akhir > $i->mapel->KKM)
                            <tr>
                                <td style="text-align: center;border: 1px solid black;border-collapse: collapse;">{{$i->mapel->Nama_mapel}}</td>
                                <td style="text-align: center;border: 1px solid black;border-collapse: collapse;">{{$i->mapel->KKM}}</td>
                                <td style="text-align: center;border: 1px solid black;border-collapse: collapse;">{{$i->Quiz1}}</td>
                                <td style="text-align: center;border: 1px solid black;border-collapse: collapse;">{{$i->Quiz2}}</td>
                                <td style="text-align: center;border: 1px solid black;border-collapse: collapse;">{{$i->Tugas1}}</td>
                                <td style="text-align: center;border: 1px solid black;border-collapse: collapse;">{{$i->Tugas2}}</td>
                                <td style="text-align: center;border: 1px solid black;border-collapse: collapse;">{{$i->UTS}}</td>
                                <td style="text-align: center;border: 1px solid black;border-collapse: collapse;">{{$i->UAS}}</td>
                                <td style="text-align: center;border: 1px solid black;border-collapse: collapse;">{{$i->Sikap}}</td>
                                <td style="text-align: center;border: 1px solid black;border-collapse: collapse;">{{$i->Hasil_akhir}}</td>
                                <td style="text-align: center;border: 1px solid black;border-collapse: collapse;">Lulus</td>
                            </tr>
                        @endif
                    @endforeach
                @endisset
            </tbody>
        </table>
        <h6>Keterangan: <br>
        - Nilai Kenaikan Di hitung saat Semester 2 jika Nilai Merah Melebihi dari 3 Dianggap Tidak Naik Kelas. <br>
        - Hasil Akhir = (((Tugas 1 + Tugas 2 + Quiz 1 + Quiz 2)/ 4)*0.3) + (UTS * 0.3) + (UAS * 0.4)</h6>
        </div>
        </div>
    </div>
</div>
<!--End-Chart-box-->
</div>
