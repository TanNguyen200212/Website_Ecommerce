<?php require_once 'inc/header.php'; 
require_once './functions/db.php';
?>
<?php require_once 'inc/nav.php' ;

$cart = [];
if (isset($_SESSION['CART'])) {
    $cart = $_SESSION['CART'];
}
?>

	<!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<!-- <h4>Checkout</h4> -->
			<div class="site-pagination">
				<a href="">Home/ </a>
				<a href="">Your cart</a>
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- checkout section  -->
	<section class="checkout-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 order-2 order-lg-1">
					<form class="checkout-form">
						<div class="cf-title">Billing Address</div>
						<div class="row">
							<div class="col-md-7">
								<p>*Billing Information</p>
							</div>
							<div class="col-md-5">
								<div class="cf-radio-btns address-rb">
									<div class="cfr-item">
										<input type="radio" name="pm" id="one">
										<label for="one">Use my regular address</label>
									</div>
									<div class="cfr-item">
										<input type="radio" name="pm" id="two">
										<label for="two">Use a different address</label>
									</div>
								</div>
							</div>
						</div>
						<div class="row address-inputs">
							<div class="col-md-12">
								<input type="text" placeholder="Address">
								<input type="text" placeholder="Address line 2">
								<input type="text" placeholder="Country">
							</div>
							<div class="col-md-6">
								<input type="text" placeholder="Zip code">
							</div>
							<div class="col-md-6">
								<input type="text" placeholder="Phone no.">
							</div>
						</div>
						<!-- <div class="cf-title">Delievery Info</div>
						<div class="row shipping-btns">
							<div class="col-6">
								<h4>Standard</h4>
							</div>
							<div class="col-6">
								<div class="cf-radio-btns">
									<div class="cfr-item">
										<input type="radio" name="shipping" id="ship-1">
										<label for="ship-1">Free</label>
									</div>
								</div>
							</div>
							<div class="col-6">
								<h4>Next day delievery  </h4>
							</div>
							<div class="col-6">
								<div class="cf-radio-btns">
									<div class="cfr-item">
										<input type="radio" name="shipping" id="ship-2">
										<label for="ship-2">$3.45</label>
									</div>
								</div>
							</div>
						</div> -->
						<div class="cf-title">Payment</div>
						<ul class="payment-list">
							<li>Paypal<a href="#"><img src="img/paypal.png" alt=""></a></li>
							<li>Credit / Debit card<a href="#"><img src="img/mastercart.png" alt=""></a></li>
							<li>Pay when you get the package</li>
						</ul>
						<button class="site-btn submit-order-btn">Place Order</button>
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
								<p>$<?php echo number_format($item['PRICE'], 2); ?></p>
							</li>
							
						</ul>
						<?php endforeach; ?>
						<ul class="price-list">
						
						<li>Total<span>$<?php echo number_format($total,2);?></span></li>
						<li>Shipping<span>free</span></li>
						<li class="total">Total<span>$<?php echo number_format($total,2);?></span></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- checkout section end -->

	<?php require_once 'inc/footer.php' ?>
