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
        // $keyword =$_GET['keyword'];
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


        <div class="ie-panel"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="assets/images/ie8-panel/warning_bar_0000_us.jpg" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
        <div class="preloader">
        <div class="preloader-body">
            <div class="cssload-bell">
            <div class="cssload-circle">
                <div class="cssload-inner0"></div>
            </div>
            <div class="cssload-circle">
                <div class="cssload-inner0"></div>
            </div>
            <div class="cssload-circle">
                <div class="cssload-inner0"></div>
            </div>
            <div class="cssload-circle">
                <div class="cssload-inner0"></div>
            </div>
            <div class="cssload-circle">
                <div class="cssload-inner0"></div>
            </div>
            </div>
        </div>
        </div>
        <div class="page">
        <!-- Page Header-->
        <header class="section page-header">
            <!-- RD Navbar-->
            <div class="rd-navbar-wrap">
            <nav class="rd-navbar rd-navbar-classic" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="100px" data-xl-stick-up-offset="100px" data-xxl-stick-up-offset="100px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
                <div class="rd-navbar-main-outer">
                <div class="rd-navbar-main">
                    <!-- RD Navbar Panel-->
                    <div class="rd-navbar-panel">
                    <!-- RD Navbar Toggle-->
                    <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                    <!-- RD Navbar Brand-->
                    <div class="rd-navbar-brand">
                        <!--Brand--><a class="brand" href="index.html"><img class="brand-logo-dark" src="assets/images/logo-default-1-242x53.png" alt="" width="242" height="53"/><img class="brand-logo-light" src="assets/images/logo-inverse-1-242x53.png" alt="" width="242" height="53"/></a>
                    </div>
                    </div>
                    <div class="rd-navbar-nav-wrap">
                    <ul class="rd-navbar-nav">
                        <li class="rd-nav-item"><a class="rd-nav-link" href="index.html">Home</a>
                        </li>
                        <li class="rd-nav-item"><a class="rd-nav-link" href="masonry-fullwidth-gallery.php">Gallery</a>
                        </li>
                        <li class="rd-nav-item"><a class="rd-nav-link" href="#">Pages</a>
                        <ul class="rd-menu rd-navbar-dropdown">
                            <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="about-us.php">About Us</a>
                            </li>
                            <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="our-team.php">Our Team</a>
                            </li>
                            <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="testimonials.php">Testimonials</a>
                            </li>
                        </ul>
                        </li>
                        <li class="rd-nav-item active"><a class="rd-nav-link" href="#">Elements</a>
                        <ul class="rd-menu rd-navbar-megamenu">
                            <li class="rd-megamenu-item rd-megamenu-item-1">
                            <h6 class="rd-megamenu-title"><span class="rd-megamenu-icon mdi mdi-apps"></span><span class="rd-megamenu-text">Elements</span></h6>
                            <ul class="rd-megamenu-list">
                                <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="typography.php">Typography</a></li>
                                <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="icon-lists.php">Icon lists</a></li>
                                <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="progress-bars.php">Progress bars</a></li>
                                <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="tabs-and-accordions.php">Tabs &amp; accordions</a></li>
                                <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="buttons.php">Buttons</a></li>
                                <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="tables.php">Tables</a></li>
                                <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="forms.php">Forms</a></li>
                                <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="counters.php">Counters</a></li>
                                <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="grid-system.php">Grid system</a></li>
                            </ul>
                            </li>
                            <li class="rd-megamenu-item rd-megamenu-item-2">
                            <h6 class="rd-megamenu-title"><span class="rd-megamenu-icon mdi mdi-layers"></span><span class="rd-megamenu-text">Additional pages</span></h6>
                            <ul class="rd-megamenu-list">
                                <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="404-page.php">404 Page</a></li>
                                <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="coming-soon.php">Coming Soon</a></li>
                                <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="privacy-policy.php">Privacy Policy</a></li>
                                <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="search-results.html">Search Results</a></li>
                            </ul>
                            </li>
                            <li class="rd-megamenu-item rd-megamenu-banner">
                            <div class="rd-megamenu-title"><span class="rd-megamenu-icon mdi mdi-laptop-mac"></span><span class="rd-megamenu-text">Welcome to Our Store</span></div><a class="banner-classic" href="category.php"><img src="assets/images/banner-1-300x202.jpg" alt="" width="300" height="202"/></a>
                            </li>
                        </ul>
                        </li>
                        <li class="rd-nav-item"><a class="rd-nav-link" href="category.php">Shop</a>
                        <ul class="rd-menu rd-navbar-dropdown">
                            <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="single-product.php">Single Product</a>
                            </li>
                            <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="cart-page.php">Cart Page</a>
                            </li>
                            <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="checkout.php">Checkout</a>
                            </li>
                        </ul>
                        </li>
                        <li class="rd-nav-item"><a class="rd-nav-link" href="grid-blog.php">Blog</a>
                        <ul class="rd-menu rd-navbar-dropdown">
                            <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="blog-post.php">Blog Post</a>
                            </li>
                        </ul>
                        </li>
                        <li class="rd-nav-item"><a class="rd-nav-link" href="contact-us.php">Contacts</a>
                        </li>
                    </ul>
                    </div>
                    <div class="rd-navbar-main-element">
                    <!-- RD Navbar Search-->
                    <div class="rd-navbar-search rd-navbar-search-2">
                        <button class="rd-navbar-search-toggle rd-navbar-fixed-element-3" data-rd-navbar-toggle=".rd-navbar-search"><span></span></button>
                        <form class="rd-search" action="search-results.html" data-search-live="rd-search-results-live" method="GET">
                        <div class="form-wrap">
                            <input class="rd-navbar-search-form-input form-input" id="rd-navbar-search-form-input" type="text" name="s" autocomplete="off"/>
                            <label class="form-label" for="rd-navbar-search-form-input">Search...</label>
                            <div class="rd-search-results-live" id="rd-search-results-live"></div>
                            <button class="rd-search-form-submit fl-bigmug-line-search74" type="submit"></button>
                        </div>
                        </form>
                    </div>
                    <!-- RD Navbar Basket-->
                    <div class="rd-navbar-basket-wrap">
                        <button class="rd-navbar-basket fl-bigmug-line-shopping202" data-rd-navbar-toggle=".cart-inline"><span>2</span></button>
                        <div class="cart-inline">
                        <div class="cart-inline-header">
                            <h5 class="cart-inline-title">In cart:<span> 2</span> Products</h5>
                            <h6 class="cart-inline-title">Total price:<span> $43</span></h6>
                        </div>
                        <div class="cart-inline-body">
                            <div class="cart-inline-item">
                            <div class="unit unit-spacing-sm align-items-center">
                                <div class="unit-left"><a class="cart-inline-figure" href="single-product.php"><img src="assets/images/product-mini-6-100x90.png" alt="" width="100" height="90"/></a></div>
                                <div class="unit-body">
                                <h6 class="cart-inline-name"><a href="single-product.php">CrispSound Headphones</a></h6>
                                <div>
                                    <div class="group-xs group-middle">
                                    <div class="table-cart-stepper">
                                        <input class="form-input" type="number" data-zeros="true" value="1" min="1" max="1000"/>
                                    </div>
                                    <h6 class="cart-inline-title">$20.00</h6>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                            <div class="cart-inline-item">
                            <div class="unit unit-spacing-sm align-items-center">
                                <div class="unit-left"><a class="cart-inline-figure" href="single-product.php"><img src="assets/images/product-mini-7-100x90.png" alt="" width="100" height="90"/></a></div>
                                <div class="unit-body">
                                <h6 class="cart-inline-name"><a href="single-product.php">SmartPlusSound Headphones</a></h6>
                                <div>
                                    <div class="group-xs group-middle">
                                    <div class="table-cart-stepper">
                                        <input class="form-input" type="number" data-zeros="true" value="1" min="1" max="1000"/>
                                    </div>
                                    <h6 class="cart-inline-title">$23.00</h6>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="cart-inline-footer">
                            <div class="group-sm"><a class="button button-default-outline-2 button-zakaria" href="cart-page.php">Go to cart</a><a class="button button-primary button-zakaria" href="checkout.php">Checkout</a></div>
                        </div>
                        </div>
                    </div><a class="rd-navbar-basket rd-navbar-basket-mobile fl-bigmug-line-shopping202 rd-navbar-fixed-element-2" href="cart-page.php"><span>2</span></a>
                    <button class="rd-navbar-project-hamburger rd-navbar-project-hamburger-open rd-navbar-fixed-element-1" type="button" data-multitoggle=".rd-navbar-main" data-multitoggle-blur=".rd-navbar-wrap" data-multitoggle-isolate="data-multitoggle-isolate"><span class="project-hamburger"><span class="project-hamburger-line"></span><span class="project-hamburger-line"></span><span class="project-hamburger-line"></span><span class="project-hamburger-line"></span></span></button>
                    </div>
                    <div class="rd-navbar-project">
                    <div class="rd-navbar-project-header">
                        <button class="rd-navbar-project-hamburger rd-navbar-project-hamburger-close" type="button" data-multitoggle=".rd-navbar-main" data-multitoggle-blur=".rd-navbar-wrap" data-multitoggle-isolate><span class="project-close"><span></span><span></span></span></button>
                        <h5 class="rd-navbar-project-title">Our Contacts</h5>
                    </div>
                    <div class="rd-navbar-project-content">
                        <div>
                        <div>
                            <!-- Owl Carousel-->
                            <div class="owl-carousel" data-items="1" data-dots="true" data-autoplay="true"><img src="assets/images/about-5-350x269.jpg" alt="" width="350" height="269"/><img src="assets/images/about-6-350x269.jpg" alt="" width="350" height="269"/><img src="assets/images/about-7-350x269.jpg" alt="" width="350" height="269"/>
                            </div>
                            <ul class="contacts-modern">
                            <li><a href="#">523 Sylvan Ave, 5th Floor<br>Mountain View, CA 94041 USA</a></li>
                            <li><a href="tel:#">+1 (844) 123 456 78</a></li>
                            </ul>
                        </div>
                        <div>
                            <ul class="list-inline list-social list-inline-xl">
                            <li><a class="icon mdi mdi-facebook" href="#"></a></li>
                            <li><a class="icon mdi mdi-twitter" href="#"></a></li>
                            <li><a class="icon mdi mdi-instagram" href="#"></a></li>
                            <li><a class="icon mdi mdi-google-plus" href="#"></a></li>
                            </ul>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </nav>
            </div>
        </header>
        <section class="breadcrumbs-custom">
            <div class="parallax-container" data-parallax-img="images/bg-elements-1.jpg">
            <div class="breadcrumbs-custom-body parallax-content context-dark">
                <div class="container">
                <h2 class="breadcrumbs-custom-title">Search Results</h2>
                </div>
            </div>
            </div>
            <div class="breadcrumbs-custom-footer">
            <div class="container">
                <ul class="breadcrumbs-custom-path">
                <li><a href="index.html">Home</a></li>
                <li><a href="#">Elements</a></li>
                <li class="active">Search Results</li>
                </ul>
            </div>
            </div>
        </section>
        <!-- Search results-->
        <section class="section section-xl bg-default">
            <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-9">
                <!-- RD Search-->
                <form class="rd-form rd-search rd-form-inline" action="search-results.html" method="GET">
                    <div class="form-wrap">
                    <input class="form-input" id="rd-search-form-input" type="text" name="s" autocomplete="off">
                    <label class="form-label" for="rd-search-form-input">Enter a keyword</label>
                    </div>
                    <div class="form-button">
                    <button class="button button-primary" type="submit">Search</button>
                    </div>
                </form>
                <div class="rd-search-results"></div>
                </div>
            </div>
            </div>
        </section>

  

        
            <!-- Product Section End -->
        <?php require_once 'inc/footer.php' ?>
        <div class="snackbars" id="form-output-global"></div>
        <script src="assets/js/core.min.js"></script>
        <script src="assets/js/script.js"></script>

