<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{ 

if(isset($_POST['submit']))
  {
$salontitle=$_POST['salontitle'];
$location=$_POST['locationname'];
$salonoverview=$_POST['salonoverview'];
$startingprice=$_POST['startingprice'];
$servicetype=$_POST['servicetype'];
$openingtime=$_POST['openingtime'];
$saloncapacity=$_POST['saloncapacity'];
$vimage1=$_FILES["img1"]["name"];
$vimage2=$_FILES["img2"]["name"];
$vimage3=$_FILES["img3"]["name"];
$vimage4=$_FILES["img4"]["name"];
$vimage5=$_FILES["img5"]["name"];
$airconditioner=$_POST['airconditioner'];
$spa=$_POST['spa'];
$Hairtreatment=$_POST['Hairtreatment'];
$facial=$_POST['facial'];
$id=intval($_GET['id']);

$sql="update tblsalons set SalonsTitle=:salontitle,SalonsLocations=:locationname,SalonsOverview=:salonoverview,StartingPrice=:startingprice,ServiceType=:servicetype,OpeningTime=:openingtime,SalonCapacity=:saloncapacity,AirConditioner=:airconditioner,Spa=:spa,HairTreatment=:Hairtreatment,Facial=:facial where id=:id ";
$query = $dbh->prepare($sql);
$query->bindParam(':salontitle',$salontitle,PDO::PARAM_STR);
$query->bindParam(':locationname',$location,PDO::PARAM_STR);
$query->bindParam(':salonoverview',$salonoverview,PDO::PARAM_STR);
$query->bindParam(':startingprice',$startingprice,PDO::PARAM_STR);
$query->bindParam(':servicetype',$servicetype,PDO::PARAM_STR);
$query->bindParam(':openingtime',$openingtime,PDO::PARAM_STR);
$query->bindParam(':saloncapacity',$saloncapacity,PDO::PARAM_STR);
$query->bindParam(':airconditioner',$airconditioner,PDO::PARAM_STR);
$query->bindParam(':spa',$spa,PDO::PARAM_STR);
$query->bindParam(':Hairtreatment',$Hairtreatment,PDO::PARAM_STR);
$query->bindParam(':facial',$facial,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);
$query->execute();

$msg="Data updated successfully";


}


	?>
<!doctype html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="theme-color" content="#3e454c">

    <title>Search for Salon | Admin Edit Salon Info</title>

    <!-- Font awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Sandstone Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap Datatables -->
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <!-- Bootstrap social button library -->
    <link rel="stylesheet" href="css/bootstrap-social.css">
    <!-- Bootstrap select -->
    <link rel="stylesheet" href="css/bootstrap-select.css">
    <!-- Bootstrap file input -->
    <link rel="stylesheet" href="css/fileinput.min.css">
    <!-- Awesome Bootstrap checkbox -->
    <link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
    <!-- Admin Stye -->
    <link rel="stylesheet" href="css/style.css">
    <style>
        .errorWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #dd3d36;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        }

        .succWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #5cb85c;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        }

    </style>
</head>

<body>
    <?php include('includes/header.php');?>
    <div class="ts-main-content">
        <?php include('includes/leftbar.php');?>
        <div class="content-wrapper">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">

                        <h2 class="page-title">Edit Salon</h2>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Basic Info</div>
                                    <div class="panel-body">
                                        <?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
                                        <?php 
$id=intval($_GET['id']);
$sql ="SELECT tblsalons.*,tbllocations.LocationName,tbllocations.id as bid from tblsalons join tbllocations on tbllocations.id=tblsalons.Salonslocation where tblsalons.id=:id";
$query = $dbh -> prepare($sql);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>

                                        <form method="post" class="form-horizontal" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Salon Title<span style="color:red">*</span></label>
                                                <div class="col-sm-4">
                                                    <input type="text" name="salontitle" class="form-control" value="<?php echo htmlentities($result->SalonsTitle)?>" required>
                                                </div>
                                                <label class="col-sm-2 control-label">Select Location<span style="color:red">*</span></label>
                                                <div class="col-sm-4">
                                                    <select class="selectpicker" name="locationname" required>
                                                        <option value="<?php echo htmlentities($result->bid);?>"><?php echo htmlentities($bdname=$result->LocationName); ?> </option>
                                                        <?php $ret="select id,LocationName from tbllocations";
$query= $dbh -> prepare($ret);
//$query->bindParam(':id',$id, PDO::PARAM_STR);
$query-> execute();
$resultss = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
foreach($resultss as $results)
{
if($results->LocationName==$bdname)
{
continue;
} else{
?>
                                                        <option value="<?php echo htmlentities($results->id);?>"><?php echo htmlentities($results->LocationName);?></option>
                                                        <?php }}} ?>

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="hr-dashed"></div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Salon Overview<span style="color:red">*</span></label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" name="salonoverview" rows="3" required><?php echo htmlentities($result->SalonsOverview);?></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Starting Price<span style="color:red">*</span></label>
                                                <div class="col-sm-4">
                                                    <input type="text" name="startingprice" class="form-control" value="<?php echo htmlentities($result->StartingPrice);?>" required>
                                                </div>
                                                <label class="col-sm-2 control-label">Select Service Type<span style="color:red">*</span></label>
                                                <div class="col-sm-4">
                                                    <select class="selectpicker" name="servicetype" required>
                                                        <option value="<?php echo htmlentities($results->ServiceType);?>"> <?php echo htmlentities($result->ServiceType);?> </option>
                                                        <option>Select</option>
                                                        <option value="Book For Walk In">Book For Walk In</option>
                                                        <option value="Home Service">Home Service</option>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Opening Time<span style="color:red">*</span></label>
                                                <div class="col-sm-4">
                                                    <input type="text" name="openingtime" class="form-control" value="<?php echo htmlentities($result->OpeningTime);?>" required>
                                                </div>
                                                <label class="col-sm-2 control-label">Salon Capacity<span style="color:red">*</span></label>
                                                <div class="col-sm-4">
                                                    <input type="text" name="saloncapacity" class="form-control" value="<?php echo htmlentities($result->SalonCapacity);?>" required>
                                                </div>
                                            </div>
                                            <div class="hr-dashed"></div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <h4><b>Salon Images</b></h4>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <div class="col-sm-4">
                                                    Image 1 <img src="img/salonimages/<?php echo htmlentities($result->Vimage1);?>" width="300" height="200" style="border:solid 1px #000">
                                                    <a href="changeimage1.php?imgid=<?php echo htmlentities($result->id)?>">Change Image 1</a>
                                                </div>
                                                <div class="col-sm-4">
                                                    Image 2<img src="img/salonimages/<?php echo htmlentities($result->Vimage2);?>" width="300" height="200" style="border:solid 1px #000">
                                                    <a href="changeimage2.php?imgid=<?php echo htmlentities($result->id)?>">Change Image 2</a>
                                                </div>
                                                <div class="col-sm-4">
                                                    Image 3<img src="img/salonimages/<?php echo htmlentities($result->Vimage3);?>" width="300" height="200" style="border:solid 1px #000">
                                                    <a href="changeimage3.php?imgid=<?php echo htmlentities($result->id)?>">Change Image 3</a>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <div class="col-sm-4">
                                                    Image 4<img src="img/salonimages/<?php echo htmlentities($result->Vimage4);?>" width="300" height="200" style="border:solid 1px #000">
                                                    <a href="changeimage4.php?imgid=<?php echo htmlentities($result->id)?>">Change Image 4</a>
                                                </div>
                                                <div class="col-sm-4">
                                                    Image 5
                                                    <?php if($result->Vimage5=="")
{
echo htmlentities("File not available");
} else {?>
                                                    <img src="img/salonimages/<?php echo htmlentities($result->Vimage5);?>" width="300" height="200" style="border:solid 1px #000">
                                                    <a href="changeimage5.php?imgid=<?php echo htmlentities($result->id)?>">Change Image 5</a>
                                                    <?php } ?>
                                                </div>

                                            </div>
                                            <div class="hr-dashed"></div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Others</div>
                                    <div class="panel-body">


                                        <div class="form-group">
                                            <div class="col-sm-3">
                                                <?php if($result->AirConditioner==1)
{?>
                                                <div class="checkbox checkbox-inline">
                                                    <input type="checkbox" id="inlineCheckbox1" name="airconditioner" checked value="1">
                                                    <label for="inlineCheckbox1"> Air Conditioner </label>
                                                </div>
                                                <?php } else { ?>
                                                <div class="checkbox checkbox-inline">
                                                    <input type="checkbox" id="inlineCheckbox1" name="airconditioner" value="1">
                                                    <label for="inlineCheckbox1"> Air Conditioner </label>
                                                </div>
                                                <?php } ?>
                                            </div>
                                            <div class="col-sm-3">
                                                <?php if($result->Spa==1)
{?>
                                                <div class="checkbox checkbox-inline">
                                                    <input type="checkbox" id="inlineCheckbox1" name="spa" checked value="1">
                                                    <label for="inlineCheckbox2"> Spa</label>
                                                </div>
                                                <?php } else {?>
                                                <div class="checkbox checkbox-success checkbox-inline">
                                                    <input type="checkbox" id="inlineCheckbox1" name="spa" value="1">
                                                    <label for="inlineCheckbox2"> Spa </label>
                                                </div>
                                                <?php }?>
                                            </div>
                                            <div class="col-sm-3">
                                                <?php if($result->HairTreatment==1)
{?>
                                                <div class="checkbox checkbox-inline">
                                                    <input type="checkbox" id="inlineCheckbox1" name="Hairtreatment" checked value="1">
                                                    <label for="inlineCheckbox3"> Hairtreatment </label>
                                                </div>
                                                <?php } else {?>
                                                <div class="checkbox checkbox-inline">
                                                    <input type="checkbox" id="inlineCheckbox1" name="Hairtreatment" value="1">
                                                    <label for="inlineCheckbox3"> Hairtreatment</label>
                                                </div>
                                                <?php } ?>
                                            </div>
                                            <div class="col-sm-3">
                                                <?php if($result->Facial==1)
{
	?>
                                                <div class="checkbox checkbox-inline">
                                                    <input type="checkbox" id="inlineCheckbox1" name="facial" checked value="1">
                                                    <label for="inlineCheckbox3"> Facial</label>
                                                </div>
                                                <?php } else {?>
                                                <div class="checkbox checkbox-inline">
                                                    <input type="checkbox" id="inlineCheckbox1" name="facial" value="1">
                                                    <label for="inlineCheckbox3"> Facial</label>
                                                </div>
                                                <?php } ?>
                                            </div>


                                        </div>
                                    </div>

                                    <?php }} ?>


                                    <div class="form-group">
                                        <div class="col-sm-8 col-sm-offset-2">

                                            <button class="btn btn-primary" name="submit" type="submit" style="margin-top:4%">Save changes</button>
                                        </div>
                                    </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>



        </div>
    </div>
 

    <!-- Loading Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <script src="js/Chart.min.js"></script>
    <script src="js/fileinput.js"></script>
    <script src="js/chartData.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
<?php } ?>
