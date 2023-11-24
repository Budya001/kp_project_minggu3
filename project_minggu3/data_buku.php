<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>data buku</title>
</head>
<body>

<div class="grid-container-umum-boking">
    <div class="grid-item-umum">
    <div class="grid-item-boking">
        <center><h2>Data Buku</h2></center>
        <div class="container-umum">
        <h3 style="padding-left:20px;">INPUT BUKU</h3>
        <form class="input-buku" method="POST" action="" name="myForm" onsubmit="return(validate());">
        <?php
            include("koneksi.php");
            $id_buku = '';
            $judul_buku = '';
            $jenis_buku = '';
            $tahun_terbit = '';
            if (isset($_GET['id'])) {
                $ambil = mysqli_query($mysqli, 
                "SELECT * FROM buku 
                WHERE id='" . $_GET['id'] . "'");
                while ($row = mysqli_fetch_array($ambil)) {
                    $id_buku = $row['id_buku'];
                    $judul_buku = $row['judul_buku'];
                    $jenis_buku = $row['jenis_buku'];
                    $tahun_terbit = $row['tahun_terbit'];
                }
            ?>
                <input type="hidden" name="id" value="<?php echo
                $_GET['id'] ?>">
            <?php
            }
            ?>
            <h4>Id Buku</h4>
            <input type="int" name="id_buku" class="form_buku" id="inputIdBuku" placeholder="Id Buku" required="required" value="<?php echo $id_buku?>">
            <h4>Judul Buku</h4>
            <input type="text" name="judul_buku" class="form_buku" id="inputJudulBuku" placeholder="Judul Buku" required="required" value="<?php echo $judul_buku?>">
            <h4>Jenis Buku</h4>
            <input type="text" name="jenis_buku" id="inputJenisBuku" class="form_buku" placeholder="jenis Buku" required="required" value="<?php echo $jenis_buku?>">
            <h4>Tahun Terbit</h4>
            <input type="int" name="tahun_terbit" class="form_buku" id="inputTahunTerbit" placeholder="Tahun Terbit" required="required" value="<?php echo $tahun_terbit?>">
            <button class="btn-boking" type="submit" name="simpan">SIMPAN</button>
        </form>
            <table class="umum">
                    <tr>
                        <th>Id</th>
                        <th>Id Buku</th>
                        <th>Judul Buku</th>
                        <th>Jenis Buku</th>
                        <th>Tahun Terbit</th>
                        <th>Edit</th>
                    </tr>
                    <tr>
                        <?php
                        $result = mysqli_query($mysqli, "SELECT * FROM buku");
                        $no = 1;
                        while ($data = mysqli_fetch_array($result)){
                        ?>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $data['id_buku'] ?></td>
                        <td><?php echo $data['judul_buku'] ?></td>
                        <td><?php echo $data['jenis_buku'] ?></td>
                        <td><?php echo $data['tahun_terbit'] ?></td>
                        <td>
                            <a class="btn" href="data_buku.php?page=buku&id=<?php echo $data['id'] ?>">Ubah</a>
                            <a class="btn" href="data_buku.php?page=buku&id=<?php echo $data['id'] ?>&aksi=hapus">Hapus</a>
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
        if (isset($_POST['id'])) {
            $ubah = mysqli_query($mysqli, "UPDATE buku SET 
                                            id_buku = '" . $_POST['id_buku'] . "',
                                            judul_buku = '" . $_POST['judul_buku'] . "',
                                            jenis_buku = '" . $_POST['jenis_buku'] . "',
                                            tahun_terbit = '" . $_POST['tahun_terbit'] . "'
                                            WHERE
                                            id = '" . $_POST['id'] . "'");
        } else {
            $id_buku = $_POST['id_buku'];
            $judul_buku = $_POST['judul_buku'];
            $jenis_buku = $_POST['jenis_buku'];
            $tahun_terbit = $_POST['tahun_terbit'];
            $tambah = mysqli_query($mysqli, "INSERT INTO buku(id_buku,judul_buku,jenis_buku,tahun_terbit) 
                                            VALUES('$id_buku','$judul_buku','$jenis_buku','$tahun_terbit')");
        }

        echo "<script> 
                document.location='hal_admin.php';
                </script>";
    }

    if (isset($_GET['aksi'])) {
        if ($_GET['aksi'] == 'hapus') {
            $hapus = mysqli_query($mysqli, "DELETE FROM buku WHERE id = '" . $_GET['id'] . "'");
        } else if ($_GET['aksi'] == 'ubah_status') {
            $ubah_status = mysqli_query($mysqli, "UPDATE buku SET 
                                            status = '" . $_GET['status'] . "' 
                                            WHERE
                                            id = '" . $_GET['id'] . "'");
        }
        echo "<script> 
                document.location='hal_admin.php';
                </script>";
    }
?>
</body>
</html>