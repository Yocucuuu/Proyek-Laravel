<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Email Registrasi</title>
</head>
<body>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
        <h5 class="card-title">Hi {{$siswa->Nama_siswa}}</h5>
          <h6 class="card-subtitle mb-2 text-muted">Akun Baru Siswa</h6>
          <p class="card-text">Selamat Bergabung dengan kita , untuk login di website sekolah bisa menggunakan akun berikut</p>
            <br>
            <h6>NIS : {{$nis}}</h6>
            <h6>Pasword : {{$pass}}</h6>
            <br>
          <a href="#" class="card-link">OGRADE's Home</a>
        </div>
      </div>
</body>
</html>
