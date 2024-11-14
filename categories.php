<?php
include('functions/userfunctions.php'); 
include('includes/header.php'); 
?>

<div class="py-3 bg-primary">
     <div class="container">
        <h6 class="text-white">Home / Collections</h6>
     </div>
</div>

<div class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
       
        <h1>Our Collections</h1>
        <hr>
        <div class="row">
        <?php 
        $categories = getAllActive("categories");

        if(mysqli_num_rows($categories) > 0)
        {
          foreach($categories as $item){
             ?>
                <div class="col-md-3 mb-2">
                  <a href="products.php?category=<?= $item['slug']; ?>"> <!-- this products.php is separate for usser display only -->
                    <div class="card shadow">
                        <div class="card-body">
                             <img src="uploads/<?= $item['image']; ?>" alt="Category Image" class="w-100" style="height: 200px; object-fit: cover;">
                             <h4 class="text-center"><?= $item['name']; ?></h4>
                        </div>
                    </div>
                    </a>
                </div>
             <?php
          }
        }
        else
        {
            echo "No Categories available";
        }
        ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include('includes/footer.php'); ?>