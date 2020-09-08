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
    <title>Search for Salon | Result</title>
    <!--Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
    <!--Custome Style -->
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <!--OWL Carousel slider-->
    <link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
    <!--slick-slider -->
    <link href="assets/css/slick.css" rel="stylesheet">
    <!--bootstrap-slider -->
    <link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
    <!--FontAwesome Font Style -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">

    <!-- SWITCHER -->
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

    <!--Page Header-->
    <section class="page-header listing_page">
        <div class="container">
            <div class="page-header_wrap">
                <div class="page-heading">
                    <h1>Salon Search Result</h1>
                </div>
                <ul class="coustom-breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li>Salon Listing</li>
                </ul>
            </div>
        </div>
        <!-- Dark Overlay-->
        <div class="dark-overlay"></div>
    </section>
    <!-- /Page Header-->

    <!--Listing-->
    <section class="listing-page">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-md-push-3">
                    <div class="result-sorting-wrapper">
                        <div class="sorting-count">
                            <?php 
//Query for Listing count
$location=$_POST['location'];
$servicetype=$_POST['servicetype'];
$sql = "SELECT id from tblsalons where tblsalons.Salonslocation=:location and tblsalons.ServiceType=:servicetype";
$query = $dbh -> prepare($sql);
$query -> bindParam(':location',$location, PDO::PARAM_STR);
$query -> bindParam(':servicetype',$servicetype, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=$query->rowCount();
?>
                            <p><span><?php echo htmlentities($cnt);?> Listings</span></p>
                        </div>
                    </div>

                    <?php 

$sql = "SELECT tblsalons.*,tbllocations.LocationName,tbllocations.id as bid  from tblsalons join tbllocations on tbllocations.id=tblsalons.Salonslocation where tblsalons.Salonslocation=:location and tblsalons.ServiceType=:servicetype";
$query = $dbh -> prepare($sql);
$query -> bindParam(':location',$location, PDO::PARAM_STR);
$query -> bindParam(':servicetype',$servicetype, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  ?>
                    <div class="product-listing-m gray-bg">
                        <div class="product-listing-img"><img src="admin/img/salonimages/<?php echo htmlentities($result->Vimage1);?>" class="img-responsive" alt="Image" />
                        </div>
                        <div class="product-listing-content">
                            <h5><a href="salon-details.php?vhid=<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->SalonsTitle);?> , <?php echo htmlentities($result->LocationName);?></a></h5>
                            <p class="list-price">Starting Price: <?php echo htmlentities($result->StartingPrice);?>tk Minimum</p>
                            <ul>
                                <li><i class="fa fa-map-marker" aria-hidden="true"></i>Address:<?php echo htmlentities($result->SalonAddress);?></li>
                                <li><i class="fa fa-clock-o" aria-hidden="true"></i>Open: 10AM</li>
                                <li><i class="fa fa-check-circle-o" aria-hidden="true"> Service Type:</i><?php echo htmlentities($result->ServiceType);?></li>
                            </ul>
                            <a href="salon-details.php?vhid=<?php echo htmlentities($result->id);?>" class="btn">View Details <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                        </div>
                    </div>
                    <?php }} ?>
                </div>

                <!--Side-Bar-->
      <aside class="col-md-3 col-md-pull-9">
           <div class="sidebar_widget">
                            <div class="widget_heading">
                                <h5><i class="fa fa-search" aria-hidden="true"></i> Find Your Salon </h5>
                            </div>
                            <div class="sidebar_filter">
                                <form action="search-salonresult.php" method="post">
                                    <div class="form-group select">
                                        <select class="form-control" name="location">
                                            <option>Select Location</option>

                                            <?php $sql = "SELECT * from  tbllocations ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{       ?>
                                            <option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->LocationName);?></option>
                                            <?php }} ?>

                                        </select>
                                    </div>
                                    <div class="form-group select">
                                        <select class="form-control" name="servicetype">
                                            <option>Select Service Type</option>
                                            <option value="Book For Walk In">Book For Walk In</option>
                                            <option value="Home Service">Home Service</option>
                                            <option value="Both">Both</option>

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-block"><i class="fa fa-search" aria-hidden="true"></i> Search Salon</button>
                                    </div>
                                </form>
                            </div>
                        </div>


      </aside>
                <!--/Side-Bar-->
            </div>
        </div>
    </section>
    <!-- /Listing-->

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
