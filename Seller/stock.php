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
    <title>Stock</title>

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

    <script type="text/javascript">
        function filterB()
        {
            //alert("Brand");
            val= document.getElementById('stock').value.toLowerCase();

            if(val == "")
            {
                document.getElementById('stkfield').innerHTML = "Please Enter Keyword before filter";
            }
            else
            {
                document.getElementById('stkfield').innerHTML = "";
                if (window.XMLHttpRequest) {
                    xmlhttp = new XMLHttpRequest();
                } else{
                    xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
                }

                xmlhttp.onreadystatechange= function(){
                if (this.readyState==4 && this.status==200) {
                    document.getElementById('stockTable').innerHTML = this.responseText;
                }
                }
                xmlhttp.open("GET","getStockTable.php?value=1&val="+val, true);
                xmlhttp.send();
            }
        }
        function filterC()
        {
            //alert("Category");
            val= document.getElementById('stock').value.toLowerCase();
            if(val == "")
            {
                document.getElementById('stkfield').innerHTML = "Please Enter Keyword before filter";
            }
            else
            {
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } else{
                xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange= function(){
            if (this.readyState==4 && this.status==200) {
                document.getElementById('stockTable').innerHTML = this.responseText;
            }
            }
            xmlhttp.open("GET","getStockTable.php?value=2&val="+val, true);
            xmlhttp.send();
            }
        }
        function filterP()
        {
            //alert("Product");
            val= document.getElementById('stock').value.toLowerCase();
            if(val == "")
            {
                document.getElementById('stkfield').innerHTML = "Please Enter Keyword before filter";
            }
            else
            {
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } else{
                xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange= function(){
            if (this.readyState==4 && this.status==200) {
                document.getElementById('stockTable').innerHTML = this.responseText;
            }
            }
            xmlhttp.open("GET","getStockTable.php?value=3&val="+val, true);
            xmlhttp.send();
            }
        }
    </script>

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
                        <li class="has-sub">
                            <a class="js-arrow" href="index.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                           
    
                        </li>
                        <li class="active has-sub">
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
                        <li>
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
                <form class="form-header" action="" method="POST">
                    <input class="au-input au-input--xl" type="text" name="stock" id="stock" placeholder="Search for Stock" style="margin-left: 150px" value="" />
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"style="background-color: #4272D7; color: white;height: 43px;">
						<span class="fas fa-filter"></span>
					</a>
					<div class="dropdown-menu" >
                        <!--<select name='select1' id='select1' class='form-control' style='margin-top: 7px;margin-right: 50px;width:600px'>;
                        <option value='brand'>Brand</option>;
                        <option value='category'>Category</option>;
                        <option value='product'>Product</option>;
                    </select>-->
						<a class="dropdown-item" href="#" onclick="filterB();">Brand</a>
						<a class="dropdown-item" href="#" onclick="filterC();">Category</a>
						<a class="dropdown-item" href="#" onclick="filterP();">Product</a>
					</div>
                    <!-- <button class="au-btn--submit" type="submit" style="margin-left: 5px;background-color: #FFC107"  >
                        <i class="zmdi zmdi-search"></i>
                    </button>-->
                    <form>
                    	<input type="button" name="addstock" value="+ Add Stock" style="width:140px;margin-left: 300px;background-color: #28A745 ;color:white" onclick="window.location.href = 'addStock.php'">
                    </form>
                </form>

                    <span id="stkfield" style="color: red;font-size: 20px;margin-left: 200px;"></span>
                <div class="col-lg-9" style="margin-top: 10px; width: 800px">
                                <h2 class="title-1 m-b-25">Stock</h2>
                                <div  style="width: 300px">
                                <?php
                                   echo "<table class='table table-borderless table-striped table-earning' style='width:1175px'>";
                                        echo "<thead>";
                                            echo "<tr>";
                                                echo "<th style='width:35px'>product ID</th>";
                                                echo "<th style='width:35px'>Name</th>";
                                                echo "<th style='width:35px'>category</th>";
                                                echo "<th style='width:35px'>brand</th>";
                                                echo "<th style='width:35px'>price</th>";
                                                echo "<th style='width:35px'>quantity(KG or units)</th>";
                                            echo "</tr>";
                                        echo "</thead>";
                                        echo "<tbody id='stockTable' name='stockTable'>";

                                        $sql = "select prod_id,name,category_id,brand_id,price,stock from product_details where seller_id=".$_SESSION['seller_id']." and stock < 15";
                                        $result = mysqli_query($conn,$sql);
                                        while ($row=mysqli_fetch_array($result)) {
                                            $sql2 = "select category from product_category where category_id=".$row['category_id'];
                                            $result2 = mysqli_query($conn,$sql2);
                                            $row2=mysqli_fetch_array($result2);


                                            $sql3 = "select brand from brand where brand_id=".$row['brand_id'];
                                            $result3 = mysqli_query($conn,$sql3);
                                            $row3=mysqli_fetch_array($result3);

                                            echo "<tr>";
                                            echo "<td>".$row['prod_id']."</td>";
                                            echo "<td>".$row['name']."</td>";
                                            echo "<td>".$row2['category']."</td>";
                                            echo "<td>".$row3['brand']."</td>";
                                            echo "<td>".$row['price']."</td>";
                                            echo "<td style='color: red;'>".$row['stock']."</td>";
                                            echo "</tr>";
                                        }
                                        mysqli_close($conn);
                                        echo "</tbody>";
                                    echo "</table>";
                                 ?>
                                    
                                </div>
                            </div>            </div>
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

</body>

</html>
<!-- end document-->
