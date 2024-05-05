<?php 
	require_once 'functions/functions.php';
	$cat =display_cat();

?>


<!-- Page Preloder -->
<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section -->
	<header class="header-section">
		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 text-center text-lg-left">
						<!-- logo -->
						<a href="index.php" class="site-logo">
							<img src="./img/logo.png" alt="">
						</a>
					</div>
					<div class="col-xl-6 col-lg-5">
						<form class="header-search-form">
							<input type="text" placeholder="Search on divisima ....">
							<button><i class="flaticon-search"></i></button>
						</form>
					</div>
					<div class="col-xl-4 col-lg-5">
						<div class="user-panel">
							<div class="up-item">
								<i class="flaticon-profile"></i>
								<a href="login.php">Sign In </a> or <a href="register.php">Create Account</a>
							</div>
							<div class="up-item">
								<div class="shopping-card">
									<i class="flaticon-bag"></i>
									<span>0</span>
								</div>
								<a href="cart.php">Shopping Cart</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<nav class="main-navbar">
			<div class="container">
				<!-- menu -->
				<ul class="main-menu">
				<li><a href="index.php">Home</a></li>
				<?php 
				while($row = mysqli_fetch_assoc($cat))
				{
					?>
					<li><a href  ="category.php"><?php echo  $row ['cat_name']?></a></li>
					<?php 
					}
					?> 
				<li><a href="./contact.php">Contact </a></li>

				</ul>
			
				
				
				
			</div>
		</nav>
	</header>
	<!-- Header section end -->

