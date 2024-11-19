<?php
// Get the current page's filename
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!-- <nav class="navbar navbar-expand-lg bg-body-tertiary"> -->
<nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark shadow">
  <div class="container">
    <a class="navbar-brand" href="index.php">MobileHub</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item me-1">
          <a class="nav-link <?php echo($current_page == 'index.php') ? 'active' : ''; ?>" href="index.php"><i class="fa fa-home me-1"></i>Home</a>
        </li>
        <li class="nav-item me-1">
          <a class="nav-link <?php echo($current_page == 'categories.php') ? 'active' : ''; ?>" href="categories.php"><i class="fa fa-th me-1"></i>Collections</a>
        </li>
        <li class="nav-item me-1">
          <a class="nav-link <?php echo($current_page == 'cart.php') ? 'active' : ''; ?>" href="cart.php"><i class="fa fa-shopping-cart me-1"></i>Cart</a> 
        </li>

        <?php
        if (isset($_SESSION['auth'])) {
          ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-user-circle me-1"></i> <?= $_SESSION['auth_user']['name'];?>
            </a>
            <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="my-orders.php">Your Order's</a></li>
              <li><a class="dropdown-item" href="#">Change Password</a></li>
              <li><a class="dropdown-item" href="logout.php">Logout</a></li>
            </ul>
          </li>
          <?php
        }
        else{
          ?>
          <li class="nav-item me-1">
            <a class="nav-link" href="register.php"><i class="fa fa-user-plus me-1"></i>Register</a>
          </li>
          <li class="nav-item me-1">
            <a class="nav-link" href="login.php"><i class="fa fa-sign-in me-1"></i>Login</a>
          </li>

          <?php
        }
        ?>
        </ul>
    </div>
  </div>
</nav>