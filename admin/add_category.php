<?php require_once 'inc/header.php'; ?>
<?php require_once 'inc/nav.php'; ?>

<!-- Content Start -->
<div class="content">


    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">

            <div class="col-sm-12 col-xl-6">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Add Category </h6>

                    <form method="post">
                        <div class="row mb-3">
                            <label for="inputname3" class="col-sm-2 col-form-label">Category Name</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="inputname3" name="category">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary" name="cat_btn">Submit</button>


                </div>
                <?php   add_category(); 
                                display_message();
                        ?>
            </div>

        </div>
    </div>
    <!-- Form End -->



<<<<<<< HEAD
    <?php require_once 'inc/footer.php'; ?>
=======
<?php 
require_once 'inc/footer.php';
?> 
>>>>>>> 8061c79ffd651c8bb09d11623ba5e69cba4c3cf2
