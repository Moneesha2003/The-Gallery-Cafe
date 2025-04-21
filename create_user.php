<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $item = $_POST['item'];
   $price = $_POST['price'];

   $select = "SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      $error[] = 'User already exists!';
   } else {
      if($pass != $cpass){
         $error[] = 'Passwords do not match!';
      } else {
         $user_type = 'user'; // Default user type
         $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
         mysqli_query($conn, $insert);
         echo "<script>alert('User creation successful!')</script>";
         exit;
      }
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register Form</title>

   <link rel="stylesheet" href="user.css">

</head>
<body>
   
<div class="form-container">
   <form action="create_user.php" method="post">
      <h3>Register Now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<script>alert("'.$error.'");</script>';
         };
      };
      ?>
      <input type="text" name="name" required placeholder="Enter your name">
      <input type="email" name="email" required placeholder="Enter your email">
      <input type="password" name="password" required placeholder="Enter your password">
      <input type="password" name="cpassword" required placeholder="Confirm your password">
      <input type="hidden" name="item" value="<?php echo isset($_GET['item']) ? $_GET['item'] : ''; ?>">
      <input type="hidden" name="price" value="<?php echo isset($_GET['price']) ? $_GET['price'] : ''; ?>">
      <input type="submit" name="submit" value="Register Now" class="form-btn">
      
   </form>
</div>

</body>
</html>
