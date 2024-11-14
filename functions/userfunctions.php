<?php
session_start();
include('config/dbcon.php');

//user side
function getAllActive($table) //getting all the categories that are active by status
{
   global $con;
   $query = "SELECT * FROM $table WHERE status = '0' ";  //status 0 means active
   return $query_run = mysqli_query($con,$query);
}

//user side
function getIDActive($table, $id)
{
   global $con;
   $query = "SELECT * FROM $table where id = '$id' AND status = '0' ";
   return $query_run = mysqli_query($con,$query);
}

//user side
function getSlugActive($table, $slug)
{
   global $con;
   $query = "SELECT * FROM $table where slug = '$slug' AND status = '0' LIMIT 1";
   return $query_run = mysqli_query($con,$query);
}

//user side

function getProdByCategory($category_id)
{
    global $con;
    $query = "SELECT * FROM products where category_id = '$category_id' AND status = '0' ";
    return $query_run = mysqli_query($con,$query);
}

//user side
function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header('Location: '.$url);
    exit;
}

?>