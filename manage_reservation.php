<?php
@include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
    if ($_POST['action'] == 'delete') {
        $id = intval($_POST['id']);
        $query = "DELETE FROM reservations WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
    } elseif ($_POST['action'] == 'update') {
        $id = intval($_POST['id']);
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $datetime = mysqli_real_escape_string($conn, $_POST['datetime']);
        $guests = intval($_POST['guests']);
        $query = "UPDATE reservations SET name = ?, email = ?, phone = ?, datetime = ?, guests = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssiii", $name, $email, $phone, $datetime, $guests, $id);
        $stmt->execute();
    }
}

$query = "SELECT * FROM reservations";
$result = mysqli_query($conn, $query);
$reservations = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Reservations</title>
   
</head>
<body>
    <h3>Manage Reservations</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Date and Time</th>
                <th>Guests</th>
                <th>Order ID</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reservations as $reservation): ?>
            <tr>
                <form method="post">
                    <td><?php echo htmlspecialchars($reservation['id']); ?></td>
                    <td><input type="text" name="name" value="<?php echo htmlspecialchars($reservation['name']); ?>"></td>
                    <td><input type="email" name="email" value="<?php echo htmlspecialchars($reservation['email']); ?>"></td>
                    <td><input type="text" name="phone" value="<?php echo htmlspecialchars($reservation['phone']); ?>"></td>
                    <td><input type="text" name="datetime" value="<?php echo htmlspecialchars($reservation['datetime']); ?>"></td>
                    <td><input type="number" name="guests" value="<?php echo htmlspecialchars($reservation['guests']); ?>"></td>
                    <td><?php echo htmlspecialchars($reservation['order_id']); ?></td>
                    <td>
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($reservation['id']); ?>">
                        <button type="submit" name="action" value="update">Update</button>
                        <button type="submit" name="action" value="delete" onclick="return confirm('Are you sure?')">Delete</button>
                    </td>
                </form>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <button onclick="location.href='staff.php'">Go Back</button>

    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 20px;
    background-color: grey;
}

h3 {
    text-align: center;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    padding: 10px;
    border: 1px solid #ccc;
    text-align: left;
}

th {
    background-color: #f0f0f0;
}

form {
    margin: 0;
}

button {
    padding: 5px 10px;
    margin: 2px;
    background-color: #4CAF50;
    color: white;
    border: none;
    cursor: pointer;
}

button[type="submit"]:hover {
    background-color: #45a049;
}

button[type="submit"][value="delete"] {
    background-color: #f44336;
}

button[type="submit"][value="delete"]:hover {
    background-color: #e53935;
}

    </style>
</body>
</html>
