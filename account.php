<?php
session_start();

if (isset($_POST['submit'])) {

   $username = $_POST['username'];
   $password = $_POST['password'];
   $user_type = $_POST['user_type'];

   // Hardcoded credentials
   $admin_username = "admin";
   $admin_password = "admin1234";
   $staff_username = "staff";
   $staff_password = "staff1234";

   if ($user_type == 'admin' && $username == $admin_username && $password == $admin_password) {
      $_SESSION['admin_name'] = $username;
      header('location:add_food.php'); // Redirecting to add_food.php for admin
      exit;
   } elseif ($user_type == 'staff' && $username == $staff_username && $password == $staff_password) {
      $_SESSION['staff_name'] = $username;
      header('location:staff.php');
      exit;
   } else {
      $error = 'Incorrect username or password!';
      echo "<script>alert('Login failed. Try again.');</script>";
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Gallery Cafe</title>
    <link rel="stylesheet" href="account.css">
</head>
<body>
    <section id="header">
        <a href="#"><img src="images/logo.png" class="logo" alt=""></a>
        <div>
            <ul id="navbar">
                <li><a href="index.html">Home</a></li>
                <li><a href="menu.php">Menu</a></li>
                <li><a href="reservation.html">Reservations</a></li>
                <li><a href="events.html">Events</a></li>
                <li><a href="index.html#about">About Us</a></li>
                <li><a class="active" href="account.php">Accounts</a></li>
            </ul>
        </div>
    </section>
    
    <section id="account">
        <div class="form-container">
            <form action="login.php" method="post">
                <h3>Login Now</h3>
                <select name="user_type" required>
                    <option value="admin">Admin</option>
                    <option value="staff">Staff</option>
                </select>
                <input type="text" name="username" required placeholder="Enter your username">
                <input type="password" name="password" required placeholder="Enter your password">
                <input type="submit" name="submit" value="Login Now" class="form-btn">
            </form>
        </div>
    </section>
</body>
</html>



    <footer>
        <div class="footer-container">
            <div class="footer-section">
                <h3>Our Establishments</h3>
                <p>Paradise Road Flagship Store<br>Open - 10 AM - 7 PM</p>
                <p>Paradise Road The Gallery Café<br>Open - 10 AM - Midnight</p>
                <p>Paradise Road Tintagel Colombo<br>Open - 6:30 AM - 11 PM</p>
            </div>
            <div class="footer-section">
                <h3>How Can We Help</h3>
                <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Payment Methods</a></li>
                    <li><a href="#">Terms & Conditions</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Connect</h3>
                <ul>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Customer Service</a></li>
                    <li><a href="#">Media Stay</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Contact</h3>
                <p>Phone: +94 11 2686043</p>
                <p>Email: <a href="mailto:customerservice@paradiseroad.lk">customerservice@paradiseroad.lk</a></p>
                <div class="social-media">
                    <i class='bx bxl-facebook'></i>
                    <i class='bx bxl-instagram'></i>
                </div>
                
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 The Gallery Café. Experience the world on a plate at The Gallery Café – where every meal is a masterpiece.</p>
        </div>
    </footer>
    <script src="account.js"></script>

</body>
</html>




