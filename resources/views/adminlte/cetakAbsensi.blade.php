<div class="row-fluid">
    <div class="widget-box">
        <h4>Kelas:{{$kelasAbsensi->Nama_kelas}}</h4>
        <h4>Semester:{{$kelasAbsensi->periode->Semester}}</h4>
        <h4>Mata Pelajaran : ...</h4>
        <h4>Materi : ...</h4>
        <table class="table" style="border: 1px solid black;border-collapse: collapse;">
            <thead>
                <tr>
                    <th style="border: 1px solid black;border-collapse: collapse;">NISN</th>
                    <th style="border: 1px solid black;border-collapse: collapse;">Nama</th>
                    <th style="border: 1px solid black;border-collapse: collapse;">Minggu 1</th>
                    <th style="border: 1px solid black;border-collapse: collapse;">Minggu 2</th>
                    <th style="border: 1px solid black;border-collapse: collapse;">Minggu 3</th>
                    <th style="border: 1px solid black;border-collapse: collapse;">Minggu 4</th>
                    <th style="border: 1px solid black;border-collapse: collapse;">Minggu 5</th>
                    <th style="border: 1px solid black;border-collapse: collapse;">Minggu 6</th>
                    <th style="border: 1px solid black;border-collapse: collapse;">Minggu 7</th>
                    <th style="border: 1px solid black;border-collapse: collapse;">Minggu 8</th>
                    <th style="border: 1px solid black;border-collapse: collapse;">Minggu 9</th>
                    <th style="border: 1px solid black;border-collapse: collapse;">Minggu 10</th>
                    <th style="border: 1px solid black;border-collapse: collapse;">Minggu 11</th>
                    <th style="border: 1px solid black;border-collapse: collapse;">Minggu 12</th>
                    <th style="border: 1px solid black;border-collapse: collapse;">Minggu 13</th>
                    <th style="border: 1px solid black;border-collapse: collapse;">Minggu 14</th>
                    <th style="border: 1px solid black;border-collapse: collapse;">Minggu 15</th>
                    <th style="border: 1px solid black;border-collapse: collapse;">Minggu 16</th>
                </tr>
            </thead>
            <tbody>
                @isset($siswaKelas)
                    @foreach ($siswaKelas as $i)
                        <tr>
                            <td style="text-align: center;border: 1px solid black;border-collapse: collapse;">{{$i->NISN}}</td>
                            <td style="text-align: center;border: 1px solid black;border-collapse: collapse;">{{$i->Nama_siswa}}</td>
                            <td style="text-align: center;border: 1px solid black;border-collapse: collapse;"> ... </td>
                            <td style="text-align: center;border: 1px solid black;border-collapse: collapse;"> ... </td>
                            <td style="text-align: center;border: 1px solid black;border-collapse: collapse;"> ... </td>
                            <td style="text-align: center;border: 1px solid black;border-collapse: collapse;"> ... </td>
                            <td style="text-align: center;border: 1px solid black;border-collapse: collapse;"> ... </td>
                            <td style="text-align: center;border: 1px solid black;border-collapse: collapse;"> ... </td>
                            <td style="text-align: center;border: 1px solid black;border-collapse: collapse;"> ... </td>
                            <td style="text-align: center;border: 1px solid black;border-collapse: collapse;"> ... </td>
                            <td style="text-align: center;border: 1px solid black;border-collapse: collapse;"> ... </td>
                            <td style="text-align: center;border: 1px solid black;border-collapse: collapse;"> ... </td>
                            <td style="text-align: center;border: 1px solid black;border-collapse: collapse;"> ... </td>
                            <td style="text-align: center;border: 1px solid black;border-collapse: collapse;"> ... </td>
                            <td style="text-align: center;border: 1px solid black;border-collapse: collapse;"> ... </td>
                            <td style="text-align: center;border: 1px solid black;border-collapse: collapse;"> ... </td>
                            <td style="text-align: center;border: 1px solid black;border-collapse: collapse;"> ... </td>
                            <td style="text-align: center;border: 1px solid black;border-collapse: collapse;"> ... </td>
                            {{-- 16  --}}
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
