<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <?php 
        if(isset($_GET['pesan'])){
            if($_GET['pesan']=="gagal"){
                echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
            }
        }
    ?>
    <div class="bg-login">
    <div class="container-login">
        <form class="log" action="cek_login.php" method="post">
            <label class="label-log">Username</label>
            <input type="text" class="form-log" name="username" placeholder="Masukkan Username.." required="required">
            <label class="label-log">Password</label>
            <input type="password" class="form-log" name="password" placeholder="Masukkan Password.." required="required">
            <div class="button-login">
                <input class="btn-log"  type="submit" value="LOGIN">
                <p style="color: white; font-size: 14px;" >Belum punya akun?. Silahkan daftar <a href="register.php">Register</a></p>
            </div>
        </form>
    </div>
    </div>
</body>
</html>