<?php
session_start();
include('connection.php');

//logout
include('logout.php');

//remember me
include('remember.php');
?>
<!DOCTYPE html>
<html lang=en>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search for Salon | Home</title>

    <!--    Title icon-->
    <link rel="icon" href="images/icon.jpg" type="image/x-icon">



    <!-- CSS  -->
    <link rel="stylesheet" href="style.css" type="text/css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</head>

<body>
    <!--header-->
    <section id="header">
        <div class="background">
            <div class="menu-bar">
                <nav class="navbar navbar-expand-lg navbar-light"> <a class="navbar-brand" href="index.php">Search for Salon</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item" class="active"> <a class="nav-link" href="index.php">Home </a> </li>
                            <li class="nav-item"> <a class="nav-link" href="addSalon.php">Add Salon</a> </li>
                            <li class="nav-item"> <a class="nav-link" href="register.php">Sign up</a> </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="banner text-center">
                <h1>SALONS AROUND YOU</h1>
                <p>Treat yourself near you</p>
            </div>
        </div>
    </section>
    <div class="search-salon text-center">
        <div class="form-group col-md-12">
            <select id="inputState" class="form-control">
                <option selected>Location</option>
                <option>Uttara</option>
                <option>Bashundhara R/A</option>
                <option>Bonani</option>
                <option>Khilkhet</option>
                <option>Dhanmondi</option>
                <option>Khilgaon</option>
            </select>
        </div>
        <div class="form-group col-md-12">
            <select class="form-control" id="exampleFormControlSelect1">
                <option>Selete Service type</option>
                <option>Booking for walk in</option>
                <option>Home service</option>
            </select>
        </div>
        <div class="form-group col-md-12">
            <button class="btn btn-primary">Search Now</button>
        </div>
    </div>
    <!--    Top Salons-->
    <section id="top-salons">
        <div class="container ">
            <h3>TOP SALONS</h3>
            <div class="card-deck">
                <div class="card"> <img src="images/2.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Uttara Exclusive Salon</h5>
                        <p class="card-text">orem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">House- 37, Road No 21, Sector- 14, Uttara</li>
                        <li class="list-group-item">Open</li>
                        <li class="list-group-item">Opens 10AM</li>
                    </ul>
                    <div class="card-body"> <a href="#" class="card-link">Book now</a> <a href="#" class="card-link">01671-099135</a> </div>
                    <div class="card-footer"> <small class="text-muted">4.6 km away</small> </div>
                </div>
                <div class="card"> <img src="images/3.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Signature Salon</h5>
                        <p class="card-text">orem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">House- 37, Road No 21, Sector- 14, Uttara</li>
                        <li class="list-group-item">Open</li>
                        <li class="list-group-item">Opens 9.30AM</li>
                    </ul>
                    <div class="card-body"> <a href="#" class="card-link">Book now</a> <a href="#" class="card-link">01671-099135</a> </div>
                    <div class="card-footer"> <small class="text-muted">2.7 km away</small> </div>
                </div>
                <div class="card"> <img src="images/4.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Uttara VIP Salon</h5>
                        <p class="card-text">orem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">House- 37, Road No 21, Sector- 14, Uttara</li>
                        <li class="list-group-item">Closed ⋅ </li>
                        <li class="list-group-item">Opens 9AM</li>
                    </ul>
                    <div class="card-body"> <a href="#" class="card-link">Book now</a> <a href="#" class="card-link">01671-099135</a> </div>
                    <div class="card-footer"> <small class="text-muted">3.2 km away</small> </div>
                </div>
            </div>
        </div>
    </section>



    <div class="container">
        <div class="row">
            <div class="col-md-6 business-hours">
                <div class="appointment-left">
                    <h2>Business Hours</h2>
                    <div class="appointment-time">
                        <ul>
                            <li> <span>Saturday </span><span>10am-4pm</span> </li>
                            <li> <span>Sunday </span><span>9.30am-10pm</span> </li>
                            <li> <span>Monday </span><span>9am-6pm</span> </li>
                            <li> <span>Tuesday </span><span>9am-6pm</span> </li>
                            <li> <span>Wednesday </span><span>9am-6pm</span> </li>
                            <li> <span>Thursday </span><span>9am-8.30pm</span> </li>
                            <li> <span>Friday </span><span>9am-6pm</span> </li>

                        </ul>
                    </div>
                </div>

            </div>
            <div class="col-md-6 left-dotted">
                <div class="img">
                    <img class="list-salon-img" src="images/1.jpg" alt="..." style="width:100%;">
                    <div class="text-block">
                        <h4>Total Salons</h4>
                        <p>21 listed salons</p>
                        <button class="btn-secondary">Add yours now</button>
                    </div>
                </div>

            </div>
        </div>
    </div>



    <div class="clr"></div>
    <!----------   footer----------->
    <div class="footer">
        <div class="footer-content"> </div>
        <div class="footer-bottom"> &copy; searchforsalon.com | 2020 </div>
    </div>

</body>

</html>
