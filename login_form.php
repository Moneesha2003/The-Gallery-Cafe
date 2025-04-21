<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $item = $_POST['item'];
   $price = $_POST['price'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){
         $_SESSION['admin_name'] = $row['name'];
         header('location:admin_page.php');
      } elseif($row['user_type'] == 'user'){
         $_SESSION['user_name'] = $row['name'];
         header('location:billing.php?item='.$item.'&price='.$price);
      }
     
   } else {
      $error[] = 'incorrect email or password!';
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <link rel="stylesheet" href="user.css">

</head>
<body>
   
<div class="form-container">
   <form action="login_form.php" method="post">
      <h3>login now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="hidden" name="item" value="<?php echo isset($_GET['item']) ? $_GET['item'] : ''; ?>">
      <input type="hidden" name="price" value="<?php echo isset($_GET['price']) ? $_GET['price'] : ''; ?>">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>don't have an account? <a href="register_form.php?item=<?php echo isset($_GET['item']) ? $_GET['item'] : ''; ?>&price=<?php echo isset($_GET['price']) ? $_GET['price'] : ''; ?>">register now</a></p>
   </form>
</div>

</body>
</html>
