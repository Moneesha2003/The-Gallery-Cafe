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
        
                <li><a href="reservation.html">Reservations</a></li>
            
                <li><a class="active" href="login.php">Accounts</a></li>
   
            </ul>
        </div>
    </section>

    <section id="staff">
    <div class="dashboard-container">
      <h1>Welcome, Staff</h1>
      <div class="buttons-container">
        
         <button onclick="location.href='manage_reservation.php'">Manage and View Reservations</button>
      </div>
   </div>
   <style>
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

