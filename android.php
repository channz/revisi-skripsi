<?php
    include('koneksi.php');
    $hasil = getSingleQuery($db1, "select * from tbsms where status='uncheck' order by id desc limit 1");
    if($hasil){
        echo $hasil['no_tujuan'].'_'.$hasil['pesan'];
        executeQuery($db1,"update tbsms set status='sent'");
        //executeQuery($db1,"delete from tbsms");
    } else {
        echo '0';
    }
?>