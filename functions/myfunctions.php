<?php 

session_start();
include('../config/dbcon.php');

//admin side
function getAll($table)
 {
    global $con;
    $query = "SELECT * FROM $table";
    return $query_run = mysqli_query($con,$query);
 }

//admin side
 function getByID($table, $id)
 {
    global $con;
    $query = "SELECT * FROM $table where id = '$id' ";
    return $query_run = mysqli_query($con,$query);
 }

//admin side
function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header('Location: '.$url);
    exit;
}

//admin side
function getAllOrders()
 {
    global $con;
    $query = "SELECT * FROM orders WHERE status = '0' ";
    return $query_run = mysqli_query($con,$query);
 }

 //admin side

 function  getOrderHistory()
 {
    global $con;
    $query = "SELECT * FROM orders WHERE status != '0' ";
    return $query_run = mysqli_query($con,$query);
 }

 //admin side
function checkTrackingNoValid($trackingNo)
{
   global $con;

   $query = "SELECT * FROM orders WHERE tracking_no = '$trackingNo' ";

   return mysqli_query($con,$query);
}


?>