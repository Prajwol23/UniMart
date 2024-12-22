<?php
session_start();
$_SESSION['message'] = "Payment failed or canceled. Please try again.";
header('Location: checkout.php');
exit();
?>
