<?php
@include 'config.php';
session_start();

if(!isset($_SESSION['user_name']) && !isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

if(isset($_POST['submit'])){
   $item = $_POST['item'];
   $price = $_POST['price'];
   $quantity = intval($_POST['quantity']);
   $total_price = $quantity * $price;
   $username = $_SESSION['user_name'] ?? $_SESSION['admin_name'];

   
   $order_id = save_order($item, $username, $quantity, $total_price);
}

function save_order($item, $username, $quantity, $total_price){
   global $conn;
   $query = "INSERT INTO billing (username, item, quantity, total_price) VALUES (?, ?, ?, ?)";
   $stmt = $conn->prepare($query);
   $stmt->bind_param("ssii", $username, $item, $quantity, $total_price);
   $stmt->execute();
   $order_id = $stmt->insert_id;
   $stmt->close();
   return $order_id;
}

$item = isset($_GET['item']) ? $_GET['item'] : '';
$price = isset($_GET['price']) ? $_GET['price'] : 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Billing</title>
   <link rel="stylesheet" href="billing.css">
   <script>
      function calculateTotalPrice() {
         var quantity = document.getElementById('quantity').value;
         var pricePerItem = document.getElementById('price').value;
         var totalPrice = quantity * pricePerItem;
         document.getElementById('total_price').value = totalPrice;
      }
   </script>
</head>
<body>
   <div class="billing-container">
      <h3>Order Confirmed!</h3>
      <p>Thank you for ordering <?php echo htmlspecialchars($item); ?>.</p>
      <form method="post" action="">
         <input type="hidden" name="item" value="<?php echo htmlspecialchars($item); ?>">
         <input type="hidden" id="price" name="price" value="<?php echo htmlspecialchars($price); ?>">
         <label for="quantity">Quantity:</label>
         <input type="number" id="quantity" name="quantity" min="1" required onchange="calculateTotalPrice()">
         <label for="total_price">Total Price (Rs.):</label>
         <input type="text" id="total_price" name="total_price" readonly>
         <input type="submit" name="submit" value="Submit">
      </form>
      <?php if(isset($order_id)): ?>
         <div class="bill">
    <h4>Bill Details</h4>
    <p>Order ID: <?php echo $order_id; ?></p>
    <p>Food Name: <?php echo htmlspecialchars($item); ?></p>
    <p>Quantity: <?php echo $quantity; ?></p>
    <p>Total Price: Rs. <?php echo $total_price; ?></p>
    <a href="reservation.html" class="reservation-button">Make a Reservation</a>

    <style>
      .reservation-button {
    display: inline-block;
    margin-top: 20px;
    padding: 10px 20px;
    font-size: 16px;
    color: #fff;
    background-color: #007BFF;
    text-align: center;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.reservation-button:hover {
    background-color: #0056b3;
}
    </style>
</div>

      <?php endif; ?>
   </div>
</body>
</html>
