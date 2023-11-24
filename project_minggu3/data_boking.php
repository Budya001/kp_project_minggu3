<?php
include("koneksi.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data boking</title>
</head>
<body>
<?php
    include("koneksi.php");
    $nama = '';
    $alamat = '';
    $kategori = '';
    $tanggal_dan_waktu = '';
    $no_hp = '';
    $file_ltps = '';
    if (isset($_GET['id_booking'])) {
        $ambil = mysqli_query($mysqli, 
        "SELECT * FROM boking 
        WHERE id_booking='" . $_GET['id_booking'] . "'");
        while ($row = mysqli_fetch_array($ambil)) {
            $nama = $row['nama'];
            $alamat = $row['alamat'];
            $kategori = $row['kategori'];
            $tanggal_dan_waktu = $row['tanggal_dan_waktu'];
            $no_hp = $row['no_hp'];
            $file_ltps = $row['file_ltps'];
        }
    ?>
        <input type="hidden" name="id" value="<?php echo
        $_GET['id_booking'] ?>">
    <?php
    }
    ?>
<div class="grid-container-umum-boking">
    <div class="grid-item-umum">
    <div class="grid-item-boking">
        <center><h2>Data Booking</h2></center>
        <div class="kembali" >
        <a href="hal_admin.php">Kembali</a>
        </div>
        <div class="container-umum">
            <table class="umum">
                    <tr>
                        <th>Id</th>
                        <th>Nama Instansi</th>
                        <th>Alamat</th>
                        <th>Kategori</th>
                        <th>Tanggal & Waktu</th>
                        <th>No HP</th>
                        <th>Surat LTPS</th>
                        <th>Aksi</th>
                        <th>Edit</th>
                    </tr>
                    <tr>
                        <?php
                        $result = mysqli_query($mysqli, "SELECT * FROM boking");
                        $no = 1;
                        while ($data = mysqli_fetch_array($result)){
                        ?>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $data['nama'] ?></td>
                        <td><?php echo $data['alamat'] ?></td>
                        <td><?php echo $data['kategori'] ?></td>
                        <td><?php echo $data['tanggal_dan_waktu'] ?></td>
                        <td><?php echo $data['no_hp'] ?></td>
                        <td><?php echo $data['file_ltps'] ?></td>
                        <td>
                            <?php
                            if ($data['status'] == '1') {
                            ?>
                                <a class="btn-aksi" type="button" style="color:blue;"
                                href="data_boking.php?page=boking&id_booking=<?php echo $data['id_booking'] ?>&aksi=ubah_status&status=0">
                                Sudah
                                </a>
                            <?php
                            } else {
                            ?>
                                <a class="btn-aksi" type="button" style="color:red;"
                                href="data_boking.php?page=boking&id_booking=<?php echo $data['id_booking'] ?>&aksi=ubah_status&status=1">
                                Belum</a>
                            <?php
                            }
                            ?>
                        </td>
                        <td>
                            <a class="btn" href="data_boking.php?page=boking&id_booking=<?php echo $data['id_booking'] ?>&aksi=hapus">Tolak</a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
            </table>
        </div>
    </div>
    </div>
</div>
<?php
    if (isset($_POST['simpan'])) {
        if (isset($_POST['id_booking'])) {
            $ubah = mysqli_query($mysqli, "UPDATE boking SET 
                                            nama = '" . $_POST['nama'] . "',
                                            alamat = '" . $_POST['alamat'] . "',
                                            kategori = '" . $_POST['kategori'] . "',
                                            tanggal_dan_waktu = '" . $_POST['tanggal_dan_waktu'] . "',
                                            no_hp = '" . $_POST['no_hp'] . "',
                                            file_ltps = '" . $_POST['file_ltps'] . "'
                                            WHERE
                                            id_booking = '" . $_POST['id_booking'] . "'");
        } else {
            $nama = $_POST['nama'];
            $alamat = $_POST['alamat'];
            $kategori = $_POST['kategori'];
            $tanggal_dan_waktu = $_POST['tanggal_dan_waktu'];
            $no_hp = $_POST['no_hp'];
            $file_ltps = $_POST['file_ltps'];
            $tambah = mysqli_query($mysqli, "INSERT INTO boking(nama,alamat,kategori,tanggal_dan_waktu,no_hp,file_ltps) 
                                            VALUES('$nama','$alamat','$kategori','$tanggal_dan_waktu','$no_hp','$file_ltps')");
        }

        echo "<script> 
                document.location='hal_admin.php';
                </script>";
    }

    if (isset($_GET['aksi'])) {
        if ($_GET['aksi'] == 'hapus') {
            $hapus = mysqli_query($mysqli, "DELETE FROM boking WHERE id_booking = '" . $_GET['id_booking'] . "'");
        } else if ($_GET['aksi'] == 'ubah_status') {
            $ubah_status = mysqli_query($mysqli, "UPDATE boking SET 
                                            status = '" . $_GET['status'] . "' 
                                            WHERE
                                            id_booking = '" . $_GET['id_booking'] . "'");
        }
        echo "<script> 
                document.location='hal_admin.php';
                </script>";
    }
?>
</body>
</html>