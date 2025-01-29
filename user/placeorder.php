<?php
session_start(); // Ensure session is started to access the cart data

// Establish database connection
$con = mysqli_connect('localhost', 'root', '', 'ecommerce');

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['placeOrderBtn'])) {
    // Fetch form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $pincode = $_POST['pincode'];
    $address = $_POST['address'];
    $payment_mode = $_POST['payment_mode'];

    // Generate tracking number and example user ID
    $tracking_no = "TRACK" . rand(1000, 9999);
    $user_id = 1; // Replace with the actual logged-in user ID

    // Calculate total price from session cart
    $total_price = 0;
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $value) {
            $product_price = (float) $value['productPrice'];
            $product_quantity = (int) $value['productQuantity'];
            $product_total = $product_price * $product_quantity;
            $total_price += $product_total;
        }
    } else {
        // Redirect to the homepage if the cart is empty
        header('Location: index.php');
        exit(0);
    }

    // Validate form fields
    if (empty($name) || empty($email) || empty($phone) || empty($pincode) || empty($address) || empty($payment_mode)) {
        die("All fields are required!");
    }

    // Insert query (do not include `id` since it is auto-incremented)
    $query = "INSERT INTO `orders`(`tracking_no`, `user_id`, `name`, `email`, `phone`, `address`, `pincode`, `total_price`, `payment_mode`) 
              VALUES ('$tracking_no', '$user_id', '$name', '$email', '$phone', '$address', '$pincode', '$total_price', '$payment_mode')";

    // Execute the query and check for errors
    if (!mysqli_query($con, $query)) {
        die("Query failed: " . mysqli_error($con));
    }

    // Clear the cart from the session after the order is placed
    unset($_SESSION['cart']);

    // Set the success message in the session
    $_SESSION['order_success_message'] = "Order placed successfully!!";

    // Redirect to the orders page on success
    header('Location: my-orders.php');
    exit(0);
}
?>
