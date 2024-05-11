<?php require_once 'inc/header.php'; 
    $cat=view_cat();
?>
<?php
    require_once 'inc/nav.php'; 

?>

        <!-- Content Start -->
        <div class="content">


            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Product </h6>
                        
                            <form method="post" class="row mb-3" enctype="multipart/form-data">
                            <div >
                                    <label for="inputname3" class="col-sm-2 col-form-label">Add Product</label>
                                    <?php 
                                    save_products();
                                    display_message();
                                    ?>
                                    <div class="form-group row">
                                        <!-- <input type="name" class="form-control" id="inputname3" name="product"> -->
                                    

                                    <div class="col-sm-10">
                                        <select name="cat_id" id="" class="form-control">
                                            <option value="">Select Category</option>
                                            <?php
                                            while($row=mysqli_fetch_assoc($cat))
                                            {
                                                ?>
                                                <option value="<?php echo $row['id'] ?>"><?php echo $row['cat_name']?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    </div>

                                    <div class="form-group row ">
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="product_name" placeholder="Product Name">
                                    </div>
                                    </div>
                                    <div class="form-group row ">
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="mrp" placeholder="MRP">
                                    </div>
                                    </div>
                                    <div class="form-group row ">
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="price" placeholder="Price">
                                    </div>
                                    </div>
                                    <div class="form-group row ">
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="qty" placeholder="Qty">
                                    </div>
                                    </div>
                                    <div class="form-group row ">
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" name="img">
                                    </div>
                                    </div>
                                    <div class="form-group row ">
                                    <div class="col-sm-10">
                                        <textarea id="" cols="30" rows="10" class="form-control" placeholder="Product Description " name="desc"></textarea>
                                    </div>
                                    </div>
                                    <button  class="btn btn-info my-4 mx-4" type="submit" name="pro_btn">Submit</button>
                                    </form>
                                </div>
                                
                        
                        </div>
                
                    </div>
                </div>
            </div>
            <!-- Form End -->



<?php 
require_once 'inc/footer.php';
?> 