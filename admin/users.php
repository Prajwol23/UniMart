<?php
include('../middleware/adminMiddleware.php');
include('includes/header.php');

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4 class="text-white">Users
                    </h4>
                </div>
                <div class="card-body" id="">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Date of register</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $users = getAllUsers();

                            if (mysqli_num_rows($users) > 0) 
                            {
                                foreach ($users as $item) 
                                {
                                    ?>
                                    <tr>
                                        <td> <?= $item['id']; ?> </td>
                                        <td> <?= $item['name']; ?> </td>
                                        <td> <?= $item['phone']; ?> </td>
                                        <td> <?= $item['email']; ?> </td>
                                        <td> <?= $item['created_at']; ?> </td>
                                    </tr>

                                    <?php

                                }
                            } 
                            else 
                            {
                                ?>
                                <tr>
                                    <td colspan="5"> No Users has registered yet. </td>
                                   
                                </tr>

                                <?php
                            }
                            ?>

                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
