<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>
<body>
<?php
session_start();
?>

<?php
	if(isset($_SESSION['error'])) {
	?>
	<?php echo $_SESSION['error']?>
	</div>
	<?php
	}
	?>
	<?php
	if(isset($_SESSION['message'])) {
	?>
	<?php echo $_SESSION['message']?>
	</div>
	<?php
	}
?>
    <div class="container-reg">
        <form class="reg" action="cek_register.php" method="post">
            <label class="label-reg">Nama</label>
            <input class="form_input" type="text" name="nama" placeholder="Masukkan Nama..">
            <label class="label-reg">Username</label>
            <input class="form_input" type="text" name="username" id="username" aria-describedby="username" placeholder="Masukkan Username.." autocomplete="off">
            <label class="label-reg">Password</label>
            <input class="form_input" type="password" name="password" placeholder="Masukkan Password..">
            <div>
                <tr>
                    <td><strong style="color:white;" >Level</strong></td>
                    <td>
                    <select name="level">
                        <option value="admin">Admin
                        <option value="umum">Umum
                    </select>
                    </td>
                </tr>
            </div>
            <div class="button-reg">
                <button class="btn-reg" type="submit">SUBMIT</button>
                <p style="color: white; font-size:14px;">Sudah Memiliki Akun?. Silahkan <a href="login.php">Login</a></p>
            </div>
        </form>
    </div>
</body>
<?php
session_destroy();
?>
</html>