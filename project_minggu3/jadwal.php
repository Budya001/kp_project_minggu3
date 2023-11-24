<!DOCTYPE html>
<html>
    <link rel="stylesheet" href="style.css">
<head>
	<title>jawdal layanan</title>
</head>
<body>
<?php
    include("koneksi.php");
    $nama = '';
    $alamat = '';
    $tanggal_dan_waktu = '';
    $no_hp = '';
    if (isset($_GET['id_booking'])) {
        $ambil = mysqli_query($mysqli, 
        "SELECT nama, alamat, tanggal_dan_waktu, no_hp FROM boking 
        WHERE id_booking='" . $_GET['id_booking'] . "'");
        while ($row = mysqli_fetch_array($ambil)) {
            $nama = $row['nama'];
            $alamat = $row['alamat'];
            $tanggal_dan_waktu = $row['tanggal_dan_waktu'];
            $no_hp = $row['no_hp'];
        }
    ?>
        <input type="hidden" name="id" value="<?php echo
        $_GET['id'] ?>">
    <?php
    }
    ?>
<div class="grid-container-umum-boking">
    <div class="grid-item-umum">
    <div class="grid-item-boking">
        <center><h2>Jadwal Layanan</h2></center>
        <div class="container-umum">
            <table class="umum">
                    <tr>
                        <th>Id</th>
                        <th>Nama Instansi</th>
                        <th>Alamat</th>
                        <th>Tanggal & Waktu</th>
                        <th>No HP</th>
                    </tr>
                    <tr>
                        <?php
                        $result = mysqli_query($mysqli, "SELECT nama, alamat, tanggal_dan_waktu, no_hp FROM boking");
                        $no = 1;
                        while ($data = mysqli_fetch_array($result)){
                        ?>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $data['nama'] ?></td>
                        <td><?php echo $data['alamat'] ?></td>
                        <td><?php echo $data['tanggal_dan_waktu'] ?></td>
                        <td><?php echo $data['no_hp'] ?></td>
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
                                            tanggal_dan_waktu = '" . $_POST['tanggal_dan_waktu'] . "',
                                            no_hp = '" . $_POST['no_hp'] . "'
                                            WHERE
                                            id_booking = '" . $_POST['id_booking'] . "'");
        }
        else {
            $nama = $_POST['nama'];
            $alamat = $_POST['alamat'];
            $tanggal_dan_waktu = $_POST['tanggal_dan_waktu'];
            $no_hp = $_POST['no_hp'];
            $tambah = mysqli_query($mysqli, "INSERT INTO boking(nama,alamat,tanggal_dan_waktu,no_hp) 
                                            VALUES('$nama','$alamat','$tanggal_dan_waktu','$no_hp')");
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