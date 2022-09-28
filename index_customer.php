<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cottage</title>
    <!-- <link rel="stylesheet" href="reset.css"> -->
    <link rel="stylesheet" href="css/style-addcustomer.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="navigation">
        <?php include('sidebar_customer.php'); ?>
        </div>

        <!-- main -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                <!-- search -->
                <div class="search">
                    <label>
                        <input type="text" placeholder="Search">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>
                <!-- userImg -->
                <div class="user">
                    <img src="user.jpg">
                </div>
            </div>

            <!-- Form -->
            <div class="form">
                <div class="inputData">
                    <h2>Request Tamu</h2>
                    <form action="" method="POST">
                        
                        <div class="row">
                            <div class="label">
                                <label for="nama">Nama Tamu</label>
                            </div>
                            <div class="input">
                                <input type="text" id="nama" name="nama">
                            </div>
                        </div>
                        <div class="row">
                            <input type="submit" name="submit1" value="Submit Request Tamu">
                        </div>
                    </form>
                </div>
            </div>


            <div class="form">
                <div class="inputData">
                    <h2>Request Cleaning Service</h2>
                    <form action="" method="POST">
                        <div class="row">
                            <input type="submit" name="submit2" value="Submit Request Cleaning Service">
                        </div>
                    </form>
                </div>
            </div>

            <?php
                include('koneksi.php');
                if(isset($_POST['submit1'])){
                    $nama = $_POST['nama'];
                    //echo "insert into tbrequest (keterangan) values('request tamu dengan nama: $nama pada room: ".$_SESSION['room']."')";
                    executeQuery($db1,"insert into tbrequest (keterangan) values('request tamu dengan nama: $nama pada room: ".$_SESSION['room']."')");
                    echo '<h2>Request Berhasil Dikirim Ke Resepsionis</h2>';
                }
                if(isset($_POST['submit2'])){
                    
                    

                    executeQuery($db1,"insert into tbrequest (keterangan) values('request cleaning service pada room: ".$_SESSION['room']."')");
                    $hasil = getSingleQuery($db1, "select * from tbcleaning");
                    $phone = $hasil['no_hp'];
                    $uid = $hasil['uid'];
                    $hasil2 = getSingleQuery($db1, "select * from tbrequest where keterangan like '%cleaning service%'");
                    $room = trim(explode(':', $hasil2['keterangan'])[1]);
                    executeQuery($db1, "insert into customers(nama, uid, area, room, phone, username, password) values('CSERV','$uid','11','$room','$phone','----','----')");
                    echo '<h2>Request Berhasil Dikirim Ke Resepsionis</h2>';
                }
            ?>
            
        </div>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script>
        // MenuToggle
        let toggle = document.querySelector('.toggle');
        let navigation = document.querySelector('.navigation');
        let main = document.querySelector('.main');

        toggle.onclick = function(){
            navigation.classList.toggle('active')
            main.classList.toggle('active')
        }

        // add hovered class in selected list item
        let list = document.querySelectorAll('.navigation li');
        function activeLink(){
            list.forEach((item) =>
            item.classList.remove('hovered'));
            this.classList.add('hovered');
        } 
        list.forEach((item) =>
        item.addEventListener('mouseover',activeLink));
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $.ajax({
                type: 'POST',
                url: "get_area.php",
                cache: false,
                success: function(msg) {
                    $("#area").html(msg);
                }
            });

            $("#area").change(function() {
            var area = $("#area").val();
                $.ajax({
                    type: 'POST',
                    url: "get_room.php",
                    data: {area: area},
                    cache: false,
                    success: function(msg) {
                        $("#room").html(msg);
                    }
                });
            });
        });
    </script>
</body>
</html>