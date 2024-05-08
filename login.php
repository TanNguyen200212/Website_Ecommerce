<?php require_once "inc/header.php" ?>
<?php require_once 'inc/nav.php' ?>



    <!-- <div class="container-xxl position-relative bg-white d-flex p-0"> -->
        <!-- Spinner Start -->
        <!-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> -->
        <!-- Spinner End -->


        <!-- Sign Up Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.php" class="">
                                <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>YAMI</h3>
                            </a>
                            <h3>Sign In</h3>
                        </div>
                        <div class="form-floating mb-3"  method ="POST">
                            <label for="floatingText">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="user@gmail.com">
                            
                        </div>
                        <div class="form-floating mb-4">
                            <label for="floatingPassword">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Password">
                            
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <a href="">Forgot Password</a>
                        </div>
                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4" id="btn_login">Sign In</button>
                        <p class="text-center mb-0">Already have an Account? <a href="register.php">Sign Up</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign Up End -->
    </div>


    <?php require_once 'inc/footer.php' ?>