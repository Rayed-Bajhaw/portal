<?php
include 'dbcon.php';
$id=$_GET['id'];
$query="DELETE FROM details WHERE userid='$id'";
$query_run = mysqli_query($con,$query);
if($query_run)
    {
        header('location:search.php');
    }else{
        die(mysqli_error($con));
    }
?>