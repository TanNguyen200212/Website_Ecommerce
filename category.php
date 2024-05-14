<?php require_once 'inc/header.php' ?>
<?php require_once 'inc/nav.php';  ?>
<?php
$cat_id = "";
if (isset($_GET['id'])) {
    $cat_id = mysqli_real_escape_string($con, $_GET['id']);
}
$particular_product = get_products($cat_id);
$display_cat_links = display_cat_links($cat_id);
$cont = mysqli_num_rows($particular_product);
$result = mysqli_fetch_assoc($display_cat_links);

?>

<!-- page info -->
<div class="page-top-info">
    <div class="container">
        <!-- <h4>Category Page</h4> -->
        <div class="site-pagination">
            <a href="category.php">Home /</a>
            <!-- <a href="category.php"><?php echo $result['category_name'] ?></a> -->
        </div>
    </div>
</div>
<!-- Category section -->

<!-- phantrang -->
<?php
include './functions/db.php';
//$item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 6;
$item_per_page = 6;
$current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
$offset = ($current_page - 1) * $item_per_page;
// echo "Offset: " . $offset;
// echo "Page: " .$current_page;
// echo "Item per page: ". $item_per_page;
$products = mysqli_query($con, "SELECT * FROM `products` WHERE category_name = '$cat_id'  ORDER BY p_id ASC LIMIT " . $item_per_page . " OFFSET " . $offset);

$totalRecords = mysqli_query($con, "SELECT *from `products`");
$totalRecords = $totalRecords->num_rows;
$totalPages = ceil($totalRecords / $item_per_page);




?>
<section class="category-section spad">
    <div class="container">
        <div class="row">

            <div class="col-lg-12  order-1 order-lg-2 mb-5 mb-lg-0">
                <div class="row">
                    <?php
                    if (mysqli_num_rows($products)) {

                        while ($row = mysqli_fetch_assoc($products)) {
                    ?>
                    <!-- <?php
                        //ttttwhile ($row = mysqli_fetch_array($products)) {
                            ?> -->
                    <div class="col-lg-4 col-sm-6">


                        <div class="product-item">
                            <div class="pi-pic">
                                <a href="product.php?p_id=<?php echo $row['p_id'] ?>">
                                    <img src="admin/img/<?php echo $row['img'] ?>" alt=""></a>
                                <div class="pi-links">
                                    <a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO
                                            CART</span></a>
                                    <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>



                                </div>
                            </div>
                            <div class="pi-text">

                                <h6>$<?php echo $row['price'] ?></h6>
                                <p><?php echo $row['product_name'] ?></p>

                            </div>
                        </div>

                    </div>
                    <?php } ?>
                    <?php
                        }
                    //}


                    ?>
                </div>

            </div>

        </div>
    </div>



    <!-- phantrang -->
    <?php include 'pagination.php' ?>



</section>
<!-- Category section end -->


<?php require_once 'inc/footer.php' ?>