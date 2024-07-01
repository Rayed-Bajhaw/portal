<?php
include 'dbcon.php';

if(isset($_POST['submit']))
{
  $name = $_POST['name'];
  $contact = $_POST['contact'];
  $village = $_POST['village'];
  $file = $_FILES['pic'];

  $filename = $file['name'];
  $filepath = $file['tmp_name'];
  $fileerror = $file['error'];

  if($fileerror == 0){

    $destfile = 'upload/'.$filename;
    //echo "$destfile";
    move_uploaded_file($filepath,$destfile);

    $insert = "insert into details(name,contact,village,pic) values('$name','$contact','$village','$destfile')";

    $query = mysqli_query($con,$insert);

    if($query){
      echo "Inserted";
    }else{
      echo "Not inserted";
    }
    header('location:index.html');
  }
}else{
echo "no button has been clicked";
}
?>
