<?php
session_start();
$login=0;
$invalid=0;
if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php';
    if(isset($_POST['login'])){
        $username=$_POST['username'];
        $password=md5($_POST['password']);

        $sql="Select * from `data` where 
        username='$username' and password='$password'";
        $result=mysqli_query($con,$sql);
        if($result){
            $num=mysqli_num_rows($result);
            if($num>0){
                //echo "Login Successful";
                $login=1;
                $_SESSION['username']=$username;
                header('location:welcome.php');
            }
            else{
                //echo "Invalid credentials";
                $invalid=1;
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <?php
    if($login){
        echo "<div class='alert alert-success' role='alert'>
       Login Successful!
      </div>";
    }
    else{
        if($invalid){
            echo "<div class='alert alert-danger' role='alert'>
       Invalid credentials!
      </div>";
        }
        
    }


?>
</body>
</html>