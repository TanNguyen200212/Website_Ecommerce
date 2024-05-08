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

?>

	<!-- page info -->
<!-- <div class="page-top-info">
		<div class="container">
			<h4>Category Page</h4>
			<div class="site-pagination">
				<a href="category.php">Home</a> 
				
				<a href=""><?php echo $result['cat_name']?></a>

			</div>
		</div>
	</div> -->
<!-- Category section -->
<section class="category-section spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-12  order-1 order-lg-2 mb-5 mb-lg-0">
				<div class="row">
					<?php
				if(mysqli_num_rows($particular_product)){
				
					while ($row = mysqli_fetch_assoc($particular_product)) 
					{
					?>

						<div class="col-lg-4 col-sm-6">
							<div class="product-item">
								<div class="pi-pic">
								<a href ="product.php?p_id=<?php $row['p_id']?>"><img src="admin/img/<?php echo $row['img'] ?>" alt=""></a>
									<div class="pi-links">
										<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
										<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
									</div>
								</div>
								<div class="pi-text">
									<h6><?php echo $row['price'] ?></h6>
									<p><?php echo $row['description'] ?></p>
								</div>
							</div>
						</div>
					<?php		
				}
}
?>
					<div class="text-center w-100 pt-3">
						<button class="site-btn sb-line sb-dark">LOAD MORE</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Category section end -->


<?php require_once 'inc/footer.php' ?>