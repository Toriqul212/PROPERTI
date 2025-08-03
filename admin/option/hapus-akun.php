<?php

include("../../koneksi.php");

if (isset($_GET['id'])) {

    // ambil id dari query string
    $id_akun = $_GET['id'];

    // buat query hapus
    $sql = "DELETE FROM t_akun WHERE id_akun=$id_akun";
    $query = mysqli_query($db, $sql);

    // apakah query hapus berhasil?
    if ($query) {
        header('Location: option-akun.php?hapus=sukses');
    } else {
        die("gagal menghapus...");
    }
} else {
    die("akses dilarang...");
}
