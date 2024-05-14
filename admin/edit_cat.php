<?php require_once 'inc/header.php';

// if(isset($GET['id'])&& $_GET['id'] !=""){
//     $id= safe_value($con,$_GET['id']);
//     $sql ="SELECT *FROM categories WHERE id ='$id' ";
//     $result =mysqli_query($con,$sql);

//     while ($row =mysqli_fetch_assoc($result)){
//         $id =$row['id'];
//         $cat_name =$row['cat_name'];
//     }

// }


if(isset($_GET['id']) && $_GET['id']!="")
{
    $id = safe_value($con,$_GET['id']);
    $sql = "SELECT * FROM categories WHERE id='$id' ";
    $result = mysqli_query($con,$sql);

    while($row = mysqli_fetch_assoc($result))
    {
        $id = $row['id'];
        $cat_name = $row['cat_name'];
    }
}
?>
<?php require_once 'inc/nav.php'; ?>

<!-- Content Start -->
<div class="content">


    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">

            <div class="col-sm-12 col-xl-6">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Edit Category Name </h6>

                    <?php
                            update_cat();
                            display_message();
                            ?>
                    <form method="post">
                        <div class="row mb-3">
                            <label for="inputname3" class="col-sm-2 col-form-label">Category Name</label>

                            <div class="col-sm-10">

                                <input type="text" class="form-control" id="inputname3" name="category_up"
                                    value=" <?php echo $cat_name ?>">
                                <input type="hidden" name="cat_id" value="<?php echo $id?>">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-info" name="cat_btn_up">Submit</button>


                </div>

            </div>

        </div>
    </div>
    <!-- Form End -->



    <?php 
//  require_once 'inc/footer.php';
?>
    <?php require_once 'inc/footer.php'; ?>