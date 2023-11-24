<!DOCTYPE html>
<?php
    include("koneksi.php")
    ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>halaman admin</title>
</head>
<body>
<div class="container">
        <nav class="navbar">
            <ul class="navbar-list">
                <img src="foto/logo1.png" alt="" style="padding-left :10px;">
                <li class="navbar-item" style="padding-left :20px;"><a href="hal_admin.php">PERPUSTAKAAN</a></li>
                <li class="navbar-item" style="padding-left :20px;"><a href="hal_admin.php">Home</a></li>
                <li class="navbar-item" style="padding-left: 70%;"><a href="index.php">Logout</a></li>
            </ul>
        </nav>
    </div>
<div class="grid-container-admin">
    <div class="admin-bar">
        <div class="grid-item-admin">
            <div class="container-admin">
                <div class="container">
                    <nav class="user-admin">
                        <img src="icon/user.png"></img>
                        <p class="user" >User Admin</p>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="admin-bar">
        <div class="grid-item-admin">
            <div class="container-admin">
                <div class="bar-admin">
                    <a href="hal_admin.php?page=jadwal"><img class="img-admin" src="icon/calendar.png"></a>
                </div>
                <div class="bar-admin">
                    <a href="hal_admin.php?page=data_buku"><img class="img-admin" src="icon/book-stack.png"></a>
                </div>
                <div class="bar-admin">
                    <a href="hal_admin.php?page=data_boking"><img class="img-admin" src="icon/analytics.png"></a>
                </div>
                <div class="bar-admin">
                    <a href="hal_admin.php?page=ltps"><img class="img-admin" src="icon/ltps.png"></a>                
                </div>
            </div>
        </div>
    </div>
</div>
<div class="grid-container-admin-2">
            <?php 
            if(isset($_GET['page'])){
                $page = $_GET['page'];
                switch ($page) {
                    case 'jadwal':
                        include "jadwal.php";
                        break;
                    case 'data_buku':
                        include "data_buku.php";
                        break;
                    case 'data_boking':
                        include "data_boking.php";
                        break;
                    case 'ltps':
                        include "ltps.php";
                        break;			
                    default:
                        echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
                        break;
                }
            }
            ?>
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