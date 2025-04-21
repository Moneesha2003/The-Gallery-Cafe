<?php
@include 'config.php';
session_start();

// Fetch data for Sri Lankan foods
$query_sl = "SELECT * FROM sl_foods";
$result_sl = $conn->query($query_sl);

// Fetch data for Chinese foods
$query_ch = "SELECT * FROM ch_foods";
$result_ch = $conn->query($query_ch);

// Fetch data for Italian foods
$query_it = "SELECT * FROM it_foods";
$result_it = $conn->query($query_it);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Gallery Cafe</title>
    <link rel="stylesheet" href="menu.css">
    <script src="menu.js" defer></script>
</head>
<body>
    <section id="header">
        <a href="#"><img src="images/logo.png" class="logo" alt=""></a>
        <div>
            <ul id="navbar">
                <li><a href="index.html">Home</a></li>
                <li><a class="active" href="menu.php">Menu</a></li>
                <li><a href="reservation.html">Reservations</a></li>
                <li><a href="events.html">Events</a></li>
                <li><a href="index.html#about">About Us</a></li>
                <li><a href="account.php">Accounts</a></li>
            </ul>
        </div>
    </section>

    <section id="menu">
        <div class="menu-container">
            <h1>Our Menu</h1>
            <div class="search-bar">
                <input type="text" id="search-input" placeholder="Search for cuisine type (Sri Lankan, Chinese, Italian)">
                <button onclick="scrollToCuisine()">Search</button>
            </div>

            <section id="bg1"></section>

            <h2 id="sri-lankan">Sri Lankan Foods</h2>
            <table>
                <thead>
                    <tr>
                        <th>Food ID</th>
                        <th>Food Item</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result_sl->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['food_id']; ?></td>
                        <td><?php echo $row['food_item']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td><a href="register_form.php?item=<?php echo $row['food_item']; ?>&price=<?php echo $row['price']; ?>" class="order-button">Order Now</a></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

            <section id="bg2"></section>

            <h2 id="chinese">Chinese Foods</h2>
            <table>
                <thead>
                    <tr>
                        <th>Food ID</th>
                        <th>Food Item</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result_ch->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['food_id']; ?></td>
                        <td><?php echo $row['food_item']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td><a href="register_form.php?item=<?php echo $row['food_item']; ?>&price=<?php echo $row['price']; ?>" class="order-button">Order Now</a></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

            <section id="bg3"></section>

            <h2 id="italian">Italian Foods</h2>
            <table>
                <thead>
                    <tr>
                        <th>Food ID</th>
                        <th>Food Item</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result_it->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['food_id']; ?></td>
                        <td><?php echo $row['food_item']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td><a href="register_form.php?item=<?php echo $row['food_item']; ?>&price=<?php echo $row['price']; ?>" class="order-button">Order Now</a></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
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
