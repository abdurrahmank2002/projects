<?php
include "db_conn.php";

if (isset($_POST["submit"])){
   $name = $_POST['name'];
   $password = $_POST['password'];
   $gender = $_POST['gender'];
   $street = $_POST['street'];
   $city = $_POST['city'];
   $phone = $_POST['phone'];
   $photo = $_FILES['photo']['tmp_name'];
   // $variable =$_FILES['photo']['name'];
   $photo=file_get_contents($photo);
   $photo =base64_encode($photo);




   $sql = "INSERT INTO `crud`( `name`, `password`, `gender`,`street`,`city`,`phone`,`photo`) VALUES ('$name','$password','$gender','$street','$city','$phone','$photo')";

   $result = mysqli_query($conn, $sql);

   if ($result) {
      header("Location: page3.php?msg=New record created successfully");
   } else {
      echo "Failed: " . mysqli_error($conn);
   }
}

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

   <title>PHP CRUD Application</title>
</head>

<body>
   <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
      PHP Complete CRUD Application
   </nav>

   <div class="container">
      <div class="text-center mb-4">
         <h3>Add New User</h3>
         <p class="text-muted">Complete the form below to add a new user</p>
      </div>

      <div class="container d-flex justify-content-center">
         <form action="" method="post" style="width:50vw; min-width:300px;" enctype="multipart/form-data">
            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">Name:</label>
                  <input type="text" class="form-control" name="name" placeholder="Albert">
               </div>

               <div class="col">
                  <label class="form-label">Password:</label>
                  <input type="password" class="form-control" name="password" placeholder="Einstein">
               </div>
            </div>
            <div class="row">
            <div class="form-group mb-3 col">
               <label>Gender:</label>
               &nbsp;
               <br>
               <input type="radio" class="form-check-input" name="gender" id="male" value="male">
               <label for="male" class="form-input-label">Male</label>
               
               &nbsp;<br>
               <input type="radio" class="form-check-input" name="gender" id="female" value="female">
               <label for="female" class="form-input-label">Female</label>
            </div>
            <div class="col">
                  <label class="form-label">Street:</label>
                  <input type="text" class="form-control" name="street" placeholder="Einstein">
            </div>
            </div>
            <div class="row">
                           <div class="col">
                  <label class="form-label">City:</label>
                  <input type="text" class="form-control" name="city" placeholder="Einstein">
               </div>
               <div class="col">
                  <label class="form-label">Phone:</label>
                  <input type="tel" class="form-control" name="phone" placeholder="Einstein">
               </div>
               </div>
<div class="row">
               <div class="col-6 mt-3">
                  <label class="form-label">Photo:</label>
                  <input type="file" class="form-control" name="photo" placeholder="Einstein">
               </div>
               </div>
            <div class="mt-5">
              <button type="submit" class="btn btn-success" name="submit">Save</button>
               <a href="page3.php" class="btn btn-danger">Cancel</a>
            </div>
         </form>
      </div>
   </div>

   <!-- Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>