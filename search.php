<?php
session_start(); 
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=0.7,maximum-scale=2">
  <title></title>
  <!--Bootstrap link-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <!--Font awesome-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    
    <!--Navbar-->
<nav class="navbar bg-body-tertiary">
    <form class="container-fluid justify-content-end">
      <a href="logout.php"> <button class="btn btn-outline-primary me-2" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">LogOut</button> </a>
    </form>
  </nav>

    <!--Search section-->
    <form action="" method="post">
    <div class="search_container d-flex justify-content-center">
      <div class="search m-5  col-lg-6 col-mg-10">
        <div class="input-group ">
          <input type="text" name="search" required value="<?php if(isset($_POST['search'])) { echo $_POST['search']; } ?>" class="form-control"  placeholder="Search Name" aria-label="Search Name">
          <span class="input-group-text" name="search" id="basic-addon2"><i class="fa-solid fa-magnifying-glass"></i></span>
          <!--<button class="btn btn-outline-secondary" type="button" id="button-addon2">Button</button>-->
        </div>
      </div>
    </div>
    
    <!--details section-->
    <table class="table caption-top">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Contact</th>
          <th scope="col">Village</th>
          <th scope="col">Photo</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <?php
        include 'dbcon.php';
        $userprofile = $_SESSION['user_name'];
        if($userprofile == true)
        {
            
        }
        else
        {
          header('Location: index.html');
        }
        
        if(isset($_POST['search']))
        {
          $filtervalues = $_POST['search'];
          $query = "SELECT * FROM details WHERE CONCAT(name,village) LIKE '%$filtervalues%' ";
          $query_run = mysqli_query($con,$query);

          if(mysqli_num_rows($query_run) > 0)
          {
            foreach ($query_run as $items)
            {
              ?>
              <tr>
                <td><?=$items['name'];?></td>
                <td><?=$items['contact'];?></td>
                <td><?=$items['village'];?></td>
                <td><img src="<?= $items['pic']; ?>" width="100"height="100"></td>
                <td><a href="delete.php?id=<?php echo $items['userid']; ?>" onclick="return checkdelete()"><i class="fa-solid fa-trash" style="color: #fa0000;"></i></a></td>
              </tr>
              <?php
            }
          }
          else
          {
            ?>
            <tr>
              <td colspan="5">No record found</td>
            </tr>
            <?php
          }
        }
        ?>

      </tbody>
    </table>
    <!--for popup message of confirmation-->
    <script>
      function checkdelete()
      {
        return confirm("Are you sure you want to delete");
      }
    </script>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
