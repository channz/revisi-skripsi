<?php
    include('koneksi.php');
    $uid = $_GET['uid'];
    $hasil = getSingleQuery($db1, "select * from customers where uid='$uid'");
    if($hasil){
        echo 'BUKA';
    }else{
        echo '0';
    }
?>