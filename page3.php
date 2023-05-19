<?php
include "db_conn.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>Seller Table</title>
</head>

<body>
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #212A3E;">
  <img src="images/logo.png" class="" alt="#" />
    <nav class="navigation navbar navbar-expand-md navbar-dark ">
   
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                            <div class="collapse navbar-collapse row" id="navbarsExample04" >
                                <ul class="navbar-nav mr-auto">
                                <li class="nav-item active">
                               
                                    </li>
                                    <li class="nav-item active">
                                        <a class="nav-link" href="#"> Home  </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="page3.php">Seller</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="page4.php"> Product</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="page1.php">Logout</a>
                                    </li>

                                </ul>
                            </div>
                        </nav>
  </nav>

  <div class="container">
    <?php
    if (isset($_GET["msg"])) {
      $msg = $_GET["msg"];
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      ' . $msg . '
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
    <a href="add-new.php" class="btn btn-dark mb-3">Add New</a>

    <table class="table table-hover text-center">
      <thead class="table-dark">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Password</th>
          <th scope="col">Gender</th>
          <th scope="col">Street</th>
          <th scope="col">City</th>
          <th scope="col">Phone</th>
          <th scope="col">Photo</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        
        $sql = "SELECT * FROM `crud`";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
          <td><?php echo $row["id"]?></td>
            <td><?php echo $row["name"] ?></td>
            <td><?php echo $row["password"] ?></td>
            <td><?php echo $row["gender"] ?></td>
            <td><?php echo $row["street"] ?></td>
            <td><?php echo $row["city"] ?></td>
            <td><?php echo $row["phone"] ?></td>
            <td><?php echo "<img width='150px' height='150px' src='data:image;base64,{$row["photo"]}' alt='img'>";?></td>
            <td>
              <a href="edit.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
              <a href="delete.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>