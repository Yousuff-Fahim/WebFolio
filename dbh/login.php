<?php
session_start();
if(!isset($_POST['email'])){
    header('Location:../login.php');
}
 $p=$_POST['password'];
 $un=$_POST['username'];

include('dbdata.php');
$con=new mysqli($dbservername,$dbusername,$dbpassword,$dbname);

 $sql="SELECT * FROM users WHERE username='$un' AND password='$p'";

 $result=$con->query($sql);

 if($result->num_rows > 0){
    $con->close();
    $_SESSION['user']=$un;
    header('Location:../index.php');
 }else{
    header("Location:../login.php?login-failed");
 }

 $con->close();
?>