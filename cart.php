<?php
session_start();
if (!isset($_SESSION['EMAIL_USER_LOGIN'])) {
	header("location:login.php");
}
?>
<?php
require_once 'inc/header.php' ?>
<?php require_once 'inc/nav_2.php' ?>




<!-- Page info -->
<div class="page-top-info">
	<div class="container">
		<!-- <h4>Your cart</h4> -->
		<div class="site-pagination">
			<a href="index.php">Home</a> /
			<a href="cart.php">Your cart</a>

		</div>
	</div>
</div>
<!-- Page info end -->

<!-- cart section end -->
<section class="cart-section spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="cart-table">
					<h3>Your Cart</h3>
					<div class="cart-table-warp">

						<?php if (isset($_SESSION['CART']) && count($_SESSION['CART']) > 0) : ?>
							<table>
								<thead>
									<tr>
										<th class="product-th">Product</th>
										<th class="quy-th">Quantity</th>
										<th class="total-th">Price</th>
										<th class="total-th">SubTotal</th>
										<th class="total-th">Opeartions</th>

									</tr>
								</thead>
								<?php
								$total = 0;
								foreach ($_SESSION['CART'] as $pid => $item) :

									$subtotal = $item['PRICE'] * $item['QTY'];
									$total += $subtotal;
								?>
									<tr>
										<td><?php echo htmlspecialchars($item['NAME']); ?></td>
										<td><?php echo htmlspecialchars($item['QTY']); ?></td>
										<td>$<?php echo number_format($item['PRICE'], 2); ?></td>
										<td>$<?php echo number_format($subtotal, 2); ?> </td>
										<td>
											<button class="btn btn-warning">Update</button>
											<a href='./del_cart1.php' class="btn btn-danger">Delete</a>
										</td>
										<!-- </td> -->




									</tr>
								<?php endforeach; ?>
								<tr>
									<td colspan="3">Total </td>
									<td>$<?php echo number_format($total, 2); ?></td>
								</tr>
							</table>
						<?php else : ?>
							<p>Giỏ hàng của bạn đang trống.</p>
						<?php endif; ?>
					</div>
					<!-- <div class="total-cost">
							<h6>Total <span>$99.90</span></h6>
						</div> -->
				</div>
			</div>
			<div class="col-lg-4 card-right">
				<form class="promo-code-form">
					<a href='./del_cart.php' class="site-btn btn btn-danger">Delete</a>

				</form>

				<a href="checkout.php" class="site-btn">Proceed to checkout</a>
				<!-- <center><button class="codepro-custom-btn codepro-btn-6" target="blank" title="Code Pro" onclick="window.open('checkout.php')"><span>Proceed to checkout </span></button></center> -->
				<a href="index.php" class="site-btn sb-dark">Continue shopping</a>
			</div>
		</div>
	</div>
</section>
<!-- cart section end -->


</div>
</div>
</section>
<!-- Related product section end -->


<?php require_once 'inc/footer.php' ?>