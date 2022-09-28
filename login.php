<?php
    session_start();
    include('koneksi.php');
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];    
        $hasil1 = getSingleQuery($db1, "select * from customers where username='$username' and password='$username'");
        $hasil2 = getSingleQuery($db1, "select * from tbadmin where username='$username' and password='$username'");
        $hasil3 = getSingleQuery($db1, "select * from tbcleaning where username='$username' and password='$username'");
        echo "select * from tbadmin where username='$username' and password='$username'";
        if($hasil1){
            $_SESSION['userid'] = $hasil1['id_name'];
            $_SESSION['room'] = $hasil1['room'];
            header('Location: index_customer.php');
        }
        if($hasil2){
            $_SESSION['userid']='admin';
            header('Location: index.php');
        }
        if($hasil3){
            $_SESSION['userid']='cs';
            header('Location: index_cs.php');
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>login</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:700,600' rel='stylesheet' type='text/css'>
<style>
body{
  font-family: 'Open Sans', sans-serif;
  background:#3498db;
  margin: 0 auto 0 auto;  
  width:100%; 
  text-align:center;
  margin: 20px 0px 20px 0px;   
}

p{
  font-size:12px;
  text-decoration: none;
  color:#ffffff;
}

h1{
  font-size:1.5em;
  color:#525252;
}

.box{
  background:white;
  width:300px;
  border-radius:6px;
  margin: 0 auto 0 auto;
  padding:0px 0px 70px 0px;
  border: #2980b9 4px solid; 
}

.email{
  background:#ecf0f1;
  border: #ccc 1px solid;
  border-bottom: #ccc 2px solid;
  padding: 8px;
  width:250px;
  color:#AAAAAA;
  margin-top:10px;
  font-size:1em;
  border-radius:4px;
}

.password{
  border-radius:4px;
  background:#ecf0f1;
  border: #ccc 1px solid;
  padding: 8px;
  width:250px;
  font-size:1em;
}

.btn{
  background:#2ecc71;
  width:265px;
  padding-top:5px;
  padding-bottom:5px;
  color:white;
  border-radius:4px;
  border: #27ae60 1px solid;
  
  margin-top:20px;
  margin-bottom:20px;
  float:left;
  margin-left:16px;
  font-weight:800;
  font-size:0.8em;
}

.btn:hover{
  background:#2CC06B; 
}

#btn2{
  float:left;
  background:#3498db;
  width:125px;  padding-top:5px;
  padding-bottom:5px;
  color:white;
  border-radius:4px;
  border: #2980b9 1px solid;
  
  margin-top:20px;
  margin-bottom:20px;
  margin-left:10px;
  font-weight:800;
  font-size:0.8em;
}

#btn2:hover{ 
background:#3594D2; 
}
</style>
</head>
<body>
<form method="post" action="">
<div class="box">
<h1>Login</h1>

<input type="text" name="username" class="email" placeholder="username"/>
<input type="password" name="password" class="email" placeholder="password" />
<input type="submit" value="Submit" name="submit" class="btn">

  
</div> <!-- End Box -->
  
</form>


  
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script>

</body>
</html>

