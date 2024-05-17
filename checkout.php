<?php require_once 'inc/header.php'; 
require_once './functions/db.php';
?>
<?php require_once 'inc/nav.php' ;

$cart = [];
if (isset($_SESSION['CART'])) {
    $cart = $_SESSION['CART'];

	$user_id = $_SESSION['USER_ID'];

	$query ="select * from user_register where id = '$user_id'";
    $result = mysqli_query($con,$query);
	$row= mysqli_fetch_assoc($result);

}
?>

	<!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<!-- <h4>Checkout</h4> -->
			<div class="site-pagination">
				<a href="">Home/ </a>
				<a href="">Checkout</a>
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- checkout section  -->
	<section class="checkout-section spad">
		<div class="container">	
			<div class="row">
				<div class="col-lg-8 order-2 order-lg-1">
				<!-- action="order.php"   -->
					<form  action="order.php" class="checkout-form" method="post">
						<div class="cf-title">Billing Address</div>
						<div class="row">
							<div class="col-md-7">
								<p>*Billing Information</p>
							</div>
							<div class="col-md-5">
						
							</div>
						</div>
						<div class="row address-inputs">
							<div class="col-md-12">
								<input type="text" placeholder="Full Name" value="<?php echo $row['name']?>">
								<input type="text" placeholder="Address" value="<?php echo $row['address']?>">
							</div>
							<div class="col-md-6">
								<input type="text" placeholder="Email" value="<?php echo $row['email']?>">
							</div>
							<div class="col-md-6">
								<input type="text" placeholder="Phone" value="<?php echo $row['phone_number']?>">
							</div>
						</div>
					
						<div class="cf-title">Payment</div>
						<ul class="payment-list">
									<div class="cf-radio-btns address-rb">
									<li><div class="cfr-item">
									
										<input type="radio" name="pm" id="one">
										<label for="one">Paypal</label>
									</div></li>
									<li><div class="cfr-item">
										<input type="radio" name="pm" id="two">
										<label for="two">Pay when you get the package</label>
									</div></li>
								</div>
						</ul>
						<button type="submit" class="site-btn submit-order-btn">Place Order</button>
					</form>
				</div>
				<div class="col-lg-4 order-1 order-lg-2">
					<div class="checkout-cart">
						<h3>Your Cart</h3>
						<?php
								$total = 0;
								foreach ($_SESSION['CART'] as $pid => $item) :
									
									$subtotal = $item['PRICE'] * $item['QTY'];
									$total += $subtotal;
								?>
							
						<ul class="product-list">
							<li>
								
								<h6><?php echo htmlspecialchars($item['NAME']); ?></h6>
								<p>
								$<?php echo number_format($item['PRICE'], 2);  ?>  x
								<?php echo htmlspecialchars($item['QTY']); ?>
								</p>
							</li>
							
						</ul>
						<?php endforeach; ?>
						<ul class="price-list">
						
						<li>Total<span>$<?php echo number_format($total,2);?></span></li>
						<li>Shipping<span>Free</span></li>
						<li class="total">Total<span>$<?php echo number_format($total,2);?></span></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		
	</section>
	<!-- unset ($_SESSION['CART']);
		header('location : ./thank');	 -->
	<!-- checkout section end -->

	<?php require_once 'inc/footer.php' ?>



	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function create_order() {
        $(document).on('click', '.submit-order-btn', function() {
            $.ajax({
                url: 'ajax/create_order.php',
                method: 'post',
                success: function(response) {
                  
                },
                error: function(xhr, status, error) {
                    console.error(err)
                }
            });
        });
    }

    // Call the function when the document is ready
    $(document).ready(function() {
        create_order();
    });
</script>