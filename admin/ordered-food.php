<?php
    ob_start();
    $page_title ="Ordered Food";
?>

<!DOCTYPE html>
<html lang="en">

<?php
include_once ("includes/header.php");
?>
  <body id="page-top" class="sidebar-toggled">



      <!-- Navbar -->
        <?php
        include_once ("includes/navigation.php");
        ?>

    <div id="wrapper">

      <!-- Sidebar -->
        <?php
        include_once ("includes/sidebar.php");
        ?>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.php">Eatwell Dashboard</a>
            </li>
            <li class="breadcrumb-item active"><?php echo $page_title;?></li>
          </ol>

            <?php
            include_once ("../includes/connection.php");
            if(isset($_GET['source'])){
                $source = $_GET['source'];
            }else{
                $source="";
            }
            switch ($source){
                case "served":
                    if(isset($_GET['order_id'])){
                        $order_id = $_GET['order_id'];
                        $query = "UPDATE ordered_food SET food_status = 'served' WHERE  order_id= $order_id";
                        mysqli_query($connection,$query);
                    }
                    include_once ("pages/ordered-food/view-all-orders.php");
                    break;
                case "pending":
                    if(isset($_GET['order_id'])){
                        $order_id = $_GET['order_id'];
                        $query = "UPDATE ordered_food SET food_status = 'pending' WHERE  order_id = $order_id";
                        mysqli_query($connection,$query);
                    }
                    include_once ("pages/ordered-food/view-all-orders.php");
                    break;
                default:
                    include_once ("pages/ordered-food/view-all-orders.php");
            }
            ?>



        </div>
        <!-- /.container-fluid -->

          <?php
          include_once ("includes/footer.php");
          ?>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

        <?php
            include_once ("includes/scripts_btn_to_top.php");
        ?>


  </body>

</html>
