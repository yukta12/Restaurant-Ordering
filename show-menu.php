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
                <a href="" class="fa fa-3x fa-arrow-circle-left mt-4"></a>
            </div>
            <div class="col-md-8">
                <div class="menu-heading mt-4 ml-5">MENU</div>
            </div>
        </div>
    </div>
    <?php
    include_once("includes/connection.php");
    $query = "SELECT * from menu";
   
    $result =  mysqli_query($connection,$query);
     while ($row = mysqli_fetch_assoc($result)) {
         $item_name = $row['item_name'];
         $item_description = $row['item_description'];
         $item_price = $row['item_price'];
            
         echo<<<MENU
          <div class="container">
            <div class="row">
            <div class="col-md-12">
                <div class="media menu-item mt-5 ">
                      <img class="mr-3" src="images/menu_1.jpg" class="img-fluid " alt="">
                      <div class="media-body">
                        <h5 class="mt-0">$item_name</h5>
                        <p>$item_description</p>
                        <h6 class="text-primary menu-price">$$item_price</h6>
                      </div>
                    </div>
                    </div>
                    </div>
         
MENU;
     }
    
?>
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
