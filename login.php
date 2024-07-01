<?php
include('dbcon.php');
session_start();
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    $insert = "SELECT * FROM login WHERE username='$username' AND password='$password'";
    $query = mysqli_query($con,$insert);
    $check = mysqli_fetch_array($query);
    if(isset($check)){
        $_SESSION['user_name'] = $username;
        header('location: search.php');
    }else{
        header('location: index.html');
    }  

?>