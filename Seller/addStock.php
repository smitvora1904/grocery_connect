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

        $price = "***price***";
        $stock = "***units***";
    }
    else
    {
        header('location: login.php');    
    }

    /*if(isset($_GET['b1']))
    {
        echo "<script>alert(".$_GET['stockIn'].");</script>";
    }*/

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
    <title>Add Stock</title>

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
        function formValidation()
        {
            var s1= document.getElementById("select1").value;
            var s2= document.getElementById("select2").value;
            var s3= document.getElementById("select3").value;
            var stk= document.getElementById("stockIn");

            if(s1==0)
            {
                document.getElementById("s1").innerHTML= "Enter Category";
                //s1.focus();
                return false;
            }
            else
            {
                document.getElementById("s1").innerHTML= "";
            }



            if(s2==0)
            {
                document.getElementById("s2").innerHTML= "Enter Brand";
                //s2.focus();
                return false;
            }
            else
            {
                document.getElementById("s2").innerHTML= "";
            }

            if(s3==0)
            {
                document.getElementById("s3").innerHTML= "Enter Product";
                //s3.focus();
                return false;
            }
            else
            {
                document.getElementById("s3").innerHTML= "";
            }

            var ptrn = /[0-9]/;
            if(!(stk.value.match(ptrn)))
            {
                alert("Stock can only be in numbers!!");
            }
            else
            {

            }
            
        }

    function pageRef()
    {
        document.location.reload();
    }

    function my_fun(str) {

    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else{
        xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange= function(){
        if (this.readyState==4 && this.status==200) {
            document.getElementById('select2').innerHTML = this.responseText;
        }
    }
    xmlhttp.open("GET","getBrand.php?value="+str, true);
    xmlhttp.send();
}
function my_fun2(str) {
    //console.log(str);
    var s1= document.getElementById("select1").value;
    //console.log(s1);
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else{
        xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange= function(){
        if (this.readyState==4 && this.status==200) {
            document.getElementById('select3').innerHTML = this.responseText;
        }
    }
    xmlhttp.open("GET","getProduct.php?br="+str+"&cr="+s1, true);
    xmlhttp.send();

}
function my_fun3(str) {
    var stk= document.getElementById("stockIn");
    stk.disabled=false;
    console.log(str);
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else{
        xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange= function(){
        if (this.readyState==4 && this.status==200) {
            document.getElementById('data').innerHTML = this.responseText;
        }
    }
    xmlhttp.open("GET","getProductData.php?pid="+str, true);
    xmlhttp.send();
}

    </script>
<!--
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(function() {
            $("#select1").change(function(){
                //$('.brandRow').remove();
                if($("#select1").val() != 0) {
                    console.log($("#select1").val());
                    $.get("getBrand.php",{category_id: $("#select1").val()})
                    .done(function(data){
                        $("tr.catRow").after(data);
                    });
            }
            });
        });
    </script>
-->
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
                <div class="col-lg-6" >
                                <div class="card"style="width: 900px;margin-left:100px">
                                    <div class="card-header">
                                        <strong>Add Stock</strong>
                                    </div>
                                    <form action="getProductData.php" method="get" enctype="multipart/form-data" id = "stkform" name="stkForm" onsubmit="return formValidation();">
                                    <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label style="margin-left: 20px;margin-top: 25px;" class=" form-control-label">Category</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <?php
                                                    echo "<select name='select1' id='select1' class='form-control' style='margin-top: 7px;margin-right: 50px;width:600px' onchange='my_fun(this.value);'>";
                                                        echo "<option value='0'>Please select</option>";
                                                         $sql = "select * from product_category";

                                                                $result = mysqli_query($conn,$sql);
                                                                while($row = mysqli_fetch_array($result)) {
                                                                    echo "<option value=".$row['category_id'].">".$row['category']."</option>";
                                                                }
                                                    echo "</select>";
                                                    ?>
                                                    <span id="s1" style="color: red"></span>
                                                </div>
                                    </div>

                                    <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label" style="margin-left: 20px;margin-top: 10px;">Brand</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <?php
                                                    echo "<select name='sb' id='select2' class='form-control' style='margin-top: 10px;margin-right: 50px;width:600px' onchange='my_fun2(this.value);'>";
                                                        echo "<option value='0'>Please select</option>";
                                                    
                                                   /* $sql = "select * from brand";

                                                                $result = mysqli_query($conn,$sql);
                                                                while($row = mysqli_fetch_array($result))
                                                                    {
                                                                        echo "<option value=".$row['brand_id'].">".$row['brand']."</option>";
                                                                    }*/
                                                    echo "</select>";
                                                    ?>
                                                    <span id="s2" style="color: red"></span>
                                                </div>
                                    </div>
                                    
                                    <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label" style="margin-left: 20px;margin-top: 10px;">Product</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <?php
                                                    echo "<select name='sp' id='select3' class='form-control' style='margin-top: 10px;margin-right: 50px;width:600px' onchange='my_fun3(this.value);'>";
                                                        echo "<option value='0'>Please select</option>";
                                                     /*   $sql = "select prod_id,name from product_details where seller_id=".$_SESSION['seller_id'];

                                                                $result = mysqli_query($conn,$sql);
                                                                while($row = mysqli_fetch_array($result))
                                                                    {
                                                                        echo "<option value=".$row['prod_id'].">".$row['name']."</option>";
                                                                    }*/
                                                    echo "</select>";
                                                    ?>
                                                    <span id="s3" style="color: red"></span>
                                                </div>
                                    </div>

                                    <div class="row form-group" style="margin-left: 20px;margin-top: 10px;">
                                        
                                       
                                    </div>
                                    <div class="card-body card-block">
                                        <p id="data"></p>
                                           
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Add Units</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="stockIn" name="stockIn" placeholder="20" class="form-control" disabled="True" style="margin-right: 50px;width:600px" required="true">
                                                    <small class="form-text text-muted">Enter Units of Item to be added to stock.</small>
                                                </div>
                                            </div>
                                            
                                
                                            
                                            
                                        
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" name="b1" class="btn btn-primary btn-sm" onclick="formValidation();">
                                            <i class="fa fa-dot-circle-o" ></i> Submit
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm" onclick="pageRef();">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>
                                    </div>
                                    </form>
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

</body>

</html>
<!-- end document-->