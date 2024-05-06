<?php require_once ("inc/header.php"); ?>
<?php
require_once ("inc/nav.php");

$cat=view_cat();
$edit_product = edit_record();

while($row=mysqli_fetch_assoc($edit_product))
{
    $product_id = $row['p_id'];
    $category_id = $row['category_name'];
    $product_name = $row['product_name'];
    $mrp = $row['MRP'];
    $price = $row['price'];
    $qty = $row['qty'];
    $img = $row['img'];
    $description = $row['description'];



}
?>
<div class="content-wrapper">
    <!-- START PAGE CONTENT-->

    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Product</div>
                <div class="ibox-tools">
                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                </div>
            </div>
            <div class="ibox-body">
                <form class="form-horizontal" id="form-sample-1" method="post" novalidate="novalidate" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Edit Product</label>
                        <?php
                        update_record();
                        ?>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <select name="cat_id" id="" class="form-control">
                                <option value="">select categories </option>
                                <?php

                                while($row = mysqli_fetch_assoc($cat))
                                {
                                    if($category_id==$row['id'])
                                    {
                                    ?>
                                    <option selected value="<?php echo $row['id'] ?>"><?php echo $row['cat_name'] ?></option>
                                    <?php
                                    }
                                    else
                                    {
                                        ?>
                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['cat_name'] ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input class="form-control" type="hidden" name="product_id" placeholder="Product_id" value="<?php echo $product_id ?>">
                            <input class="form-control" type="text" name="product_name" placeholder="Product_name" value="<?php echo $product_name ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="mrp" placeholder="MRP" value="<?php echo $mrp ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="price" placeholder="Price" value="<?php echo $price ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="qty" placeholder="Quantity" value="<?php echo $qty ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="file" class="form-control" type="text" name="img" value="<?php echo $img ?>">
                            <img src="img/<?php echo $img ?>" width="50px" height="50px" class="image-circle">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10">
                            <textarea id="" name="desc" cols="30" rows="10" class="form-control" placeholder="D" required><?php echo $description ?></textarea>
                        </div>
                    </div>
            </div>
            <button class="btn btn-info my-4 mx-4" type="submit" name="pro_btn_edit">Submit</button>
            </form>
        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <?php
                    display_message();
                    ?>
                </div>
            </div>
        </div>
    </div>

