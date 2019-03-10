<!--ORDERING FOOD PAGE WHICH HAS A FORM THAT TAKES TABLE NUMBER , REGISTERED MOBILE NUMBER , NAME & EMAIL ALONG WITH # MAXIMUM DISHES TO BE ORDERED-->


<!DOCTYPE html>

<html lang="en">

<head>
    <title>EatWell</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700|Raleway" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="admin/vendor/fontawesome-free/css/all.css">

    <link rel="stylesheet" href="css/style.css">


    <link rel="stylesheet" href="css/custom.css">
</head>

<body data-spy="scroll" data-target="#site-navbar" data-offset="200">


    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <a href="index.php" class="fa fa-3x fa-arrow-circle-left mt-4"></a>
            </div>
            <div class="col-md-8">
                <div class="menu-heading mt-4 ml-5">ORDER FOOD</div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="includes/order-now.php" method="post" role="form" class="mt-5">
                    <legend>Add Your Food Items</legend>

                    <div class="form-group">
                        <label for="table_no">Table no</label>
                        <select name="table_no" id="" class="form-control" name="table_no">
                           <option value="1" name="1">1</option>
                            <option value="2" name="2">2</option>
                            <option value="3" name="3">3</option>
                            <option value="4" name="4">4</option>
                             <option value="5" name="5">5</option>
                              <option value="6" name="6">6</option>
                               <option value="7" name="7">7</option>
       </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Your Name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="Enter Your Registered Email">
                    </div>
                    <div class="form-group">
                        <label for="mobile_no">Mobile No.</label>
                        <input type="text" class="form-control" name="mobile_no" id="mobile_no" placeholder="Enter Your Registered Mobile">
                    </div>

                    <p class="fa fa-exclamation-triangle"> Not more Than 3 at a time</p>

                    <div class="form-group">
                        <label for="dish_1">Dish 1</label>
                        <input type="text" class="form-control" name="dish_1" id="dish_1" placeholder="Enter Dish-1">
                    </div>
                    <div class="form-group">
                        <label for="dish_2">Dish 2</label>
                        <input type="text" class="form-control" name="dish_2" id="dish_2" placeholder="Enter Dish-1">
                    </div>
                    <div class="form-group">
                        <label for="dish_3">Dish 3</label>
                        <input type="text" class="form-control" name="dish_3" id="dish_3" placeholder="Enter Dish-2">
                    </div>
                    <span class="fa fa-exclamation-triangle mt-3 ml-3 mr-3 mb-5"> Order once placed Will not be cancelled  <button type="submit" class="btn btn-primary" name="order_food"> Order Food now</button></span>
                    <p></p>
                    <p></p>
                </form>
            </div>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>

    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/jquery.timepicker.min.js"></script>

    <script src="js/jquery.animateNumber.min.js"></script>


    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="js/google-map.js"></script>

    <script src="js/main.js"></script>


</body>

</html>
