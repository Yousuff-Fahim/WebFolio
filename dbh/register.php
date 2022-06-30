<?php
    if(!isset($_POST['email'])){
        header("Location:../signup.php");
    }
    $e=$_POST['email'];
    $p=$_POST['password'];
    $un=$_POST['username'];
    $n=$_POST['name'];

    include('dbdata.php');
    $con=new mysqli($dbservername,$dbusername,$dbpassword,$dbname);

    $sql="SELECT email FROM users WHERE email='$e'";
    $result=$con->query($sql);

    if($result->num_rows > 0){
        header("Location:../signup.php?email-exists");
    }else{
        $sql2="SELECT username FROM users WHERE username='$un'";
        $result2=$con->query($sql2);

        if($result2->num_rows > 0){
            header("Location:../signup.php?username-exists");
        }else{
            $sql3="INSERT INTO users(name, email, username, password) VALUES ('$n','$e','$un','$p')";
            $result3=$con->query($sql3);

            if($result3== TRUE){
                header("Location:../login.php?success");
            }else{
                header("Location:../signup.php?failed");
            }
        }
    }

    $con->close();
?>