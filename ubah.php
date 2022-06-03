<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:login.php");
}
require 'koneksi.php';

$id = $_GET['id_peminjam'];

$mobil = query("SELECT * FROM mobil");
$sopir = query("SELECT * FROM sopir");
$peminjam = query("SELECT * FROM peminjam, mobil, sopir, transaksi WHERE peminjam.id_mobil = mobil.id_mobil AND peminjam.id_sopir = sopir.id_sopir AND peminjam.id_peminjam = transaksi.id_peminjam AND peminjam.id_peminjam = $id")[0];

if (isset($_POST["submit"])) {
    if (ubah($_POST) > 0) {
        echo "<script>
        alert('Data berhasil diubah');
        document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
        alert('Data gagal diubah');
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
        <h1 class="text-center fs-3">Ubah Data</h1>
        <form method="post">
            <input type="hidden" name="id_peminjam" value="<?= $peminjam["id_peminjam"] ?>">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $peminjam["nama_peminjam"] ?>" />
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $peminjam["alamat_peminjam"] ?>" />
            </div>

            <div class="mb-3">
                <label for="tglpinjam" class="form-label">Tanggal Pinjam</label>
                <input type="date" class="form-control" id="tglpinjam" name="tglpinjam" value="<?= $peminjam["tanggal_pinjam"] ?>" />
            </div>

            <div class="mb-3">
                <label for="tglkembali" class="form-label">Tanggal Kembali</label>
                <input type="date" class="form-control" id="tglkembali" name="tglkembali" value="<?= $peminjam["tanggal_kembali"] ?>" />
            </div>

            <div class="mb-3">
                <label for="namamobil" class="form-label">Nama Mobil</label>
                <select class="form-select" aria-label="Default select example" id="namamobil" name="namamobil">
                    <option selected><?= $peminjam["nama_mobil"] ?></option>

                    <?php foreach ($mobil as $row) : ?>
                        <option value="<?= $row['id_mobil'] ?>"><?= $row['nama_mobil'] ?></option>
                    <?php endforeach; ?>

                </select>
            </div>

            <div class="mb-3">
                <label for="namasopir" class="form-label">Nama Sopir</label>
                <select class="form-select" aria-label="Default select example" id="namasopir" name="namasopir">
                    <option selected><?= $peminjam["nama_sopir"] ?></option>

                    <?php foreach ($sopir as $row) : ?>
                        <option value="<?= $row['id_sopir'] ?>"><?= $row['nama_sopir'] ?></option>
                    <?php endforeach; ?>

                </select>
            </div>

            <button type="submit" class="btn btn-primary" name="submit">
                Ubah
            </button>
            <a href="index.php" class="btn btn-secondary"><i class="fa-solid fa-rotate-left"></i> Kembali</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>