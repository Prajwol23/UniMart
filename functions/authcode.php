<?php
session_start();
include('../config/dbcon.php');
include('myfunctions.php');

//for registered user
if (isset($_POST['register_btn'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

    //check if email is already registered
    $check_email_query = "SELECT email FROM users WHERE email = '$email'";
    $check_email_query_run = mysqli_query($con, $check_email_query);

    if (mysqli_num_rows($check_email_query_run) > 0) {
        $_SESSION['message'] = 'Email already registered.';
        header('Location: ../register.php');
    } else {
        if ($password == $cpassword) {
            //insert user data
            $insert_query = "INSERT INTO users (name,email,phone,password) VALUES ('$name','$email','$phone','$password')";
            $insert_query_run = mysqli_query($con, $insert_query);

            if ($insert_query_run) {
                $_SESSION['message'] = "Registered successfully";
                header('Location: ../login.php');
            } else {
                $_SESSION['message'] = 'Something went wrong';
                header('Location: ../register.php');
            }
        } else {
            $_SESSION['message'] = 'Password did not match';
            header('Location: ../register.php');
        }
    }
}

//for logging user
else if (isset($_POST['login_btn'])) {
    
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $login_query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $login_query_run = mysqli_query($con, $login_query);

    if (mysqli_num_rows($login_query_run) > 0) 
    {
     $_SESSION['auth'] = true;

     $userdata = mysqli_fetch_array($login_query_run);

     $userid = $userdata['id'];
     $username = $userdata['name'];
     $useremail = $userdata['email'];
     $role_as = $userdata['role_as'];

     $_SESSION['auth_user'] = [
        'user_id' => $userid,
        'name' => $username,
        'email' => $useremail,
     ];
  
     //if i logged in as admin it will redirect to the admin dashboard 
     //if role_as vlaue is 0  it is user and if it is 1 then it is admin 
     $_SESSION['role_as'] = $role_as;

     if($role_as == 1){
        redirect("../admin/index.php",message: "Welcome to Admin Panel.");
     }

     else
     {
        redirect("../index.php",message: "Logged in successfully.");
    //  $_SESSION['message'] = "Logged in successfully.";
    //  header('Location: ../index.php');
     }

    }

    else{
        redirect("../login.php",message: "Invalid Credentials.");
        // $_SESSION['message'] = "Invalid Credentials";
        // header('Location: ../login.php');
    }
}
?>