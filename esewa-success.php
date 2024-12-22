<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once('config/dbcon.php');
include_once('functions/userfunctions.php');

if (isset($_SESSION['order_data'])) {
    $orderData = $_SESSION['order_data'];
    $tracking_no = $orderData['tracking_no'];
    $name = $orderData['name'];
    $email = $orderData['email'];
    $phone = $orderData['phone'];
    $pincode = $orderData['pincode'];
    $address = $orderData['address'];
    $totalPrice = $orderData['totalPrice'];
    $userId = $_SESSION['auth_user']['user_id'];

    // Insert order into `orders` table with payment_mode set to 'Esewa' and payment_status set to 'Order Placed'
    $insert_query = "INSERT INTO orders (tracking_no, user_id, name, email, phone, address, pincode, total_price, payment_status, payment_mode) 
                     VALUES ('$tracking_no', '$userId', '$name', '$email', '$phone', '$address', '$pincode', '$totalPrice', 'Order Placed', 'Esewa')";
    $insert_query_run = mysqli_query($con, $insert_query);

    if ($insert_query_run) {
        $order_id = mysqli_insert_id($con);
        $cartItems = getCartItems();

        while ($citem = mysqli_fetch_assoc($cartItems)) {
            $prod_id = $citem['prod_id'];
            $prod_qty = $citem['prod_qty'];
            $price = $citem['selling_price'];

            // Insert into `order_items`
            $insert_items_query = "INSERT INTO order_items (order_id, prod_id, qty, price) 
                                   VALUES ('$order_id', '$prod_id', '$prod_qty', '$price')";
            mysqli_query($con, $insert_items_query);

            // Update product quantity
            $product_query = "UPDATE products SET qty = qty - $prod_qty WHERE id = '$prod_id'";
            mysqli_query($con, $product_query);
        }

        // Clear cart
        $clearCart = "DELETE FROM carts WHERE user_id = '$userId'";
        mysqli_query($con, $clearCart);

        unset($_SESSION['order_data']);
        $_SESSION['message'] = "Order placed successfully!";
        header('Location: my-orders.php');
        exit();
    } else {
        die("Error inserting order: " . mysqli_error($con));
    }
}

$_SESSION['message'] = "Something went wrong!";
header('Location: checkout.php');
exit();
?>
