<?php
    session_start();
    include "koneksi.php";
    //dapatkan data user dari form register
    $user = [
        'nama' => $_POST['nama'],
        'username' => $_POST['username'],
        'password' => $_POST['password'],
        'level' => $_POST['level'],
    ];

    //check apakah user dengan username tersebut ada di table user
    $query = "select * from user where username = ? limit 1";
    $stmt = $mysqli->stmt_init();
    $stmt->prepare($query);
    $stmt->bind_param('s', $user['username']);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_array(MYSQLI_ASSOC);
    //jika username sudah ada, maka return kembali ke halaman register.
    if($row != null){
        $_SESSION['error'] = 'Username yang anda masukkan sudah ada di database.';
        header("Location: login.php");
    }else{
    	//username unik. simpan di database.
        $query = "insert into user (nama, username, password, level) values  (?,?,?,?)";
        $stmt = $mysqli->stmt_init();
        $stmt->prepare($query);
        $stmt->bind_param('ssss', $user['nama'], $user['username'],$user['password'],$user['level']);
        $stmt->execute();
        $result = $stmt->get_result();
        var_dump($result);
        $_SESSION['message']  = 'Berhasil register ke dalam sistem. Silakan login dengan username dan password yang sudah dibuat.';
        header("Location: login	.php");
    }
    ?>