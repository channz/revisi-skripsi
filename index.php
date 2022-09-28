<?php
session_start();
    if(!isset($_SESSION['userid']) || $_SESSION['userid']!='admin' ){
        header('Location: login.php');
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
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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

            <!-- cards -->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers">5</div>
                        <div class="cardName">Customers</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="person-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers">3</div>
                        <div class="cardName">Room Sold</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers">1</div>
                        <div class="cardName">Available</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="bed-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers">$784</div>
                        <div class="cardName">This Month</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                </div>
            </div>

            <div class="details">
                <!-- order details list -->
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Recent Orders</h2>
                        <a href="customers.html" class="btn">View All</a>
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
                                <td>Tindakan</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            include 'koneksi.php';
                            $customer = mysqli_query($db1,"select * from customers");
                            for($i=1; $i<=5; $i++)
                            {
                                $row = mysqli_fetch_array($customer);
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

            <div class="addCustomer">
                <a href="addcustomer.php">
                    <span class="icon"><ion-icon name="add-circle-outline"></ion-icon></span>
                    <span class="title">Add Customer</span>
                </a>
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