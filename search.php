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
            <a href="search.php">Search Result </a>
        </div>
    </div>
</div>
<!-- Category section -->

<!-- phantrang -->
<?php
    if (isset($_GET['keyword'])) {
        $keyword = $_GET['keyword'];
        $page = "/Github/WEB2_Ecommerce/search.php?";
        $key="keyword";
        $value=$keyword;
        // Kết nối đến cơ sở dữ liệu
        include './functions/db.php';
        $item_per_page = 6;
        $current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
        $offset = ($current_page - 1) * $item_per_page;
        
        
        //$totalRecords = mysqli_query($con, "SELECT *from `products`");
        
        // Chuẩn bị truy vấn SQL
        // $stmt = $con->prepare("SELECT COUNT(*) FROM products WHERE product_name LIKE ?");
        
        // $search = "%" . $keyword . "%";
        // $stmt->bind_param("s", $search);
        // $stmt->execute();
        // $result = $stmt->get_result();
        // $totalRecords = $result->num_rows;
        
        // $stmt = $con->prepare("SELECT * FROM products WHERE product_name LIKE ? LIMIT ? OFFSET ?");
        // $stmt->bind_param("sii",$search, $item_per_page,$offset);
        // $stmt->execute();
        // $result = $stmt->get_result();
        // $totalPages = ceil($totalRecords / $item_per_page);
        // echo $totalPages;

        $total_query = "SELECT COUNT(*) FROM products WHERE product_name LIKE ?";
        $stmt_total = $con->prepare($total_query);
        $search = "%" . $keyword . "%";
        $stmt_total->bind_param("s", $search);
        $stmt_total->execute();
        $total_result = $stmt_total->get_result();
        $totalRecords = $total_result->fetch_row()[0]; // Get the first column value (count)
        $stmt_total->close(); // Close the statement for first query
    
        // Prepare search query with pagination
        $query = "SELECT * FROM products WHERE product_name LIKE ? LIMIT " . $item_per_page ." OFFSET " . $offset;
        $stmt = $con->prepare($query);
        $search = "%" . $keyword . "%";
        $stmt->bind_param("s", $search);
        $stmt->execute();
        $result = $stmt->get_result();
    
        $totalPages = ceil($totalRecords / $item_per_page);
    }
    ?>
<section class="category-section spad">
    <div class="container">
        <div class="row">

            <div class="col-lg-12  order-1 order-lg-2 mb-5 mb-lg-0">
                <div class="row">
                    <?php
                    if ($result->num_rows > 0) {
                       
                        while ($row = $result->fetch_assoc()) {
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
    <?php include 'pagination.php';
 
    ?>



</section>

<?php   // Đóng kết nối
        $stmt->close();
        $con->close();?>

<?php require_once 'inc/footer.php' ?>