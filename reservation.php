<?php
@include 'config.php';

$name = '';
$email = '';
$phone = '';
$datetime = '';
$guests = '';
$order_details = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $datetime = mysqli_real_escape_string($conn, $_POST['datetime']);
    $guests = intval($_POST['guests']);
    $order_id = intval($_POST['order_id']);

    // Fetch order details
    $query = "SELECT * FROM billing WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $order_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $order_details = $result->fetch_assoc();

    if ($order_details) {
        // Save reservation details
        $query = "INSERT INTO reservations (name, email, phone, datetime, guests, order_id) VALUES ('$name', '$email', '$phone', '$datetime', $guests, $order_id)";
        if (mysqli_query($conn, $query)) {
            // Proceed to display receipt
        } else {
            $error_message = "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    } else {
        $error_message = "Invalid Order ID.";
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>
    <link rel="stylesheet" href="reservation.css">
</head>
<body>
    <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($order_details) && $order_details) : ?>
        <div class="receipt">
            <h3>Reservation and Order Receipt</h3>
            <div class="details">
                <h4>Order Details</h4>
                <p>Order ID: <?php echo htmlspecialchars($order_details['id']); ?></p>
                <p>Food Name: <?php echo htmlspecialchars($order_details['item']); ?></p>
                <p>Quantity: <?php echo htmlspecialchars($order_details['quantity']); ?></p>
                <p>Total Price: Rs. <?php echo htmlspecialchars($order_details['total_price']); ?></p>
            </div>
            <div class="details">
                <h4>Reservation Details</h4>
                <p>Name: <?php echo htmlspecialchars($name); ?></p>
                <p>Email: <?php echo htmlspecialchars($email); ?></p>
                <p>Phone: <?php echo htmlspecialchars($phone); ?></p>
                <p>Date and Time: <?php echo htmlspecialchars($datetime); ?></p>
                <p>Number of Guests: <?php echo htmlspecialchars($guests); ?></p>
            </div>
        </div>
    <?php endif; ?>
    <?php if (isset($error_message)) : ?>
        <div class="error">
            <p><?php echo htmlspecialchars($error_message); ?></p>
        </div>
    <?php endif; ?>
</body>
</html>
