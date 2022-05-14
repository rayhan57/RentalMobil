<?php
$url = "localhost";
$username = "root";
$password = "";
$database = "rental_mobil";

$conn = mysqli_connect($url, $username, $password, $database);

// Tampil Data
function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function daftar($data) {
    global $conn;

    $username = $data["username"];
    $password = md5($data["password"]);
    $password2 = md5($data["password2"]);

    $cek = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $cek);

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('Akun sudah ada');
            </script>";
        return false;
    }

    if ($password !== $password2) {
        echo "<script>
        alert('konfirmasi password salah');
        </script>";
    } else {
        $sql = "INSERT INTO user VALUES('', '$username', '$password')";
        mysqli_query($conn, $sql);
        return mysqli_affected_rows($conn);
    }
}

function tambah($data){
    global $conn;

    $nama = htmlspecialchars($data['nama']);
    $alamat = htmlspecialchars($data['alamat']);
    $namamobil = $data['namamobil'];
    $namasopir = $data['namasopir'];
    $tanggalpinjam = $data['tglpinjam'];
    $tanggalkembali = $data['tglkembali'];

    $sql = "INSERT INTO peminjam VALUES ('', '$nama', '$alamat', '$namamobil', '$namasopir')";
    mysqli_query($conn, $sql);

    $sql = "SELECT max(id_peminjam) AS idpeminjam FROM peminjam LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $idpeminjam = $row['idpeminjam'];

    $sql = "INSERT INTO transaksi VALUES ('', '$nama', '$tanggalpinjam', '$tanggalkembali','$idpeminjam')";
    mysqli_query($conn, $sql);

    return mysqli_affected_rows($conn);
}

function hapus($id){
    global $conn;

    $sql = "DELETE FROM peminjam WHERE id_peminjam = $id";
    mysqli_query($conn,$sql);
    return mysqli_affected_rows($conn);
}

function ubah($data){
global $conn;

$id = $data["id_peminjam"];
$nama = htmlspecialchars($data["nama"]);
$alamat =htmlspecialchars($data["alamat"]);
$tanggalpinjam = $data['tglpinjam'];
$tanggalkembali = $data['tglkembali'];
$namamobil = $data['namamobil'];
$namasopir = $data['namasopir'];

$sql = "UPDATE peminjam SET nama_peminjam = '$nama', alamat_peminjam = '$alamat', id_mobil = '$namamobil', id_sopir = '$namasopir' WHERE id_peminjam = $id";
mysqli_query($conn, $sql);

$sql = "UPDATE transaksi SET tanggal_pinjam = '$tanggalpinjam', tanggal_kembali = '$tanggalkembali' WHERE id_peminjam = $id";
mysqli_query($conn, $sql);

return mysqli_affected_rows($conn);
}
?>