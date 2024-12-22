<?php
session_start();
include('../config/dbcon.php');

if (isset($_POST['proceedToPayment'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $pincode = mysqli_real_escape_string($con, $_POST['pincode']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $totalPrice = $_POST['total_price'];

    if (empty($name) || empty($email) || empty($phone) || empty($pincode) || empty($address)) {
        $_SESSION['message'] = "All fields are mandatory.";
        header('Location: ../checkout.php');
        exit();
    }

    $tracking_no = "unicart" . rand(1111, 9999) . substr($phone, 2);
    $_SESSION['order_data'] = [
        'tracking_no' => $tracking_no,
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'pincode' => $pincode,
        'address' => $address,
        'totalPrice' => $totalPrice,
    ];

    $esewaUrl = "https://uat.esewa.com.np/epay/main";
    $merchantCode = "EPAYTEST";
    $successUrl = "http://localhost/MobileHub/esewa-success.php";
    $failureUrl = "http://localhost/MobileHub/esewa-failure.php";

    echo "<form id='esewaForm' action='$esewaUrl' method='POST'>
        <input type='hidden' name='tAmt' value='$totalPrice'>
        <input type='hidden' name='amt' value='$totalPrice'>
        <input type='hidden' name='txAmt' value='0'>
        <input type='hidden' name='psc' value='0'>
        <input type='hidden' name='pdc' value='0'>
        <input type='hidden' name='scd' value='$merchantCode'>
        <input type='hidden' name='pid' value='$tracking_no'>
        <input type='hidden' name='su' value='$successUrl'>
        <input type='hidden' name='fu' value='$failureUrl'>
    </form>
    <script>document.getElementById('esewaForm').submit();</script>";
    exit();
}
?>
