<?php 
session_start();
include('includes/config.php');
error_reporting(0);
if(isset($_POST['submit']))
{
$bookingdate=$_POST['bookingdate'];
$bookingtime=$_POST['bookingtime']; 
$message=$_POST['message'];
$useremail=$_SESSION['login'];
$status=0;
$vhid=$_GET['vhid'];
$sql="INSERT INTO  tblbooking(userEmail,SalonId,BookingDate,BookingTime,message,Status) VALUES(:useremail,:vhid,:bookingdate,:bookingtime,:message,:status)";
$query = $dbh->prepare($sql);
$query->bindParam(':useremail',$useremail,PDO::PARAM_STR);
$query->bindParam(':vhid',$vhid,PDO::PARAM_STR);
$query->bindParam(':bookingdate',$bookingdate,PDO::PARAM_STR);
$query->bindParam(':bookingtime',$bookingtime,PDO::PARAM_STR);
$query->bindParam(':message',$message,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Booking successfull.');</script>";
}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";
}

}

?>


<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Search for Salon | Salon Details</title>
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

    <!--Listing-Image-Slider-->

    <?php 
$vhid=intval($_GET['vhid']);
$sql = "SELECT tblsalons.*,tbllocations.LocationName,tbllocations.id as bid  from tblsalons join tbllocations on tbllocations.id=tblsalons.Salonslocation where tblsalons.id=:vhid";
$query = $dbh -> prepare($sql);
$query->bindParam(':vhid',$vhid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  
$_SESSION['brndid']=$result->bid;  
?>

    <section id="listing_img_slider">
        <div><img src="admin/img/salonimages/<?php echo htmlentities($result->Vimage1);?>" class="img-responsive" alt="image" width="900" height="560"></div>
        <div><img src="admin/img/salonimages/<?php echo htmlentities($result->Vimage2);?>" class="img-responsive" alt="image" width="900" height="560"></div>
        <div><img src="admin/img/salonimages/<?php echo htmlentities($result->Vimage3);?>" class="img-responsive" alt="image" width="900" height="560"></div>
        <div><img src="admin/img/salonimages/<?php echo htmlentities($result->Vimage4);?>" class="img-responsive" alt="image" width="900" height="560"></div>
        <?php if($result->Vimage5=="")
{

} else {
  ?>
        <div><img src="admin/img/salonimages/<?php echo htmlentities($result->Vimage5);?>" class="img-responsive" alt="image" width="900" height="560"></div>
        <?php } ?>
    </section>
    <!--/Listing-Image-Slider-->


    <!--Listing-detail-->
    <section class="listing-detail">
        <div class="container">
            <div class="listing_detail_head row">
                <div class="col-md-9">
                    <h3>Salon Name: <?php echo htmlentities($result->SalonsTitle);?></h3>
                    <h5>Location: <?php echo htmlentities($result->LocationName);?></h5>
                    
                    
                            <a class="fa fa-envelope" href="mailto:<?php echo htmlentities($result->SalonEmail);?>"> <?php echo htmlentities($result->SalonEmail);?></a>
                </div>
                <div class="col-md-3">
                    <div class="price_info">
                        <h4>Starting price</h4>
                        <p>৳<?php echo htmlentities($result->StartingPrice);?> </p> 

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="main_features">
                        <ul>

                            <li> <i class="fa fa-clock-o" aria-hidden="true"></i>
                                <p>Opening Time</p>
                                <h5>10 AM</h5>
                                
                            </li>
                            <li> <i class="fa fa-diamond" aria-hidden="true"></i>
                                <p>Service Type</p>
                                <h5><?php echo htmlentities($result->ServiceType);?></h5>
                                
                            </li>

                            <li> <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <p>Address</p>
                                <h5><?php echo htmlentities($result->SalonAddress);?></h5>
                                
                            </li>
                        </ul>
                    </div>
                    <div class="listing_more_info">
                        <div class="listing_detail_wrap">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs gray-bg" role="tablist">
                                <li role="presentation" class="active"><a href="#salon-overview " aria-controls="salon-overview" role="tab" data-toggle="tab">Salon Overview </a></li>

                                <li role="presentation"><a href="#accessories" aria-controls="accessories" role="tab" data-toggle="tab">Services</a></li>
                                <li role="presentation"><a href="#businesshours" aria-controls="businesshours" role="tab" data-toggle="tab">Business hours</a></li>
                                <li role="presentation"><a href="#getdirection" aria-controls="getdirection" role="tab" data-toggle="tab">Get Direction</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <!-- salon-overview -->
                                <div role="tabpanel" class="tab-pane active" id="salon-overview">

                                    <p><?php echo htmlentities($result->SalonsOverview);?></p>
                                </div>


                                <!-- Services -->
                                <div role="tabpanel" class="tab-pane" id="accessories">
                                    <!--Services-->
                                    <table>
                                        <thead>
                                            <tr>
                                                <th colspan="1">Services</th>
                                                <th colspan="1">Price</th>
                                                <th colspan="1"></th>
                                            </tr>

                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Air Conditioner</td>
                                                <td>Free of Charge</td>
                                                <?php if($result->AirConditioner==1)
{
?>
                                                <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                                <?php } else { ?>
                                                <td><i class="fa fa-close" aria-hidden="true"></i></td>
                                                <?php } ?>
                                            </tr>

                                            <tr>
                                                <td>Spa</td>
                                                <td>200tk</td>
                                                <?php if($result->Spa==1)
{
?>
                                                <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                                <?php } else {?>
                                                <td><i class="fa fa-close" aria-hidden="true"></i></td>
                                                <?php } ?>
                                            </tr>

                                            <tr>
                                                <td>Hair Treatment</td>
                                                <td>500tk</td>
                                                <?php if($result->HairTreatment==1)
{
?>
                                                <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                                <?php } else { ?>
                                                <td><i class="fa fa-close" aria-hidden="true"></i></td>
                                                <?php } ?>
                                            </tr>


                                            <tr>

                                                <td>Facial</td>
                                                <td>300tk</td>

                                                <?php if($result->Facial==1)
{
?>
                                                <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                                <?php } else { ?>
                                                <td><i class="fa fa-close" aria-hidden="true"></i></td>
                                                <?php } ?>
                                            </tr>


                                        </tbody>
                                    </table>
                                </div>
                                <!-- business hours -->
                                <div role="tabpanel" class="tab-pane" id="businesshours">

                                    <table>
                                        <thead>
                                            <tr>
                                                <th colspan="1">Days</th>
                                                <th colspan="1">Time</th>

                                            </tr>

                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>SATURDAY</td>
                                                <td>10AM-9.30PM</td>

                                            </tr>
                                            <tr>
                                                <td>SUNDAY</td>
                                                <td>9.30AM-9.30PM</td>

                                            </tr>
                                            <tr>
                                                <td>MONDAY</td>
                                                <td>9.30AM-9.30PM</td>

                                            </tr>
                                            <tr>
                                                <td>TUESDAY</td>
                                                <td>9.30AM-10PM</td>

                                            </tr>
                                            <tr>
                                                <td>WEDNESDAY</td>
                                                <td>10AM-8.30PM</td>

                                            </tr>
                                            <tr>
                                                <td>THURSDAY</td>
                                                <td>9.30AM-10.30PM</td>

                                            </tr>
                                            <tr>
                                                <td>FRIDAY</td>
                                                <td>9AM-4PM</td>

                                            </tr>



                                        </tbody>
                                    </table>
                                </div>
                                <!-- Get direction-->
                                 <div role="tabpanel" class="tab-pane" id="getdirection">

                                   
                                     <div class="mapouter"><div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=%20<?php echo htmlentities($result->LocationName);?>%20<?php echo htmlentities($result->SalonAddress);?>&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://torrent9-fr.com">torrent9 search to</a></div><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <?php }} ?>

                </div>

                <!--Side-Bar-->
                <aside class="col-md-3">

                   
                    <div class="sidebar_widget">
                        <div class="widget_heading">
                            <h5><i class="fa fa-envelope" aria-hidden="true"></i>Book Now</h5>
                        </div>
                        <form method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="bookingdate" placeholder="Boking Date(dd/mm/yyyy)" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="bookingtime" placeholder="Booking Time(AM/PM)" required>
                            </div>
                            <div class="form-group">
                                <textarea rows="4" class="form-control" name="message" placeholder="Address" required></textarea>
                            </div>
                            <?php if($_SESSION['login'])
              {?>
                            <div class="form-group">
                                <input type="submit" class="btn" name="submit" value="Book Now">
                            </div>
                            <?php } else { ?>
                            <a href="#loginform" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Login For Book</a>

                            <?php } ?>
                        </form>
                    </div>
                </aside>
                <!--/Side-Bar-->
            </div>

            <div class="space-20"></div>
            <div class="divider"></div>

          

        </div>
    </section>
    <!--/Listing-detail-->

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

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/interface.js"></script>
    <script src="assets/switcher/js/switcher.js"></script>
    <script src="assets/js/bootstrap-slider.min.js"></script>
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>

</body>

</html>
