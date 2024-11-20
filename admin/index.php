<?php

include('../middleware/adminMiddleware.php'); 
include('includes/header.php'); 

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row mt-4">
                <div class="ms-3">
                    <h3 class="mb-0 h4 font-weight-bolder">Dashboard</h3>
                    <!-- <p class="mb-4">
            Check the sales, value and bounce rate by country.
          </p> -->
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-2 ps-3">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="text-sm mb-0 text-capitalize"><strong>Total Users</strong></p>
                                    <?php $noOfUsers = countItems("users","role_as") ?>
                                    <h4 class="mb-0"><?= $noOfUsers ?></h4>
                                </div>
                                <div
                                    class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                                    <i class="material-symbols-rounded opacity-10">account_circle</i>
                                </div>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-2 ps-3">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="text-sm mb-0 text-capitalize"><strong>Total Categories</strong></p>
                                    <?php $noOfCategories = countItems("categories","status") ?>
                                    <h4 class="mb-0"><?= $noOfCategories ?></h4>
                                </div>
                                <div
                                    class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                                    <i class="material-symbols-rounded opacity-10">collections</i>
                                </div>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-2 ps-3">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="text-sm mb-0 text-capitalize"><strong>Total Products</strong></p>
                                    <?php $noOfProducts = countItems("products","status") ?>
                                    <h4 class="mb-0"><?= $noOfProducts ?></h4>
                                </div>
                                <div
                                    class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                                    <i class="material-symbols-rounded opacity-10">storefront</i>
                                </div>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-2 ps-3">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="text-sm mb-0 text-capitalize"><strong>Total Order Pending</strong></p>
                                    <?php $noOfOrders = countItems("orders","status") ?>
                                    <h4 class="mb-0"><?= $noOfOrders ?></h4>
                                </div>
                                <div
                                    class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                                    <i class="material-symbols-rounded opacity-10">receipt_long</i>
                                </div>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                    </div>
                </div>
                 
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>