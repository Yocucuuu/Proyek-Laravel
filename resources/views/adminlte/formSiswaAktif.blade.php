<div class="row-fluid">
    <div class="widget-box">
        <h1>Daftar Siswa Aktif</h1>
        <br>
        <table class="table" style="border: 1px solid black;border-collapse: collapse;">
            <thead>
                <tr>
                    <th style="border: 1px solid black;border-collapse: collapse;">NISN</th>
                    <th style="border: 1px solid black;border-collapse: collapse;">NIS</th>
                    <th style="border: 1px solid black;border-collapse: collapse;">Nama</th>
                    <th style="border: 1px solid black;border-collapse: collapse;">Jurusan</th>
                    <th style="border: 1px solid black;border-collapse: collapse;">Kelas</th>
                </tr>
            </thead>
            <tbody>
                @isset($DBsiswa)
                    @foreach ($DBsiswa as $i)
                            <tr>
                                <td style="text-align: center;border: 1px solid black;color:black;border-collapse: collapse;">{{$i->NISN}}</td>
                                <td style="text-align: center;border: 1px solid black;color:black;border-collapse: collapse;">{{$i->NIS}}</td>
                                <td style="text-align: center;border: 1px solid black;color:black;border-collapse: collapse;">{{$i->Nama_siswa}}</td>
                                <td style="text-align: center;border: 1px solid black;color:black;border-collapse: collapse;">{{$i->jurusan->Nama_jurusan}}</td>
                                <td style="text-align: center;border: 1px solid black;color:black;border-collapse: collapse;">{{$i->kelas->Nama_kelas}}</td>
                            </tr>
                    @endforeach
                @endisset
            </tbody>
        </table>
        </div>
        </div>
    </div>
</div>
<!--End-Chart-box-->
</div>
