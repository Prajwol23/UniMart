<?php
session_start();

if (isset($_GET['q']) && $_GET['q'] == 'fu') {
    $_SESSION['message'] = "Payment failed or canceled. Please try again.";
    header('Location: ../checkout.php');
    exit;
} else {
    $_SESSION['message'] = "Invalid payment failure response.";
    header('Location: checkout.php');
    exit;
}
