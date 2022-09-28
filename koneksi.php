<?php
    $host       = "localhost";
    $username   = "root";
    $pass       = "";
    $database   = "cottage";

    // script untuk koneksi ke database
    $db1 = mysqli_connect($host,$username,$pass,$database);

    function getSingleQuery($conn, $sql){
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                return $row;
            }
        }
    }
    function executeQuery($conn, $sql){
        return mysqli_query($conn, $sql);
    }
    //print_r(getSingleQuery($db1, "select * from customers where id_name=5"));
?>