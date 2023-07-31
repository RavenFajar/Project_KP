<?php
session_start();
if (isset($_SESSION['admin_username']) != '') {
    header("location:halaman.php");
    exit();
}
include("../incl/inc_koneksi.php");

$username = "";
$password = "";
$err = "";


if (isset($_POST['Login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == '' && $password == '') {
        $err .= "<li>Silakan masukkan username dan password.</li>";
    } elseif ($username == '') {
        $err .= "<li>Silakan masukkan username.</li>";
    } elseif ($password == '') {
        $err .= "<li>Silakan masukkan password.</li>";
    } else {
        $sql1 = "select * from login where username = '$username'";
        $q1 = mysqli_query($koneksi, $sql1);
        $r1 = mysqli_fetch_array($q1);
        $n1 = mysqli_num_rows($q1);

        if ($n1 < 1) {
            $err = "Username tidak ditemukan";
        } elseif ($r1['password'] != md5($password)) {
            $err = "Password yang kamu masukkan tidak sesuai";
        } else {
            $_SESSION['admin_username'] = $username;
            header("location:halaman.php");
            exit();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-COmpatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <title>Login Admin</title>
    <link rel="stylesheet" type="text/css" href="../incl/login_admin.css">
</head>

<body>
    <h1>Selamat Datang Admin</h1>
    <h2>Silahkan Login Untuk Mengakses Halaman Utama</h2>
    <div class="login-box">
        <img src="../Gambar/logo2.png" class="avatar">
        <h3>Login Here</h3>
        <form action="" method="POST">
            <?php
            if ($err) {
                ?>
                <div class="alert alert-danger">
                    <?php echo $err ?>
                </div>
                <?php
            }
            ?>
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" id="username" name="username"
                    placeholder="Masukan Username" value="<?php echo $username ?>" />
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" id="password" name="password"
                    placeholder="Masukan Password" />
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="Login">LOGIN</button>
        </form>
    </div>
</body>

</html>