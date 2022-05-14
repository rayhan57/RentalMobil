<?php
session_start();
if (isset($_SESSION['username'])) {
    header("Location:index.php");
}
require 'koneksi.php';

if (isset($_POST["register"])) {
    if (daftar($_POST) > 0) {
        echo "<script>
        alert('Berhasil Mendaftar');
        document.location.href = 'login.php';
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
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
            crossorigin="anonymous"
            />
        <title>Register</title>
    </head>

    <style>
        body{
        background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url("img/bg.png");
        background-size: contain;
        background-position: center;
        height: 100vh;
        overflow: hidden;
        background-repeat: no-repeat;
        display: flex;
        align-items: center;
        }

        input.form-control{
            border-radius: 20px;
        }

        .register{
            width: 400px;
            box-shadow: 0px 0px 10px black;
            background: rgba(0, 0, 0, 0.5);
        }
    </style>

    <body>
        <div class="container register rounded-3 p-3 text-white">
            <form method="post">
                <h1 class="text-center fs-3">REGISTRASI</h1>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama Pengguna</label>
                    <input
                        type="text"
                        class="form-control"
                        id="exampleInputEmail1"
                        aria-describedby="emailHelp"
                        autofocus
                        autocomplete="off"
                        name="username"
                        />
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Kata Sandi</label>
                    <input
                        type="password"
                        class="form-control"
                        id="exampleInputPassword1"
                        name="password"
                        />
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword2" class="form-label"
                           >Konfirmasi Kata Sandi</label
                    >
                    <input
                        type="password"
                        class="form-control"
                        id="exampleInputPassword2"
                        name="password2"
                        />
                </div>
                <button
                    style="width: 100%; border-radius: 20px;"
                    type="submit"
                    class="btn btn-primary"
                    name="register"
                    >
                    Daftar
                </button>
                <p class="mt-3 text-secondary">
                    Sudah memiliki akun? Silahkan
                    <a href="login.php" style="text-decoration: none; font-weight: bold"
                       >Masuk</a
                    >
                </p>
            </form>
        </div>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
