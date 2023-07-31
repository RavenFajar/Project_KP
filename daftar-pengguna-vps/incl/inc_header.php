<?php
//Pengecekan Login (awal)
session_start();
if ($_SESSION['admin_username'] == '') {
    header("location:login_admin.php");
    exit();
}
include("../incl/inc_koneksi.php");
//Pengecekan Login (akhir)
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Pengguna VPS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="../incl/halaman.css">
</head>

<body class="container-fluid" style="background: url(../Gambar/BG_Halaman.jpg);">
    <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-xxl">
                    <a href="halaman.php">
                    <img src="../Gambar/logo2.png" class="Icon">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#"></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="halaman.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Paket&Daftar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Syarat&Ketentuan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="info.php">Info</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Contact</a>
                            </li>
                            <li class="nav-item">
                                <a href="logout.php" class="nav-link">Log Out</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <br>
        
    </header>
