<?php
    include_once("koneksi.php");
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $hasil = getSingleQuery($db1, "select * from tbrequest where id=$id");
        if(str_contains($hasil['keterangan'],'cleaning service')){
            executeQuery($db1, "delete from customers where nama='CSERV'");
        }  
        executeQuery($db1,"delete from tbrequest where id=$id");
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cottage</title>
    <!-- <link rel="stylesheet" href="reset.css"> -->
    <link rel="stylesheet" href="css/style-customers.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style>
        button{
            width: 100px;
            height: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="navigation">
            <?php include('sidebar.php'); ?>
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
            <div class="details">
                <!-- order details list -->
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Request</h2>
                        <!-- <a href="#" class="btn">View All</a> -->
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>Pesan</td>
                                <td>Tindakan</td>

                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            include_once('koneksi.php');
                            $request = mysqli_query($db1,"select * from tbrequest");
                            while($row = mysqli_fetch_array($request))
                            {
                                echo "<tr>
                                        <td>".$row['keterangan']."</td>
                                        <td><a href=\"message.php?id=".$row['id']."\"><button>Selesai</button></button></td>
                                    </tr>";
                            }
                            
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

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
</body>
</html>