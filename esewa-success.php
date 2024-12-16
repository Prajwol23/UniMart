<?php
session_start();
include('config/dbcon.php');

if (isset($_GET['q']) && $_GET['q'] == 'su' && isset($_GET['oid']) && isset($_GET['amt'])) {
    $order_id = $_GET['oid'];
    $amount = $_GET['amt'];

    // eSewa Transaction Verification
    $url = "https://uat.esewa.com.np/epay/transrec"; // eSewa's testing endpoint
    $data = [
        'amt' => $amount,
        'rid' => $_GET['refId'], // This is the reference ID provided by eSewa after payment
        'pid' => $order_id,
        'scd' => 'EPAYTEST', // Test merchant code
    ];

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    curl_close($curl);

    if (strpos($response, 'Success') !== false) {
        // Update order status in the database as "Completed"
        $update_query = "UPDATE orders SET payment_id = '{$_GET['refId']}', payment_status = 'Completed' WHERE id = '$order_id'";
        mysqli_query($con, $update_query);

        $_SESSION['message'] = "Payment successful and order placed!";
        header('Location: my-orders.php');
        exit;

    } 
    
    else 
    {
        $_SESSION['message'] = "Payment verification failed. Contact support.";
        header('Location: checkout.php');
        exit;
    }
} else {
    $_SESSION['message'] = "Invalid payment details.";
    header('Location: checkout.php');
    exit;
}
