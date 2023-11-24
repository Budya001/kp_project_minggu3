<?php
include ("koneksi.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Data booking umum</title>
</head>
<body>
<div class="grid-container-umum-boking">
    <div class="grid-item-umum">
        <div class="grid-item-boking">
            <div class="kembali" >
                <a href="hal_umum.php">Kembali</a>
                </div>
                <div class="container-umum">
                    <table class="umum">
                    <tr>
                        <th>Id</th>
                        <th>Nama Instansi</th>
                        <th>Alamat</th>
                        <th>Kategori</th>
                        <th>Tanggal dan Waktu</th>
                        <th>No HP</th>
                        <th>File LTPS</th>
                        <th>Aksi</th>
                    </tr>
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
                                    <a class="btn" href="hal_umum.php?page=boking&id_booking=<?php echo $data['id_booking'] ?>&aksi=hapus">Cancel</a>
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
                document.location='hal_umum.php';
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
                document.location='hal_umum.php';
                </script>";
    }
?>
</body>
</html>