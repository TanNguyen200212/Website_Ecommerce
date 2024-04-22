<!-- header -->
<?php  require_once 'function/config.php'?>

<?php require_once 'inc/header.php' ?>



<div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="dashboard.php" class="">
                                <h3 class="text-primary"></i>YAMI</h3>
                            </a>
                            <?php 
                        login_system();
                        display_message();  
                        ?>
                            <h3>Sign In</h3>
                    
                        </div>
                    
                        <form  method="POST">
                        <div class="form-floating mb-3">            
                            <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="username">
                            <label for="floatingInput">Username </label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <a href="">Forgot Password</a>
                        </div>

                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4" name="btn_signin" >Sign In</button>

                        
                        <p class="text-center mb-0">Don't have an Account? <a href="">Sign Up</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>


		if(isset($_POST["signin"])){
			$tk = $_POST["user_name_lg"];
			$mk = md5($_POST["passlg"]);
			$rows = mysqli_query($connect,"
				select * from user where user_name = '$tk' and password = '$mk'
			");
			$count = mysqli_num_rows($rows);
			if($count==1){
				$_SESSION["loged"] = true;
				header("location:index.php");
				setcookie("success", "Đăng nhập thành công!", time()+1, "/","", 0);
			}
			else{
				header("location:index.php");
				setcookie("error", "Đăng nhập không thành công!", time()+1, "/","", 0);
			}
			
		}
	?>

<!-- footer -->
<?php require_once 'inc/footer.php' ?>