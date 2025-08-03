<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'config.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi, "SELECT * FROM t_akun where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database

if ($cek > 0) {

    $data = mysqli_fetch_assoc($login);

    // cek jika user login sebagai admin
    if ($data['level'] == "1") {

        // buat session login dan username
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "1";


        // alihkan ke halaman dashboard admin
        echo "<script language='JavaScript' align='center'>
                    alert('Berhasil Login !!!!');
                    document.location='admin/index.php?pesan=berhasil';
                </script>";

        // cek jika user login sebagai pegawai
    } else if ($data['level'] == "2") {
        // buat session login dan username
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "2";
        // alihkan ke halaman dashboard pegawai
        echo "<script language='JavaScript' align='center'>
                    alert('Berhasil Login !!!!');
                    document.location='costumer/index.php?pesan=berhasil';
                </script>";

        // cek jika user login sebagai pengurus
    } else {
        header("location:index.php?pesan=gagal");
    }
} else {
    header("location:index.php?pesan=gagal");
}
