<?php
    
    session_start();
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "iwt_groceryproject";

    $conn = mysqli_connect($server,$user,$pass,$db);

    if(isset($_SESSION['seller_id']))
    {
        $sql = "select name,email from seller_details where seller_id='".$_SESSION['seller_id']."'";

        $result = mysqli_query($conn,$sql);

        $row = mysqli_fetch_array($result);

        if(is_array($row))
        {
            $name = $row['name'];
            $email = $row['email'];
            //$contact = $row['contact'];
            
        }
    }
        else
        {
            header('location: login.php');    
        }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Report</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.php">
                            <img src="images/icon/logo.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="index.php">Dashboard 1</a>
                                </li>
                                <li>
                                    <a href="index2.php">Dashboard 2</a>
                                </li>
                                <li>
                                    <a href="index3.php">Dashboard 3</a>
                                </li>
                                <li>
                                    <a href="index4.php">Dashboard 4</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="chart.php">
                                <i class="fas fa-chart-bar"></i>Charts</a>
                        </li>
                        <li>
                            <a href="table.php">
                                <i class="fas fa-table"></i>Tables</a>
                        </li>
                        <li>
                            <a href="form.php">
                                <i class="far fa-check-square"></i>Forms</a>
                        </li>
                        <li>
                            <a href="calendar.php">
                                <i class="fas fa-calendar-alt"></i>Calendar</a>
                        </li>
                        <li>
                            <a href="map.php">
                                <i class="fas fa-map-marker-alt"></i>Maps</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Pages</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="login.php">Login</a>
                                </li>
                                <li>
                                    <a href="register.php">Register</a>
                                </li>
                                <li>
                                    <a href="forget-pass.php">Forget Password</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>UI Elements</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="button.php">Button</a>
                                </li>
                                <li>
                                    <a href="badge.php">Badges</a>
                                </li>
                                <li>
                                    <a href="tab.php">Tabs</a>
                                </li>
                                <li>
                                    <a href="card.php">Cards</a>
                                </li>
                                <li>
                                    <a href="alert.php">Alerts</a>
                                </li>
                                <li>
                                    <a href="progress-bar.php">Progress Bars</a>
                                </li>
                                <li>
                                    <a href="modal.php">Modals</a>
                                </li>
                                <li>
                                    <a href="switch.php">Switchs</a>
                                </li>
                                <li>
                                    <a href="grid.php">Grids</a>
                                </li>
                                <li>
                                    <a href="fontawesome.php">Fontawesome Icon</a>
                                </li>
                                <li>
                                    <a href="typo.php">Typography</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="images/icon/logo.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="index.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                           
    
                        </li>
                        <li>
                            <a href="stock.php">
                                <i class="fas fa-book"></i>Stock</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-shopping-cart"></i>Orders</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="order_history.php">Order History</a>
                                </li>
                                <li>
                                    <a href="pending_orders.php">Pending Orders</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-archive"></i>Product Management</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="existing_products.php">Existing Products</a>
                                </li>
                                <li>
                                    <a href="add_new_product.php">Add New Product</a>
                                </li>
                                
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a href="deliveryMgmt.php">
                                <i class="fas fa-map-marker-alt"></i>Delivery Management</a>
                        </li>
                        <li>
                            <a href="calendar.php">
                                <i class="fas fa-credit-card"></i>Payment Management</a>
                        </li>
                        <li>
                            <a href="creditSys.php">
                                <i class="far fa-pencil-square-o"></i>Credit System</a>
                        </li>
                        
                        
                        
                        <li>
                            <a href="grid.php">
                                <i class="fas fa-bullhorn"></i>Offers</a>
                        </li>
                        
                    </ul>
                </nav>            
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                    
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="images/icon/avatar-01.jpg" alt="seller" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?php echo $name ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="images/icon/avatar-01.jpg" alt="seller" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?php echo $name ?></a>
                                                    </h5>
                                                    <span class="email"><?php echo $email ?></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="adminMYaccount.php">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="report.php">
                                                        <i class="zmdi zmdi-chart"></i>Report</a>
                                                </div>

                                                <div class="account-dropdown__item">
                                                    <a href="cntrlPanel.php">
                                                        <i class="fa fa-gear"></i>Control Panel</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="login.php">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="card" style="width: 1200px">
                                
                                    <div class='row form-group'style='margin-left: 20px'>

                                        <div class='col col-md-3'>
                                            <br>
                                            <STRONG><label class= 'form-control-label'>Total Credit Amount</label></STRONG>
                                        </div>
                                        <div class='col-12 col-md-9'>
                                            <br>
                                            <?php
                                            $sql="select sum(current_due_amt) from credit_customers where seller_id=".$_SESSION['seller_id'];
                                            $result=mysqli_query($conn,$sql);
                                            $row=mysqli_fetch_array($result);
                                            echo "<span class='help-block'>".$row['sum(current_due_amt)']." Rs</span>";
                                            ?>
                                        </div>

                                        <div class='col col-md-3'>
                                            <STRONG><label class= 'form-control-label'>Today Orders</label></STRONG>
                                        </div>
                                        <div class='col-12 col-md-9'>
                                            <?php
                                            $sql="select count(date) from orders_log where seller_id=".$_SESSION['seller_id']." and date=CURRENT_DATE()";
                                            $result=mysqli_query($conn,$sql);
                                            $row=mysqli_fetch_array($result);
                                            echo "<span class='help-block'>".$row['count(date)']." </span>";
                                            ?>
                                        </div>

                                        <div class='col col-md-3'>
                                            <STRONG><label class= 'form-control-label'>Today Turnover</label></STRONG>
                                        </div>
                                        <div class='col-12 col-md-9'>
                                            <?php
                                            $sql="select sum(total_amt) from orders_log where seller_id=".$_SESSION['seller_id']." and date=CURRENT_DATE()";
                                            $result=mysqli_query($conn,$sql);
                                            $row=mysqli_fetch_array($result);
                                            echo "<span class='help-block'>".$row['sum(total_amt)']." Rs</span>";
                                            ?>
                                        </div>


                                        <div class='col col-md-3'>
                                            <STRONG><label class= 'form-control-label'>Number of Products in Shop</label></STRONG>
                                        </div>
                                        <div class='col-12 col-md-9'>
                                            <?php
                                            $sql="select count(prod_id) from product_details where seller_id=".$_SESSION['seller_id'];
                                            $result=mysqli_query($conn,$sql);
                                            $row=mysqli_fetch_array($result);
                                            echo "<span class='help-block'>".$row['count(prod_id)']."</span>";
                                            ?>
                                        </div>

                                        <div class='col col-md-3'>
                                            <STRONG><label class= 'form-control-label'>Number of Credited Customers</label></STRONG>
                                        </div>
                                        <div class='col-12 col-md-9'>
                                            <?php
                                            $sql="select count(cust_id) from credit_customers where seller_id=".$_SESSION['seller_id']." and current_due_amt>0";
                                            $result=mysqli_query($conn,$sql);
                                            $row=mysqli_fetch_array($result);
                                            echo "<span class='help-block'>".$row['count(cust_id)']."</span>";
                                            ?>
                                        </div>

                                    </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="au-card m-b-30">
                                    <div class="au-card-inner">
                                        <h3 class="title-2 m-b-40">Monthly Turnover(Past Year)</h3>
                                        <canvas id="team-charts"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="au-card m-b-30">
                                    <div class="au-card-inner">
                                        <h3 class="title-2 m-b-40">Days wise Turnover</h3>
                                        <canvas id="singelBarChartd"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="au-card m-b-30">
                                    <div class="au-card-inner">
                                        <h3 class="title-2 m-b-40">Order Type(Active)</h3>
                                        <canvas id="singelBarChartss"></canvas>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="au-card chart-percent-card">
                                    <div class="au-card-inner">
                                        <h3 class="title-2 tm-b-5">Orders</h3>
                                        <div class="row no-gutters">
                                            <div class="col-xl-6">
                                                <div class="chart-note-wrap">
                                                    <div class="chart-note mr-0 d-block">
                                                        <span class="dot dot--blue"></span>
                                                        <span>Executed Orders</span>
                                                    </div>
                                                    <div class="chart-note mr-0 d-block">
                                                        <span class="dot dot--red"></span>
                                                        <span>Cancelled Orders</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="percent-chart">
                                                    <canvas id="percent-chart22"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        
                        </div>
                        <div class="row">
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
        </div>
        <!-- END PAGE CONTAINER-->

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>
    <?php

    //Singlebarchartd
    
    //

    //Teamcharts
    $transdate = date('Y-m-d', time());
    $year = date('Y', strtotime($transdate));
    $year--; 
    $arry=[];                    
$sql="select sum(total_amt) from orders_log where seller_id=".$_SESSION['seller_id']." and YEAR(date)=".$year." and MONTH(date)=01";                                         
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    $arry[0]=$row['sum(total_amt)'];
$sql="select sum(total_amt) from orders_log where seller_id=".$_SESSION['seller_id']." and YEAR(date)=".$year." and MONTH(date)=02";                                         
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    $arry[1]=$row['sum(total_amt)'];
$sql="select sum(total_amt) from orders_log where seller_id=".$_SESSION['seller_id']." and YEAR(date)=".$year." and MONTH(date)=03";                                         
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    $arry[2]=$row['sum(total_amt)'];
$sql="select sum(total_amt) from orders_log where seller_id=".$_SESSION['seller_id']." and YEAR(date)=".$year." and MONTH(date)=04";                                         
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    $arry[3]=$row['sum(total_amt)'];
$sql="select sum(total_amt) from orders_log where seller_id=".$_SESSION['seller_id']." and YEAR(date)=".$year." and MONTH(date)=05";                                         
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    $arry[4]=$row['sum(total_amt)'];
$sql="select sum(total_amt) from orders_log where seller_id=".$_SESSION['seller_id']." and YEAR(date)=".$year." and MONTH(date)=06";                                         
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    $arry[5]=$row['sum(total_amt)'];
$sql="select sum(total_amt) from orders_log where seller_id=".$_SESSION['seller_id']." and YEAR(date)=".$year." and MONTH(date)=07";                                         
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    $arry[6]=$row['sum(total_amt)'];
$sql="select sum(total_amt) from orders_log where seller_id=".$_SESSION['seller_id']." and YEAR(date)=".$year." and MONTH(date)=08";                                         
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    $arry[7]=$row['sum(total_amt)'];
$sql="select sum(total_amt) from orders_log where seller_id=".$_SESSION['seller_id']." and YEAR(date)=".$year." and MONTH(date)=09";                                         
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    $arry[8]=$row['sum(total_amt)'];
$sql="select sum(total_amt) from orders_log where seller_id=".$_SESSION['seller_id']." and YEAR(date)=".$year." and MONTH(date)=10";                                         
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    $arry[9]=$row['sum(total_amt)'];
$sql="select sum(total_amt) from orders_log where seller_id=".$_SESSION['seller_id']." and YEAR(date)=".$year." and MONTH(date)=11";                                         
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    $arry[10]=$row['sum(total_amt)'];
$sql="select sum(total_amt) from orders_log where seller_id=".$_SESSION['seller_id']." and YEAR(date)=".$year." and MONTH(date)=12";                                         
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    $arry[11]=$row['sum(total_amt)'];


    //


    //singlebarchartss
    $sqlcod="select count(order_id) from orders_log where seller_id=".$_SESSION['seller_id']." and status=2";
    $resultcod=mysqli_query($conn,$sqlcod);
    $rowcod=mysqli_fetch_array($resultcod);
    $sqlcre="select count(order_id) from orders_log where seller_id=".$_SESSION['seller_id']." and status=1";
    $resultcre=mysqli_query($conn,$sqlcre);
    $rowcre=mysqli_fetch_array($resultcre);
    
    
    //



    //presentgraph22
    $sqle="select count(status) from orders_log where seller_id=".$_SESSION['seller_id']." and status in(1,2)";

    
              $resulte=mysqli_query($conn,$sqle);
              $rowe=mysqli_fetch_array($resulte);

              $sqlc="select count(status) from orders_log where seller_id=".$_SESSION['seller_id']." and status=0";
              $resultc=mysqli_query($conn,$sqlc);
              $rowc=mysqli_fetch_array($resultc);

    //


    //Singlebarchartd
    $sql="select date,total_amt from orders_log where seller_id=".$_SESSION['seller_id'];
    $result=mysqli_query($conn,$sql);
    
    //$row=mysqli_fetch_array($result);
    $arrD=[0,0,0,0,0,0,0];
    while($row=mysqli_fetch_array($result))
    {
        //Our YYYY-MM-DD date string.
        $date = $row['date'];
         
        //Convert the date string into a unix timestamp.
        $unixTimestamp = strtotime($date);
         
        //Get the day of the week using PHP's date function.
        $dayOfWeek = date("l", $unixTimestamp);
         
        //Print out the day that our date fell on.
        if($dayOfWeek=="Sunday")
        {
            $arrD[0]+=$row['total_amt'];
        }
        if($dayOfWeek=="Monday")
        {
         $arrD[1]+=$row['total_amt'];   
        }
        if($dayOfWeek=="Tuesday")
        {
            $arrD[2]+=$row['total_amt'];
        }
        if($dayOfWeek=="Wednesday")
        {
            $arrD[3]+=$row['total_amt'];
        }
        if($dayOfWeek=="Thursday")
        {
            $arrD[4]+=$row['total_amt'];
        }
        if($dayOfWeek=="Friday")
        {
            $arrD[5]+=$row['total_amt'];
        }
        if($dayOfWeek=="Saturday")
        {
            $arrD[6]+=$row['total_amt'];
        }
    }


    //
    echo "

    <script>
    (function ($) {
    // USE STRICT
    'use strict';




    //Team charts
    var ctx = document.getElementById('team-charts');
    if (ctx) {
      ctx.height = 150;
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ['Jan', 'Feb', 'Mar', 'Apr','May','Jun', 'Jul', 'Aug','Sep','Oct','Nov','Dec'],
          type: 'line',
          defaultFontFamily: 'Poppins',
          datasets: [{
            data: [".$arry[0].",".$arry[1].",".$arry[2].",".$arry[3].",".$arry[4].",".$arry[5].",".$arry[6].",".$arry[7].",".$arry[8].",".$arry[9].",".$arry[10].",".$arry[11]."],
            label: 'Turnover in Rs',
            backgroundColor: 'rgba(0,103,255,.15)',
            borderColor: 'rgba(0,103,255,0.5)',
            borderWidth: 3.5,
            pointStyle: 'circle',
            pointRadius: 5,
            pointBorderColor: 'transparent',
            pointBackgroundColor: 'rgba(0,103,255,0.5)',
          },]
        },
        options: {
          responsive: true,
          tooltips: {
            mode: 'index',
            titleFontSize: 12,
            titleFontColor: '#000',
            bodyFontColor: '#000',
            backgroundColor: '#fff',
            titleFontFamily: 'Poppins',
            bodyFontFamily: 'Poppins',
            cornerRadius: 3,
            intersect: false,
          },
          legend: {
            display: false,
            position: 'top',
            labels: {
              usePointStyle: true,
              fontFamily: 'Poppins',
            },


          },
          scales: {
            xAxes: [{
              display: true,
              gridLines: {
                display: false,
                drawBorder: false
              },
              scaleLabel: {
                display: false,
                labelString: 'Month'
              },
              ticks: {
                fontFamily: 'Poppins'
              }
            }],
            yAxes: [{
              display: true,
              gridLines: {
                display: false,
                drawBorder: false
              },
              scaleLabel: {
                display: true,
                labelString: 'Turnover',
                fontFamily: 'Poppins'
              },
              ticks: {
                fontFamily: 'Poppins'
              }
            }]
          },
          title: {
            display: false,
          }
        }
      });
    }





    //singelBarChartss
    var ctx = document.getElementById('singelBarChartss');
    if (ctx) {
      ctx.height = 150;
      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ['COD Orders', 'Credit Ordrers'],
          datasets: [
            {
              label: 'Completed Orders',
              data: [".$rowcod['count(order_id)'].",".$rowcre['count(order_id)']."],
              backgroundColor: [
                '#00b5e9',
                '#fa4251'
              ],
              borderColor: 'rgba(0, 123, 255, 0.9)',
              borderWidth: '0',
              backgroundColor: 'rgba(0, 123, 255, 0.5)'
            }
          ]
        },
        options: {
          legend: {
            position: 'top',
            labels: {
              fontFamily: 'Poppins'
            }

          },
          scales: {
            xAxes: [{
              ticks: {
                fontFamily: 'Poppins'

              }
            }],
            yAxes: [{
              ticks: {
                beginAtZero: true,
                fontFamily: 'Poppins'
              }
            }]
          }
        }
      });
    }




    //percent-chart22
    var ctx = document.getElementById('percent-chart22');
        
    if (ctx) {

      ctx.height = 280;
      var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
          datasets: [
            {
              label: 'My First datase',

              data: [".$rowe['count(status)'].",".$rowc['count(status)']."],
              backgroundColor: [
                '#00b5e9',
                '#fa4251'
              ],
              hoverBackgroundColor: [
                '#00b5e9',
                '#fa4251'
              ],
              borderWidth: [
                0, 0
              ],
              hoverBorderColor: [
                'transparent',
                'transparent'
              ]
            }
          ],
          labels: [
            'Executed',
            'Cancelled'
          ]
        },
        options: {
          maintainAspectRatio: false,
          responsive: true,
          cutoutPercentage: 55,
          animation: {
            animateScale: true,
            animateRotate: true
          },
          legend: {
            display: false
          },
          tooltips: {
            titleFontFamily: 'Poppins',
            xPadding: 15,
            yPadding: 10,
            caretPadding: 0,
            bodyFontSize: 16
          }
        }
      });

    }






    //Singlebarchartd
    var ctx = document.getElementById('singelBarChartd');
    if (ctx) {
      ctx.height = 150;
      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
          datasets: [
            {
              label: 'Turnover in Rs',
              data: [".$arrD[0].",".$arrD[1].",".$arrD[2].",".$arrD[3].",".$arrD[4].",".$arrD[5].",".$arrD[6]."],
              borderColor: 'rgba(0, 123, 255, 0.9)',
              borderWidth: '0',
              backgroundColor: 'rgba(0, 123, 255, 0.5)'
            }
          ]
        },
        options: {
          legend: {
            position: 'top',
            labels: {
              fontFamily: 'Poppins'
            }

          },
          scales: {
            xAxes: [{
              ticks: {
                fontFamily: 'Poppins'

              }
            }],
            yAxes: [{
              ticks: {
                beginAtZero: true,
                fontFamily: 'Poppins'
              }
            }]
          }
        }
      });
    }


    })(jQuery);
    </script>

    ";
    ?>

</body>

</html>
<!-- end document-->
