<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:login.php");
}
require 'koneksi.php';
$mobil = query("SELECT * FROM mobil");
$sopir = query("SELECT * FROM sopir");

if (isset($_POST["submit"])) {
    if (tambah($_POST) > 0) {
        echo "<script>
        alert('Data berhasil ditambahkan');
        document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
        alert('Data gagal ditambahkan');
        document.location.href = 'index.php';
        </script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <!-- FontAwesome Script -->
    <script src="https://kit.fontawesome.com/de0d5c5a2a.js" crossorigin="anonymous"></script>

    <title>Rental Mobil</title>
</head>
<style>
    .container {
        width: 500px;
        box-shadow: 0px 0px 10px black;
    }

    input.form-control {
        border-radius: 20px;
    }

    select.form-select {
        border-radius: 20px;
    }
</style>

<body>
    <div class="container mt-3 p-3">
        <h1 class="text-center fs-3">Tambah Data</h1>
        <form method="post">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" />
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" />
            </div>

            <div class="mb-3">
                <label for="tglpinjam" class="form-label">Tanggal Pinjam</label>
                <input type="date" class="form-control" id="tglpinjam" name="tglpinjam" />
            </div>

            <div class="mb-3">
                <label for="tglkembali" class="form-label">Tanggal Kembali</label>
                <input type="date" class="form-control" id="tglkembali" name="tglkembali" />
            </div>

            <div class="mb-3">
                <label for="namamobil" class="form-label">Nama Mobil</label>
                <select class="form-select" aria-label="Default select example" id="namamobil" name="namamobil">
                    <option selected>Pilih Mobil</option>

                    <?php foreach ($mobil as $row) : ?>
                        <option value="<?= $row['id_mobil'] ?>"><?= $row['nama_mobil'] ?></option>
                    <?php endforeach; ?>

                </select>
            </div>

            <div class="mb-3">
                <label for="namasopir" class="form-label">Nama Sopir</label>
                <select class="form-select" aria-label="Default select example" id="namasopir" name="namasopir">
                    <option selected>Pilih Sopir</option>

                    <?php foreach ($sopir as $row) : ?>
                        <option value="<?= $row['id_sopir'] ?>"><?= $row['nama_sopir'] ?></option>
                    <?php endforeach; ?>

                </select>
            </div>

            <button type="submit" class="btn btn-primary" name="submit">
                Tambah
            </button>
            <a href="index.php" class="btn btn-secondary"><i class="fa-solid fa-rotate-left"></i> Kembali</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>