<?php
    //Include file koneksi ke database
    include "koneksi.php";

    //menerima nilai dari kiriman form input-barang 
    $id_name =$_POST["id_name"];
    $nama    =$_POST["nama"];
    $uid     =$_POST["uid"];
    $area    =$_POST["area"];
    $room    =$_POST["room"];
    $phone   =$_POST["phone"];
    $username = $_POST['username'];
    $password = $_POST['password'];

    /// query SQL untuk insert data
    $query="INSERT INTO customers SET id_name='$id_name',nama='$nama',uid='$uid',area='$area',room='$room',phone='$phone', username='$username', password='$password'";
    mysqli_query($db1, $query);

    header("location:customers.php")
?>