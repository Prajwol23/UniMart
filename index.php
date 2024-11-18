<?php

include('functions/userfunctions.php');
include('includes/header.php');
include('includes/slider.php');

?>

<div class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h4>Trending Products</h4>
        <div class="underline mb-2"></div>
          <div class="owl-carousel">

            <?php
            $trendingProducts = getAllTrending();

            if (mysqli_num_rows($trendingProducts) > 0) 
            {
              foreach ($trendingProducts as $item) 
              {
                ?>
                <div class="item">
                  <a href="product-view.php?product=<?= $item['slug']; ?>">
                    <!-- this products.php is separate for usser display only -->
                    <div class="card shadow">
                      <div class="card-body">
                        <img src="uploads/<?= $item['image']; ?>" alt="Product Image" class="w-100" style="height: 200px; object-fit: cover;">
                        <h6 class="text-center"><?= $item['name']; ?></h6>
                      </div>
                    </div>
                  </a>
                </div>
                <?php

              }
            }

            ?>
          </div>
      </div>
    </div>
  </div>
</div>


<div class="py-5 bg-f2f2f2">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h4>About Us</h4>
        <div class="underline mb-2"></div>
        <p>
          Lorem ipsum dolor sit, amet consectetur adipisicing elit. Non, sunt? Odit error corrupti magni aliquam nostrum illo officiis! Voluptate alias omnis facere dolor beatae, voluptatibus dolores fuga voluptatum officia ratione.
        </p>
          <p>
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Non, sunt? Odit error corrupti magni aliquam nostrum illo officiis! Voluptate alias omnis facere dolor beatae, voluptatibus dolores fuga voluptatum officia ratione.
            <br>
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Non, sunt? Odit error corrupti magni aliquam nostrum illo officiis! Voluptate alias omnis facere dolor beatae, voluptatibus dolores fuga voluptatum officia ratione.
        </p>

      </div>
    </div>
  </div>
</div>

<!-- footer -->

<div class="py-5 bg-dark">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <h4 class="text-white">Uni-Cart</h4>
        <div class="underline mb-2"></div>
        <a href="index.php" class="text-white"><i class="fa fa-angle-right"></i> Home </a> <br>
        <a href="#" class="text-white"><i class="fa fa-angle-right"></i> About Us </a> <br>
        <a href="cart.php" class="text-white"><i class="fa fa-angle-right"></i> My Cart </a> <br> 
        <a href="categories.php" class="text-white"><i class="fa fa-angle-right"></i> Our Collection </a> <br>
      </div>
      <div class="col-md-3">
        <h4 class="text-white">Address</h4>
        <div class="underline mb-2"></div>
        <p class="text-white">
          #24, Ground Floor,
          Route no 12, Tarkeshwor,
          Kathmandu, Nepal.
        </p>
         <a href="tel:+9779742871011" class="text-white"><i class="fa fa-phone"></i> +977 9742871011 </a> <br>
         <a href="mailto:unicart@gmail.com" class="text-white"><i class="fa fa-envelope"> </i> unicart@gmail.com </a>
      </div>
      <div class="col-md-6">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3530.463471144951!2d85.30085047395886!3d27.764690122962786!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1f545d73b707%3A0x411114ff2e8fc562!2sPandey%20Grocery%20Store!5e0!3m2!1sen!2snp!4v1731918161586!5m2!1sen!2snp" class="w-100" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
  </div>
</div>

<div class="py-2 bg-danger">
  <div class="text-center">
    <p class="mb-0 text-white">All rights reserved. Copyright @ <a href="#" class="text-white">Uni-Cart </a> <?= date('Y') ?></p>
  </div>
</div>



<?php include('includes/footer.php'); ?>

<script>
  $(document).ready(function () {
    $('.owl-carousel').owlCarousel({
      loop: true,
      margin: 10,
      nav: true,
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 3
        },
        1000: {
          items: 4
        }
      }
    })
  });
</script>