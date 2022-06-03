<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:index.html");
}
require 'koneksi.php';

$sql = query("SELECT * FROM peminjam, mobil, sopir WHERE peminjam.id_mobil = mobil.id_mobil AND peminjam.id_sopir = sopir.id_sopir");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors" />
    <meta name="generator" content="Hugo 0.88.1" />
    <title>Rent Car</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sidebars/" />

    <!-- FontAwesome Script -->
    <script src="https://kit.fontawesome.com/de0d5c5a2a.js" crossorigin="anonymous"></script>

    <!-- Jquery Script -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <meta name="theme-color" content="#7952b3" />

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        .bar {
            cursor: pointer;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

    <!-- Custom styles for this template -->
    <link href="sidebars.css" rel="stylesheet" />
</head>

<body>
    <main>
        <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark sidebar" style="width: 280px">
            <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <img src="img/logo.png" class="me-3" width="40" />
                <span class="fs-4">Rent Car</span>
            </a>
            <hr />
            <ul class="nav nav-pills flex-column mb-auto">
                <li>
                    <a href="index.php" class="nav-link active text-white"><img src="img/dashboard.png" class="me-2" width="20" /> Dashboard
                    </a>
                </li>
                <li>
                    <a href="mobil.php" class="nav-link text-white">
                        <img src="img/car.png" class="me-2" width="20" /> Mobil
                    </a>
                </li>
                <li>
                    <a href="transaksi.php" class="nav-link text-white">
                        <img src="img/transaction.png" class="me-2" width="20" />
                        Transaksi
                    </a>
                </li>
                <li>
                    <a href="sopir.php" class="nav-link text-white">
                        <img src="img/driver.png" class="me-2" width="20" /> Sopir
                    </a>
                </li>
            </ul>
            <hr />
            <div class="container">
                <div class="row">
                    <div class="col fs-5">
                        Hi,
                        <?= $_SESSION['username'] ?>
                    </div>
                    <div class="col">
                        <a href="logout.php"><button class="btn btn-danger">Logout</button></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="b-example-divider pemisah"></div>

        <div class="container-fluid mt-4">
            <i class="fa-solid fa-bars fs-3 bar"></i>
            <h1 class="text-center fs-3 pb-3">Data Peminjam Mobil</h1>
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Nama Mobil</th>
                        <th scope="col">Seater</th>
                        <th scope="col">Nama Sopir</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1 ?>
                    <?php foreach ($sql as $row) : ?>
                        <tr>
                            <th scope="row"><?= $no ?></th>
                            <td><?= $row['nama_peminjam'] ?></td>
                            <td><?= $row['alamat_peminjam'] ?></td>
                            <td><?= $row['nama_mobil'] ?></td>
                            <td><?= $row['seater'] ?></td>
                            <td><?= $row['nama_sopir'] ?></td>
                            <td>
                                <a href="ubah.php?id_peminjam=<?= $row['id_peminjam'] ?>" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="hapus.php?id_peminjam=<?= $row['id_peminjam'] ?>" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus?')"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php $no++ ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <a href="tambah.php" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Tambah</a>
        </div>
    </main>

    <script>
        $(".bar").click(function() {
            $(".sidebar, .pemisah").toggleClass("d-none");
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>