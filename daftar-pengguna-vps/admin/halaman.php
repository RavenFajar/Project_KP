<main>
    <?php include("../incl/inc_header.php");
    $sukses = "";
    $login_sukses = "";
    $sqltambahan = "";
    $per_halaman = 10;
    
    $katakunci = (isset($_GET['katakunci'])) ? $_GET['katakunci'] : "";

    //Operator delete(awal)
    if (isset($_GET['op'])) {
        $op = $_GET['op'];
    } else {
        $op = "";
    }
    if ($op == 'delete') {
        $id = $_GET['id'];
        $sql1 = "delete from penggunavps where id = '$id'";
        $q1 = mysqli_query($koneksi, $sql1);
        if ($q1) {
            $sukses = "Berhasil hapus data";
        }
    }
    if ($sukses) {
        ?>
        <div class="alert alert-primary" role="alert">
            <?php echo $sukses ?>
        </div>
        <?php
    }
    //operator delete(akhir)
    
    ?>
    <form class="row g-3" method="get">
        <div class="col-auto">
            <a href="halaman_input.php">
                <input type="button" class="btn btn-primary" value="Buat Pengguna Baru">
            </a>
        </div>
        <div class="col-3">
        </div>
        <div class="col-5">
            <input type="text" class="form-control" placeholder="Nama / KTP / No HP" name="katakunci"
                value="<?php echo $katakunci ?>" />
        </div>
        <div class="col-auto">
            <input type="submit" name="cari" value="Cari Pengguna" class="btn btn-secondary" />
        </div>
        <div class="col-auto">
            <a href="halaman.php">
                <input type="button" class="btn btn-primary" value="Refresh">
            </a>
        </div>
    </form>
    <br>
    <table class="table table-dark table-striped container-fluid">
        <thead>
            <tr>
                <th>No</th>
                <th>No KTP</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No HP</th>
                <th>SubDomain</th>
                <th>Domain</th>
                <th class="col-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            //Fitur Search (awal)
            
            if ($katakunci != '') {
                $array_katakunci = explode(" ", $katakunci);
                for ($x = 0; $x < count($array_katakunci); $x++) {
                    $sqlcari[] = "(nama like '%" . $array_katakunci[$x] . "%' or ktp like '%" . $array_katakunci[$x] . "%' or hp like '%" . $array_katakunci[$x] . "%')";
                }
                $sqltambahan = " where" . implode(" or", $sqlcari);
            }
            //Fitur Search (akhir)

            //Menampilkan data keseluruhan(awal)
            $sql1 = "select * from penggunavps $sqltambahan";
            $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
            $mulai = ($page > 1) ? ($page * $per_halaman) - $per_halaman : 0;
            $q1 = mysqli_query($koneksi, $sql1);
            $total = mysqli_num_rows($q1);
            $pages = ceil($total / $per_halaman);
            $nomor = $mulai + 1;
            $sql1 = $sql1 . " order by id desc limit $mulai,$per_halaman";

            $q1 = mysqli_query($koneksi, $sql1);
            while ($r1 = mysqli_fetch_array($q1)) {
                ?>
                <tr>
                    <td>
                        <?php echo $nomor++ ?>
                    </td>
                    <td>
                        <?php echo $r1['ktp'] ?>
                    </td>
                    <td>
                        <?php echo $r1['nama'] ?>
                    </td>
                    <td>
                        <?php echo $r1['alamat'] ?>
                    </td>
                    <td>
                        <?php echo $r1['hp'] ?>
                    </td>
                    <td>
                        <?php echo $r1['subdomain'] ?>
                    </td>
                    <td>
                        <?php echo $r1['domain'] ?>
                    </td>
                    <td>
                        <a href="halaman_edit.php?id=<?php echo $r1['id'] ?>">
                            <span class="badge bg-warning text-dark">Edit</span>
                        </a>

                        <a href="halaman.php?op=delete&id=<?php echo $r1['id'] ?>"
                            onclick="return confirm('Apakah Yakin Hapus Data ?')">
                            <span class="badge bg-danger">Delete</span>
                        </a>

                    </td>

                </tr>
                <?php
            }
            //Menampilkan data keseluruhan(akhir)
            ?>
        </tbody>
    </table>
    <nav aria-label="Page navigation">
        <ul class="pagination" style="color: black">
            <?php
            //Pagination (awal)
            $cari = (isset($_GET['cari'])) ? $_GET['cari'] : "";
            for ($i = 1; $i <= $pages; $i++) {
                ?>
                <li class="page-item">
                    <a class="page-link"
                        href="halaman.php?katakunci= <?php echo $katakunci ?>&cari=<?php echo $cari ?>&page=<?php echo $i ?>"><?php echo $i ?></a>
                </li>
                <?php
            }
            //Pagination (akhir)
            ?>
        </ul>
    </nav>

    <?php include("../incl/inc_footer.php") ?>
</main>