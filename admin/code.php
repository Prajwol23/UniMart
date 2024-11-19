<?php
include('../config/dbcon.php');
include('../functions/myfunctions.php');

//for adding category into database
if (isset($_POST['add_category_btn']))
 {
  $name = mysqli_real_escape_string($con, $_POST['name']);
  $slug = mysqli_real_escape_string($con, $_POST['slug']);
  $description = mysqli_real_escape_string($con, $_POST['description']);
  $meta_title = mysqli_real_escape_string($con, $_POST['meta_title']);
  $meta_description = mysqli_real_escape_string($con, $_POST['meta_description']);
  $meta_keywords = mysqli_real_escape_string($con, $_POST['meta_keywords']);  
  $status = isset($_POST['status']) ? '1' : '0';
  $popular = isset($_POST['popular']) ? '1' : '0';

  //how to fetch image
  $image = $_FILES['image']['name']; //in $_FILES['image']['name'], image is the name = "image" and name is the name of the image

  $path = "../uploads";

  $image_ext = pathinfo($image, PATHINFO_EXTENSION);
  $filename = time().'.'.$image_ext;

  $cate_query = "INSERT INTO categories (name,slug,description,meta_title,meta_description,meta_keywords,status,popular,image)
                   VALUES ('$name','$slug','$description','$meta_title','$meta_description','$meta_keywords','$status','$popular','$filename')";

  $cate_query_run = mysqli_query($con, $cate_query);

  if ($cate_query_run) {
    move_uploaded_file($_FILES["image"]["tmp_name"], $path .'/'.$filename);
    redirect("add-category.php", "Category added successfully.");
  } else {
    redirect("add-category.php", "Something Went Wrong.");
  }
 } 

//for updating category in database

else if(isset($_POST['update_category_btn']))
{
  $category_id = mysqli_real_escape_string($con, $_POST['category_id']);
  $name = mysqli_real_escape_string($con, $_POST['name']);
  $slug = mysqli_real_escape_string($con, $_POST['slug']);
  $description = mysqli_real_escape_string($con, $_POST['description']);
  $meta_title = mysqli_real_escape_string($con, $_POST['meta_title']);
  $meta_description = mysqli_real_escape_string($con, $_POST['meta_description']);
  $meta_keywords = mysqli_real_escape_string($con, $_POST['meta_keywords']);  
  $status = isset($_POST['status']) ? '1' : '0';
  $popular = isset($_POST['popular']) ? '1' : '0';

  //how to fetch image
  $new_image = $_FILES['image']['name']; 
  $old_image = $_POST['old_image']; 

  if($new_image != "")
  {
    // $update_filename = $new_image; 
    $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
    $update_filename = time().'.'.$image_ext;
  
  }
  else{
    $update_filename = $old_image;
  }

  $path = "../uploads";

  $update_query = "UPDATE categories SET name='$name', slug='$slug', description='$description', meta_title='$meta_title',
                  meta_description='$meta_description', meta_keywords='$meta_keywords', status='$status', popular='$popular',
                  image='$update_filename' WHERE id='$category_id'";

  $update_query_run = mysqli_query($con, $update_query);

  if($update_query_run)
  {
   if($_FILES['image']['name'] != "")
   {
    move_uploaded_file($_FILES['image']['tmp_name'],$path.'/'.$update_filename);
    if(file_exists(("../uploads/".$old_image)))
      {
        unlink("../uploads/".$old_image);
      }
   }
   redirect("edit-category.php?id=$category_id","Category Updated Successfully");
  }

  else{
    redirect("edit-category.php?id=$category_id","Something Went Wrong.");
  }
}

//for deleting category in database
else if(isset($_POST['delete_category_btn']))
{
$category_id = mysqli_real_escape_string($con, $_POST['category_id']);

$category_query = "SELECT * FROM categories WHERE id='$category_id'";

$category_query_run = mysqli_query($con, $category_query);

$category_data = mysqli_fetch_array($category_query_run);

$image = $category_data["image"];

$delete_query = "DELETE FROM categories WHERE id='$category_id'";

$delete_query_run = mysqli_query($con, $delete_query);

if($delete_query_run){
  if(file_exists(("../uploads/".$image)))
      {
        unlink("../uploads/".$image);
      }

  // redirect("category.php","Category Deleted Successfully.");
  echo 200;

}
else{
  // redirect("category.php","Something Went Wrong.");
  echo 500;
}
}

// product starts
//for adding product to database
else if(isset($_POST['add_product_btn']))
{
  $category_id = mysqli_real_escape_string($con, $_POST['category_id']);
  $name = mysqli_real_escape_string($con, $_POST['name']);
  $slug = mysqli_real_escape_string($con, $_POST['slug']);
  $small_description = mysqli_real_escape_string($con, $_POST['small_description']);
  $description = mysqli_real_escape_string($con, $_POST['description']);
  $orginal_price = mysqli_real_escape_string($con, $_POST['orginal_price']);
  $selling_price = mysqli_real_escape_string($con, $_POST['selling_price']);
  $qty = mysqli_real_escape_string($con, $_POST['qty']);
  $meta_title = mysqli_real_escape_string($con, $_POST['meta_title']);
  $meta_description = mysqli_real_escape_string($con, $_POST['meta_description']);
  $meta_keywords = mysqli_real_escape_string($con, $_POST['meta_keywords']);  
  $status = isset($_POST['status']) ? '1' : '0';
  $trending = isset($_POST['trending']) ? '1' : '0';

  //how to fetch image
  $image = $_FILES['image']['name'];
  $path = "../uploads";

  $image_ext = pathinfo($image, PATHINFO_EXTENSION);
  $filename = time().'.'.$image_ext;

  if($category_id == "default"){
    redirect("add-product.php", "Category is mandatory.");
    exit(0);
  }

  $product_query = "INSERT INTO products (category_id,name,slug,small_description,description,orginal_price,selling_price,
                    image,qty,status,trending,meta_title,meta_keywords,meta_description)
                    VALUES ('$category_id','$name','$slug','$small_description','$description','$orginal_price','$selling_price',
                    '$filename','$qty','$status','$trending','$meta_title','$meta_keywords','$meta_description')";

$product_query_run = mysqli_query($con, $product_query);

if($product_query_run)
{
  move_uploaded_file($_FILES["image"]["tmp_name"], $path .'/'.$filename);
    redirect("add-product.php", "Product added successfully.");
}
else{
  redirect("add-product.php", "Something went wrong.");

}
}

//for updating product in database
else if(isset($_POST['update_product_btn']))
{
  $product_id = mysqli_real_escape_string($con, $_POST['product_id']);
  $category_id = mysqli_real_escape_string($con, $_POST['category_id']);
  $name = mysqli_real_escape_string($con, $_POST['name']);
  $slug = mysqli_real_escape_string($con, $_POST['slug']);
  $small_description = mysqli_real_escape_string($con, $_POST['small_description']);
  $description = mysqli_real_escape_string($con, $_POST['description']);
  $orginal_price = mysqli_real_escape_string($con, $_POST['orginal_price']);
  $selling_price = mysqli_real_escape_string($con, $_POST['selling_price']);
  $qty = mysqli_real_escape_string($con, $_POST['qty']);
  $meta_title = mysqli_real_escape_string($con, $_POST['meta_title']);
  $meta_description = mysqli_real_escape_string($con, $_POST['meta_description']);
  $meta_keywords = mysqli_real_escape_string($con, $_POST['meta_keywords']);  
  $status = isset($_POST['status']) ? '1' : '0';
  $trending = isset($_POST['trending']) ? '1' : '0';

  //how to fetch image
  $image = $_FILES['image']['name'];
  $path = "../uploads";

  $new_image = $_FILES['image']['name']; 
  $old_image = $_POST['old_image']; 

  if($new_image != "")
  {
    // $update_filename = $new_image; 
    $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
    $update_filename = time().'.'.$image_ext;
  
  }
  else
  {
    $update_filename = $old_image;
  }

  

  $update_product_query = "UPDATE products SET category_id ='$category_id', name='$name', slug='$slug', small_description='$small_description',
                          description='$description', orginal_price='$orginal_price', selling_price='$selling_price', qty='$qty',
                          meta_title='$meta_title', meta_description='$meta_description', meta_keywords='$meta_keywords', status='$status',
                          trending='$trending', image='$update_filename' WHERE id='$product_id'";

  $update_product_query_run = mysqli_query($con, $update_product_query);

  if($update_product_query_run)
  {
   if($_FILES['image']['name'] != "")
   {
    move_uploaded_file($_FILES['image']['tmp_name'],$path.'/'.$update_filename);
    if(file_exists(("../uploads/".$old_image)))
      {
        unlink("../uploads/".$old_image);
      }
   }
   redirect("edit-product.php?id=$product_id","Product Updated Successfully");
  }

  else{
    redirect("edit-product.php?id=$product_id","Something Went Wrong.");
  }
  
}

//for deleting product in database
else if(isset($_POST['delete_product_btn']))
{
$product_id = mysqli_real_escape_string($con, $_POST['product_id']);

$product_query = "SELECT * FROM products WHERE id='$product_id'";

$product_query_run = mysqli_query($con, $product_query);

$product_data = mysqli_fetch_array($product_query_run);

$image = $product_data["image"];

$delete_query = "DELETE FROM products WHERE id='$product_id'";

$delete_query_run = mysqli_query($con, $delete_query);

if($delete_query_run){
  if(file_exists(("../uploads/".$image)))
      {
        unlink("../uploads/".$image);
      }

  // redirect("products.php","Product Deleted Successfully.");
  echo 200; //ajax call of success

}
else{
  // redirect("products.php","Something Went Wrong.");
  echo 500; //ajax call for something went wrong
}
}

//to update status
else if(isset($_POST['update_order_btn']))
{
 $track_no = $_POST['tracking_no'];
 $order_status = $_POST['order_status'];

 $updateOrder_query = "UPDATE orders SET status = '$order_status' WHERE tracking_no = '$track_no' ";

 $updateOrder_query_run = mysqli_query($con, $updateOrder_query); 

 redirect("view-order.php?tracking_no=$track_no", "Order status updated successfully.");


}

else
{
  header("Location: ../index.php");
}
?>
