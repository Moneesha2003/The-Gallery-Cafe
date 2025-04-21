<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>The Gallery Cafe</title>
    <link rel="stylesheet" href="menu.css">
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

    <section id="admin">
    <div class="dashboard-container">
      <h1>Welcome, Admin</h1>
      <div class="buttons-container">
         <button onclick="location.href='create_user.php'">Create User Login</button>
         <button onclick="location.href='add_food.php'">Manage Food Details</button>
         <button onclick="location.href='manage_reservation.php'">Manage and View Reservations</button>
      </div>
   </div>

   <style>
   @import url("https://fonts.googleapis.com/css2?family=Spartan:wght@100;200;300;400;500;600;700;800;900&display=swap");
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Spartan", sans-serif;
}
html {
    scroll-behavior: smooth;
  }
h1{
    font-size: 35px;
}

p {
  font-size: 17px;
  color: #ffffff;
  margin: 15px 0 20px 0;
  line-height: 44px;
}

.section-p1 {
  padding: 40px 80px;
}

.section-m1 {
  margin: 40px 0;
}

body {
    font-family: Arial, sans-serif;
    background-image: url(images/billing.jpg);
    width: 100%;
}
#header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 20px 80px;
    background: rgb(123, 187, 118);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.06);
    z-index: 999;
    position: sticky;
    top: 0;
    left: 0;
  }
  
  #navbar {
    display: flex;
    align-items: center;
    justify-content: center;
  }
  
  #navbar li {
    list-style: none;
    padding: 0 20px;
    position: relative;
  }
  
  #navbar li a {
    text-decoration: none;
    font-size: 16px;
    font-weight: 600;
    color: #1a1a1a;
    transition: 0.3s ease;
  }
  
  #navbar li a:hover,
  #navbar li a.active {
    color: #088178;
  }
  
  #navbar li a.active::after,
  #navbar li a:hover::after {
    content: "";
    width: 30%;
    height: 2px;
    background: #088178;
    position: absolute;
    bottom: -4px;
    left: 20px;
  }

.dashboard-container {
  max-width: 500px;
    margin: 50px auto;
    padding: 20px;
    background-color: #ffffff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}


.buttons-container {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.buttons-container button {
    width: 100%;
    padding: 20px;
    background: #5cb85c;
    border: none;
    font-size: 30px;
    color: white;
    border-radius: 5px;
    cursor: pointer;
}

.buttons-container button:hover {
    background: #4cae4c;
}
    </style>
    </section>



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
            <h6>&copy; 2024 The Gallery Café. Experience the world on a plate at The Gallery Café – where every meal is a masterpiece.</h6>
        </div>
    </footer>
</body>
</html>

