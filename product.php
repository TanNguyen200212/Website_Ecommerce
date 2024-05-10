<?php require_once 'inc/header.php' ?>
<?php require_once 'inc/nav.php' ;?>

<?php

$product_id = "";
if (isset($_GET['p_id'])) {
	$product_id = $_GET['p_id'];			
}

$products = get_products('', $product_id);
$result = mysqli_fetch_assoc($products);

// var_dump($result);
?>

	<script>
	function updateQdt(obj){
		document.getElementById("qdt").setAttribute('value',obj.value);
		console.log(document.getElementById("qdt").value);
	}

	</script>

	<!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<!-- <h4>Category PAge</h4> -->
				<ul class="breadcrumbs-custom-path">
			<a href="index.php">Home</a>
			<a href="category.php"><?php echo $result['category_name'] ?></a>
			<a class="active"><?php echo $result['product_name'] ?></a>
		</ul>
		</div>
	</div>
	<!-- Page info end -->


	<!-- product section -->
	<section class="product-section">
		<div class="container">
			<div class="back-link">
				<a href="category.php"> &lt;&lt; Back to Category</a>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="product-pic-zoom">
					<img class="product-big-img" src="admin/img/<?php echo $result['img'] ?>" >
					
					</div>
				</div>
				<div class="col-lg-6 product-details">
					<h2 class="p-title"><?php echo $result['product_name']?></h2>
					<!-- <h3 class="p-price">$39.90</h3> -->
					<h4><span>MRP : </span><del style="color: #ff0000;">$<?php echo $result['MRP']?></del></h4>
					<h4><span>Price : </span>$<?php echo $result['price']?></h4>

					<h4 class="p-stock">Available: <span>In Stock</span></h4>
					<div class="p-rating">
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o fa-fade"></i>
					</div>
				
					<div class="p-review">
						<a href="">3 reviews</a>|<a href="">Add your review</a>
					</div>
					<div class="quantity">
						<p>Quantity</p>
                        <div class="pro-qty">
							<form action="car" method="post ">
						<input type="text" value="1" id="qty" value="<?php echo $result['qty']?>">
						</div>
					</div>
							<button type="button" id="p_id" value ="<?php echo $result['p_id']?>" class="site-btn"> Add to Cart</button>
					</form>

					
					<!-- <a href="#" class="site-btn">SHOP NOW</a> -->
					<div id="accordion" class="accordion-area">
						<div class="panel">
							<div class="panel-header" id="headingOne">
								<button class="panel-link active" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">information</button>
							</div>
							<div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
								<div class="panel-body">
								<p><?php echo $result['description']?></p>
								</div>
							</div>
						</div>
						<div class="panel">
							<div class="panel-header" id="headingTwo">
								<button class="panel-link" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">care details </button>
							</div>
							<div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
								<div class="panel-body">
									<img src="./img/cards.png" alt="">
								</div>
							</div>
						</div>
				
						<!-- <div class="panel">
							<div class="panel-header" id="headingThree">
								<button class="panel-link" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">shipping & Returns</button>
							</div>
						
						</div> -->
					</div>
					<div class="social-sharing">
						<a href=""><i class="fa fa-google-plus"></i></a>
						<a href=""><i class="fa fa-pinterest"></i></a>
						<a href=""><i class="fa fa-facebook"></i></a>
						<a href=""><i class="fa fa-twitter"></i></a>
						<a href=""><i class="fa fa-youtube"></i></a>
					</div>
				</div>
			</div>
		</div>
	
	</section>
	<!-- product section end -->


	<!-- RELATED PRODUCTS section -->

	<!-- RELATED PRODUCTS section end -->


<?php require_once 'inc/footer.php' ?>
