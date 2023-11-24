<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Perpustakaan Provinsi Jawa Tengah</title>
</head>
<body>
<?php 
        if(isset($_GET['pesan'])){
            if($_GET['pesan']=="gagal"){
                echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
            }
        }
    ?>
<div>
    <!--Navbar-->
    <div class="container">
        <nav class="navbar">
            <ul class="navbar-list">
                <img src="foto/logo1.png" alt="" style="padding-left :10px;">
                <li class="navbar-item" style="padding-left :20px;"><a href="index.php">PERPUSTAKAAN</a></li>
                <li class="navbar-item" style="padding-left :20px;"><a href="index.php">Home</a></li>
                <li class="navbar-item"><a href="about.php">About</a></li>
                <li class="navbar-item"><a href="contact.php">Contact</a></li>
                <li class="navbar-item" style="padding-left: 56%;"><a href="login.php">Login</a></li>
                <li class="navbar-item"><a href="register.php">Register</a></li>
            </ul>
        </nav>
    </div>
    
    <!--Grid Container-->
    <div class="grid-container">
        <div class="grid-item">
            <div class="container2">
                    <form class="login" action="cek_login.php" method="post">
                        <label>Username</label>
                        <input type="text" name="username" class="form_login" placeholder="Username" required="required">
                        <br/>
                        <label>Password</label>
                        <input type="password" name="password" class="form_login" placeholder="Password" required="required">
                        <br/>
                        <button class="btn-login" type="submit">LOGIN</button>
                    </form>
            </div>

            <div>
                <ul>
                    <a>
                        <img class="icon" src="icon/instagram.png"></img>
                        <img class="icon" src="icon/twitter.png"></img>
                        <img class="icon" src="icon/facebook.png"></img>
                    </a>
                </ul>
            </div>
        </div>

        <div class="grid-item2" style="width: 100%;">
            <!--Tampilan Menu 1-->
            <div class="title">
                            <center><h2>PERPUSTAKAAN PROVINSI JAWA TENGAH</h2></center>
                            <div class="grid-index">
                                <center><label style="color:white;">Populer</label></center>
                                <div class="container-index">
                                        <img class="book" src="buku/3.jpg">
                                        <img class="book" src="buku/4.png">
                                        <img class="book" src="buku/5.jpg">
                                        <img class="book" src="buku/5.jpg">
                                        <img class="book" src="buku/4.png">
                                        <img class="book" src="buku/3.jpg">
                                        <img class="book" src="buku/4.png">
                                        <img class="book" src="buku/5.jpg">
                                        <img class="book" src="buku/5.jpg">
                                        <img class="book" src="buku/4.png">
                                        <img class="book" src="buku/5.jpg">
                                        <img class="book" src="buku/5.jpg">
                                </div>
            </div>
            <!--About-->
            <div class="">

            </div>
            
        </div>
    </div>

</div>

<!--Footer-->
<footer class="footer-distributed">
    <div class="footer-left">
        <h3>Perpustakaan<span> Provinsi Jawa Tengah</span></h3>
        <p class="footer-links">
            <a href="index.php" class="link-1">Home</a>
            <a href="blog.php">Blog</a>
            <a href="about.php">About</a>
            <a href="faq.php">Faq</a>
            <a href="contact.php">Contact</a>
        </p>
        <p class="footer-company-name">Perpustakaan Provinsi Jawa Tengah © 2023</p>
    </div>
    <div class="footer-center">
    <div>
            <i class="fa fa-map-marker"></i>
            <img src="icon/placeholder.png" style="width: 20px; height: 20px; padding-top:8px;"><p><span>Jl. Sriwijaya</span> Semarang</p>
        </div>
        <div>
            <i class="fa fa-phone"></i>
            <img src="icon/telephone.png" style="width: 20px; height: 20px; padding-top:5px;"><p>+62 .... .... ....</p>
        </div>
        <div>
            <i class="fa fa-envelope"></i>
            <img src="icon/email.png" style="width: 20px; height: 20px; padding-top:5px;"><p><a href="#">email@perpustakaan.com</a></p>
        </div>
    </div>
    <div class="footer-right">
        <p class="footer-company-about">
            <span>About</span>
            Perpustakaan Provinsi Jawa Tengah adalah salah satu perpustakaan yang
                    berlokasi di Kota Semarang, Indonesia. Perpustakaan ini memiliki tujuan untuk
                    menyediakan sumber belajar dan informasi sebagai sarana pembelajaran
                bagi masyarakat kebutuhan akademis maupun nonakademis.
        </p>
    </div>
</footer>
</body>
</html>