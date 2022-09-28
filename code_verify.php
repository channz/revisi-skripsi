<?php
  include('koneksi.php');
  $parts = explode('_',$_GET['code']);
  $code = $parts[1];

  $hasil = getSingleQuery($db1, "select * from tbsms where status='sent' order by id desc limit 1");
    if($hasil){
        $parts = explode(":", $hasil['pesan']);
        if($code==$parts[1])echo('OTP_OK<CODE_OK>');
        else echo('<CODE_WRONG>');
        executeQuery($db1,"delete from tbsms");
    } else {
        echo '0';
    }
?>