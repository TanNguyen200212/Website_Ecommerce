<?php require_once 'inc/header.php' ?>
<?php require_once 'inc/nav.php' ?>



        <!-- Sign Up Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.php" class="">
                                <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>YAMI</h3>
                            </a>
                            <h3>Sign Up</h3>
                        </div>
                        <div id="error"></div>
                        <div id="success"></div>
                        <div class="form-floating mb-3" method="POST">
						
                            <input type="text" class="form-control" id="name" placeholder="user">
                            <label for="floatingText">Username</label>
                            
                        </div>
                        <div class="form-floating mb-3">
						
                            <input type="email" class="form-control" id="email" placeholder="name@gmail.com">
                            <label for="floatingInput">Email address</label>
                            
                        </div>
                        <div class="form-floating mb-4">
						
                            <input type="password" class="form-control" id="password" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                            
                        </div>
						<div class="form-floating mb-5">
						
                            <input type="password" class="form-control" id="cpassword" placeholder="Password">
                            <label for="floatingPassword">Confirm Password</label>
                            
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            
                            </div>
                            <a href="">Forgot Password</a>
                        </div>
                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4" id="btn_register">Sign Up</button>
                        <p class="text-center mb-0">Already have an Account? <a href="login.php">Sign In</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign Up End -->
    </div>
	<?php require_once 'inc/footer.php' ?>