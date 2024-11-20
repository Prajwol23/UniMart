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

function  getAllUsers()
{
   global $con;

   $query = "SELECT * FROM users WHERE role_as = '0' ORDER BY id DESC ";

   return mysqli_query($con,$query);
}

function countItems($table,$condition)
{
    global $con;
    $query = "SELECT COUNT(id) AS count FROM $table WHERE $condition = '0' ";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $result = mysqli_fetch_assoc($query_run); // Fetch the result row
        return $result['count']; // Return the count value
    }
    return 0; // Return 0 if query fails
}


?>