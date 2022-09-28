<?php
    include('koneksi.php');
    $id = $_GET['id'];
    executeQuery($db1,"delete from customers where id_name=$id");
    header("Location: " . $_SERVER["HTTP_REFERER"]);
?>