    <?php require_once 'inc/header.php' ?>
    <?php require_once 'inc/nav.php';  ?>
    <?php
        $cat_id = "";
        if(isset($_GET['id']))
        {
            $cat_id = mysqli_real_escape_string($con,$_GET['id']);
        }
        $particular_product = get_products($cat_id);
        $display_cat_links = display_cat_links($cat_id);
        $cont = mysqli_num_rows($particular_product);
        $result = mysqli_fetch_assoc($display_cat_links);	



    //lay tu khoa tim kiem
    $keyword =$_GET['keyword'];
    ?>

    <!-- page info -->
    <div class="page-top-info">
        <div class="container">
            <!-- <h4>Category Page</h4> -->
            <div class="site-pagination">
                <a href="category.php">Home /</a>
                <a href="search.php">Search result  /</a>
            </div>
        </div>
    </div>


    
        <!-- Product Section End -->
    <?php require_once 'inc/footer.php' ?>