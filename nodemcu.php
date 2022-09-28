<?php
    include('koneksi.php');
    $uid = $_GET['uid'];
    $room = $_GET['room'];
    $hasil = getSingleQuery($db1, "select * from customers where uid='$uid' and room='$room'");
    if($hasil){
        echo $hasil['id_name'];
        $phone = $hasil['phone'];
        $otp = strval(rand(100000,999999));
        $pesan = 'Kode OTP Anda:'.$otp;
        executeQuery($db1, "insert into tbsms(no_tujuan, pesan, status) values('$phone','$pesan','uncheck')");
        echo "OK";
    }else{
        echo 'NULL';
    }
?>