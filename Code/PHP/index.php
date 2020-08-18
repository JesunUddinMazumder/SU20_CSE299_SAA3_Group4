<?php
session_start();
include('includes/config.php');
error_reporting(0);

?>

<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Search for Salon</title>
    <!--Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
    <link href="assets/css/slick.css" rel="stylesheet">
    <link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all" data-default-color="true" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/orange.css" title="orange" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/pink.css" title="pink" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
</head>

<body>

    <!-- Start Switcher -->
    <?php include('includes/colorswitcher.php');?>
    <!-- /Switcher -->

    <!--Header-->
    <?php include('includes/header.php');?>
    <!-- /Header -->

    <!-- Banners -->
    <section id="banner" class="banner-section">
        <div class="container">

            <div class="div_zindex">
                <div class="row">


                    <div class="col-md-5 col-md-push-6">
                        <div class="sidebar_widget">
                            <div class="widget_heading">
                                <h5><i class="fa fa-search" aria-hidden="true"></i> Find Your Salon </h5>
                            </div>
                            <div class="sidebar_filter">
                                <form action="search-salonresult.php" method="post">
                                    <div class="form-group select">
                                        <select class="form-control" name="brand">
                                            <option>Select Location</option>
                                            <option value="Uttara">Uttara</option>
                                            <option value="Bashundhara R/A">Bashundhara R/A</option>
                                            <option value="Khilkhet">Khilkhet</option>
                                            <option value="Rajlokkhi">Rajlokkhi</option>


                                        </select>
                                    </div>
                                    <div class="form-group select">
                                        <select class="form-control" name="fueltype">
                                            <option>Select Service Type</option>
                                            <option value="Book For Walk In">Book For Walk In</option>
                                            <option value="Home Service">Home Service</option>

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-block"><i class="fa fa-search" aria-hidden="true"></i> Search Salon</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="banner_content">
                            <h1>Treat yourself today! Get best deals</h1>
                            <p>Book Salon Appointments Near You - Best Deal you ever get</p>
                            <a href="salon-listing.php" class="btn">More Search Option<span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Banners -->


    <!-- Resent salons-->
    <section class="section-padding gray-bg">


        <div class="container">
            <div class="section-header text-center">

                <h2>Find the Best <span>Salon for you</span></h2>
                <p>Search for Salon is an online destination of salon , where you can book service online and professionals can grow their business. Booking service online can save your valuable time, so enjoy the services and TREAT YOURSELF NEAR YOU…. <a href="index.php">Searchforsalon</a> – A new you.</p>
            </div>
            <div class="row">


                <!-- Nav tabs -->
                <div class="recent-tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#resentnewsalon" role="tab" data-toggle="tab">New Salons</a></li>
                    </ul>
                </div>
                <!-- Recently Listed New Salons -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="resentnewsalon">

                        <?php $sql = "SELECT tblsalons.SalonsTitle,tblbrands.SalonName,tblsalons.StartingPrice,tblsalons.BookingType,tblsalons.BookingDate,tblsalons.id,tblsalons.BookCapacity,tblsalons.SalonsOverview,tblsalons.Vimage1 from tblsalons join tblbrands on tblbrands.id=tblsalons.SalonsBrand";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{
?>

                        <div class="col-list-3">
                            <div class="recent-salon-list">
                                <div class="salon-info-box"> <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" class="img-responsive" alt="image"></a>
                                    <ul>
                                        <li><i class="fa fa-book" aria-hidden="true"></i><?php echo htmlentities($result->BookingType);?></li>
                                        <li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo htmlentities($result->BookingDate);?> Model</li>
                                        <li><i class="fa fa-user" aria-hidden="true"></i><?php echo htmlentities($result->BookCapacity);?> seats</li>
                                    </ul>
                                </div>
                                <div class="salon-title-m">
                                    <h6><a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->SalonName);?> , <?php echo htmlentities($result->SalonsTitle);?></a></h6>
                                    <span class="price">$<?php echo htmlentities($result->StartingPrice);?> /tk</span>
                                </div>
                                <div class="inventory_info_m">
                                    <p><?php echo substr($result->SalonsOverview,0,70);?></p>
                                </div>
                            </div>
                        </div>
                        <?php }}?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Resent Salons -->

    <!-- Fun Facts-->
    <section class="fun-facts-section">
        <div class="container div_zindex">
            <div class="row">
                <div class="col-lg-3 col-xs-6 col-sm-3">
                    <div class="fun-facts-m">
                        <div class="cell">
                            <h2><i class="fa fa-home" aria-hidden="true"></i>100+</h2>
                            <p>Home service</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6 col-sm-3">
                    <div class="fun-facts-m">
                        <div class="cell">
                            <h2><i class="fa fa-list" aria-hidden="true"></i>20+</h2>
                            <p>New Salons</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6 col-sm-3">
                    <div class="fun-facts-m">
                        <div class="cell">
                            <h2><i class="fa fa-search" aria-hidden="true"></i>24hrs</h2>
                            <p>Search and book</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6 col-sm-3">
                    <div class="fun-facts-m">
                        <div class="cell">
                            <h2><i class="fa fa-user-circle-o" aria-hidden="true"></i>200+</h2>
                            <p>Satisfied Customers</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Dark Overlay-->
        <div class="dark-overlay"></div>
    </section>
    <!-- /Fun Facts-->


    <!--Testimonial -->
    <section class="section-padding testimonial-section parallex-bg">
        <div class="container div_zindex">
            <div class="section-header white-text text-center">
                <h2>Our Satisfied <span>Customers</span></h2>
            </div>
            <div class="row">
                <div id="testimonial-slider">
                    <?php
$tid=1;
$sql = "SELECT tbltestimonial.Testimonial,tblusers.FullName from tbltestimonial join tblusers on tbltestimonial.UserEmail=tblusers.EmailId where tbltestimonial.status=:tid";
$query = $dbh -> prepare($sql);
$query->bindParam(':tid',$tid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  ?>


                    <div class="testimonial-m">
                        <div class="testimonial-img"> <img src="assets/images/cat-profile.png" alt="" /> </div>
                        <div class="testimonial-content">
                            <div class="testimonial-heading">
                                <h5><?php echo htmlentities($result->FullName);?></h5>
                                <p><?php echo htmlentities($result->Testimonial);?></p>
                            </div>
                        </div>
                    </div>
                    <?php }} ?>



                </div>
            </div>
        </div>
        <!-- Dark Overlay-->
        <div class="dark-overlay"></div>
    </section>
    <!-- /Testimonial-->


    <!--Footer -->
    <?php include('includes/footer.php');?>
    <!-- /Footer-->

    <!--Back to top-->
    <div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
    <!--/Back to top-->

    <!--Login-Form -->
    <?php include('includes/login.php');?>
    <!--/Login-Form -->

    <!--Register-Form -->
    <?php include('includes/registration.php');?>

    <!--/Register-Form -->

    <!--Forgot-password-Form -->
    <?php include('includes/forgotpassword.php');?>
    <!--/Forgot-password-Form -->

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/interface.js"></script>
    <!--Switcher-->
    <script src="assets/switcher/js/switcher.js"></script>
    <!--bootstrap-slider-JS-->
    <script src="assets/js/bootstrap-slider.min.js"></script>
    <!--Slider-JS-->
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>

</body>

</html>
