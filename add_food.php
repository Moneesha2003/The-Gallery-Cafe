<?php



// Include the configuration file that contains the database connection details
@include 'config.php';

// Check if the add food form has been submitted
if(isset($_POST['add_food'])){
    $food_item = $_POST['food_item'];
    $food_type = $_POST['food_type'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // Determine the correct table based on the food type
    if($food_type == 'Sri Lankan'){
        $table = 'sl_foods';
    } elseif($food_type == 'Chinese'){
        $table = 'ch_foods';
    } elseif($food_type == 'Italian'){
        $table = 'it_foods';
    } else {
        echo "<script>alert('Invalid food type.');</script>";
        exit();
    }

    // Prepare and execute the SQL query
    $query = "INSERT INTO $table (food_item, food_type, description, price) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    if ($stmt === false) {
        echo "<script>alert('Error preparing the statement: " . $conn->error . "');</script>";
        exit();
    }
    $stmt->bind_param("sssd", $food_item, $food_type, $description, $price);
    if ($stmt->execute()) {
        echo "<script>alert('Food item added successfully!');</script>";
    } else {
        echo "<script>alert('Error executing the statement: " . $stmt->error . "');</script>";
    }
    $stmt->close();
}


// Check if the update food form has been submitted
if(isset($_POST['update_food'])){
    $food_id = $_POST['food_id'];
    $food_item = $_POST['food_item'];
    $food_type = $_POST['food_type'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // Determine the correct table based on the food type
    if($food_type == 'Sri Lankan'){
        $table = 'sl_foods';
    } elseif($food_type == 'Chinese'){
        $table = 'ch_foods';
    } elseif($food_type == 'Italian'){
        $table = 'it_foods';
    } else {
        echo "<script>alert('Invalid food type.');</script>";
        exit();
    }

    // Prepare and execute the SQL query
    $query = "UPDATE $table SET food_item = ?, food_type = ?, description = ?, price = ? WHERE food_id = ?";
    $stmt = $conn->prepare($query);
    if ($stmt === false) {
        echo "<script>alert('Error preparing the statement: " . $conn->error . "');</script>";
        exit();
    }
    $stmt->bind_param("sssdi", $food_item, $food_type, $description, $price, $food_id);
    if ($stmt->execute()) {
        echo "<script>alert('Food item updated successfully!');</script>";
    } else {
        echo "<script>alert('Error executing the statement: " . $stmt->error . "');</script>";
    }
    $stmt->close();
}

// Check if the delete food form has been submitted
if(isset($_POST['delete_food'])){
    $food_id = $_POST['food_id'];
    $food_type = $_POST['food_type'];

    // Determine the correct table based on the food type
    if($food_type == 'Sri Lankan'){
        $table = 'sl_foods';
    } elseif($food_type == 'Chinese'){
        $table = 'ch_foods';
    } elseif($food_type == 'Italian'){
        $table = 'it_foods';
    } else {
        echo "<script>alert('Invalid food type.');</script>";
        exit();
    }

    // Prepare and execute the SQL query
    $query = "DELETE FROM $table WHERE food_id = ?";
    $stmt = $conn->prepare($query);
    if ($stmt === false) {
        echo "<script>alert('Error preparing the statement: " . $conn->error . "');</script>";
        exit();
    }
    $stmt->bind_param("i", $food_id);
    if ($stmt->execute()) {
        echo "<script>alert('Food item deleted successfully!');</script>";
    } else {
        echo "<script>alert('Error executing the statement: " . $stmt->error . "');</script>";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="add_foods.css">
</head>
<body>
    <div class="admin-container">
        <h2>Welcome, Admin</h2>
        <form method="post" action="add_food.php">
            <label for="food_item">Food Item:</label>
            <input type="text" id="food_item" name="food_item" required>
            <label for="food_type">Food Type:</label>
            <select id="food_type" name="food_type" required>
                <option value="Sri Lankan">Sri Lankan</option>
                <option value="Chinese">Chinese</option>
                <option value="Italian">Italian</option>
            </select>
            <label for="description">Description:</label>
            <textarea id="description" name="description" required></textarea>
            <label for="price">Price:</label>
            <input type="number" step="0.01" id="price" name="price" required>
            <input type="submit" name="add_food" value="Add Food">
        </form>


        <h2>Welcome, Admin</h2>
        <form method="post" action="add_food.php">
            <label for="food_id">Food ID:</label>
            <input type="number" id="food_id" name="food_id" required>
            <label for="food_item">Food Item:</label>
            <input type="text" id="food_item" name="food_item" required>
            <label for="food_type">Food Type:</label>
            <select id="food_type" name="food_type" required>
                <option value="Sri Lankan">Sri Lankan</option>
                <option value="Chinese">Chinese</option>
                <option value="Italian">Italian</option>
            </select>
            <label for="description">Description:</label>
            <textarea id="description" name="description" required></textarea>
            <label for="price">Price:</label>
            <input type="number" step="0.01" id="price" name="price" required>
            <input type="submit" name="update_food" value="Update Food">
        </form>

        <h2>Welcome, Admin</h2>
        <form method="post" action="add_food.php">
            <label for="food_id">Food ID:</label>
            <input type="number" id="food_id" name="food_id" required>
            <label for="food_type">Food Type:</label>
            <select id="food_type" name="food_type" required>
                <option value="Sri Lankan">Sri Lankan</option>
                <option value="Chinese">Chinese</option>
                <option value="Italian">Italian</option>
            </select>
            <input type="submit" name="delete_food" value="Delete Food">
        </form>
    </div>
</body>
</html>
