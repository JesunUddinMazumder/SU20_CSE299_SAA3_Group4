<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search for Salon | Add Salon </title>
    <link rel="icon" href="images/icon.jpg" type="image/x-icon">
    <!-- CSS -->
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>
    <!--header-->
    <section id="header">
        <div class="background addsalon">
            <div class="menu-bar">
                <nav class="navbar navbar-expand-lg navbar-light"> <a class="navbar-brand" href="index.php">Search for Salon</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item "> <a class="nav-link" href="index.php">Home </a> </li>
                            <li class="nav-item"> <a class="nav-link" href="addSalon.php">Add Salon</a> </li>
                            <li class="nav-item"> <a class="nav-link" href="register.php">Sign up</a> </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </section>
    <section id="add-salon">
        <div class="add-salon-details">
            <form>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <h2> Add salon</h2> </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" required> </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Password</label>
                        <input type="password" class="form-control" id="inputPassword4" required> </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Salon name</label>
                        <input type="text" class="form-control" id="inputname" placeholder="Enter salon name..." required> </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Address</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="Type your address here.." required> </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputState">City</label>
                        <select id="inputState" class="form-control">
                            <option selected>Choose...</option>
                            <option>Uttara</option>
                            <option>Bashundhara R/A</option>
                            <option>Bonani</option>
                            <option>Khilkhet</option>
                            <option>Dhanmondi</option>
                            <option>Khilgaon</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputZip">Zip</label>
                        <input type="text" class="form-control" id="inputZip"> </div>
                </div>
                <div class="form-group">
                    <div class="form-check"> <a href="#">Terms & Conditions<br /></a>
                        <input class="form-check-input" type="checkbox" id="gridCheck">
                        <label class="form-check-label" for="gridCheck">Agree with all terms and conditions </label>
                    </div>
                </div>
                <a href="#">
                    <button type="submit" class="btn btn-primary" value="Add Salon">Add Salon</button>
                </a>
            </form>
        </div>
    </section>
    <!----------   footer----------->
    <div class="footer">
        <div class="footer-content"> </div>
        <div class="footer-bottom"> &copy; searchforsalon.com | 2020 </div>
    </div>
    <script src=""></script>
</body>

</html>