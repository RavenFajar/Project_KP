<?php include("../incl/inc_header.php") ?>
<?php
$ktp        = "";
$nama       = "";
$alamat     = "";
$hp         = "";
$subdomain  = "";
$domain     = "";
$sukses     = "";
$error      = "";


if(isset($_GET['id'])){
    $id = $_GET['id'];
}else{
    $id = "";
}

if($id != ""){
    $sql1       = "select * from penggunavps where id='$id'";
    $q1         = mysqli_query($koneksi,$sql1);
    $r1         = mysqli_fetch_array($q1);
    $ktp        = $r1['ktp'];
    $nama       = $r1['nama'];
    $alamat     = $r1['alamat'];
    $hp         = $r1['hp'];
    $subdomain  = $r1['subdomain'];
    $domain     = $r1['domain'];
    
    if($domain == ''){
        $error = "Data tidak ditemukan";
    }
}

if (isset($_POST['simpan'])) {
    $ktp        = $_POST['ktp'];
    $nama       = $_POST['nama'];
    $alamat     = $_POST['alamat'];
    $hp         = $_POST['hp'];
    $subdomain  = $_POST['subdomain'];
    $domain     = $_POST['domain'];

    if ($ktp ==''or $nama =='' or $alamat =='' or $hp =='' or $subdomain =='' or $domain =='') {
        $error = "Silahkan masukan semua data yang diperlukan";
    }
    if (empty($error)) {
        if($id != ""){
            $sql1 = "update penggunavps set ktp ='$ktp',nama = '$nama',alamat = '$alamat', hp = '$hp', subdomain = '$subdomain', domain = '$domain' where id = '$id'";
        }
        $q1       = mysqli_query($koneksi,$sql1);
        if ($q1) {
            $sukses = "Sukses Memasukkan Data";
        } else {
            $error = "Gagal Memasukan Data";

        }
    }
}
?>
<?php
if ($error) {
    ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $error ?>
    </div>
<?php
}
?>
<?php
if ($sukses) {
    ?>
    <div  class="alert alert-info" role="alert">
        <?php echo $sukses ?>
    </div>
<?php
}
?>

<h1 style="color:#fff">Halaman Admin Edit Data</h1>
<div class="mb-3 row">
    <a href="halaman.php" style="width:250px">
        <input type="button" class="btn btn-primary" value="Kembali Ke Halaman Utama">
    </a>
</div>

<form action="" method="post" style="color:#fff">
    <div class="mb-3 row">
        <label for="ktp" class="col-sm-2 col-form-label">No KTP</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="ktp" value=" <?php echo $ktp ?>" name="ktp">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="nama" value=" <?php echo $nama ?>" name="nama">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="alamat" class="col-sm-2 col-form-label">Alamat </label>
        <div class="col-sm-10">
            <textarea name="alamat" class="form-control"><?php echo $alamat ?></textarea>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="hp" class="col-sm-2 col-form-label">No HP</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="hp" value=" <?php echo $hp ?>" name="hp">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="subdomain" class="col-sm-2 col-form-label">Subdomain</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="subdomain" value=" <?php echo $subdomain ?>" name="subdomain">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="domain" class="col-sm-2 col-form-label">Domain</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="domain" value=" <?php echo $domain ?>" name="domain">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
            <input type="Submit" name="simpan" value="Simpan Data" class="btn btn-primary" />
        </div>
    </div>
</form>
<?php include("../incl/inc_footer.php") ?>