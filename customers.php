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
                        <h2>Detail Orders</h2>
                        <!-- <a href="#" class="btn">View All</a> -->
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>No.</td>
                                <td>Name</td>
                                <td>UID</td>
                                <td>Phone</td>
                                <td>Area</td>
                                <td>Room</td>
                                <td>Username</td>
                                <td>Password</td>
                                <td>Tindakan</td>

                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            include 'koneksi.php';
                            $customer = mysqli_query($db1,"select * from customers");
                            while($row = mysqli_fetch_array($customer))
                            {
                                echo "<tr>
                                        <td>".$row['id_name']."</td>
                                        <td>".$row['nama']."</td>
                                        <td>".$row['uid']."</td>
                                        <td>".$row['phone']."</td>
                                        <td>".$row['area']."</td>
                                        <td>".$row['room']."</td>
                                        <td>".$row['username']."</td>
                                        <td>".$row['password']."</td>
                                        <td><a href=\"checkout.php?id=".$row['id_name']."\"><button>Checkout</button></button></td>
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