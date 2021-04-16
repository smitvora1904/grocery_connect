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
                if(isset($_POST['update_product']))
        {
            $category=$_POST['selectgc'];
            $brand=$_POST['selectgb'];
            $proname=$_POST['proname'];
            $price=$_POST['proprice'];
            $description=$_POST['prodescription'];
            $prr=$_SESSION['currentproduct'];
            $filee = $_FILES['ff']['name'];
        $target_dir = "uploads/";

        $target_file = $target_dir.basename($_FILES['ff']['name']);

        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        $extension_arr = array("jpg","jpeg","png","gif","jfif");
        if(in_array($imageFileType, $extension_arr))
        {
            $sql = "update product_details set photo='".$target_file."', brand_id=".$brand.",category_id=".$category.",name='".$proname."',price=".$price.",description='".$description."' where prod_id=".$prr." and seller_id=".$_SESSION['seller_id'];
            
            mysqli_query($conn,$sql);
            move_uploaded_file($_FILES['ff']['tmp_name'], $target_dir.$filee);      
        }
        else
        {
            $sql = "update product_details set brand_id=".$brand.",category_id=".$category.",name='".$proname."',price=".$price.",description='".$description."' where prod_id=".$prr." and seller_id=".$_SESSION['seller_id'];
            mysqli_query($conn,$sql);

        }
            
            

        }

        if(isset($_POST['delete_product']))
        {
            $prr=$_SESSION['currentproduct'];

            $sql = "delete from product_details where prod_id=".$prr." and seller_id=".$_SESSION['seller_id'];
            mysqli_query($conn,$sql);
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
    <title>Existing Products</title>

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
        var flag_setval=0;
                                            function formValidation()
                                            {
                                                var sc = document.getElementById("sc").value;
                                                var sb = document.getElementById("sb").value;
                                                var sp = document.getElementById("sp").value;

                                                if(sc==0)
                                                {
                                                    //salert("yes");
                                                    console.log("sc=0");
                                                    document.getElementById("scs").innerHTML= "Enter Category";
                                                    //sc.focus();
                                                    return false;
                                                }
                                                else
                                                {
                                                    console.log("sc!=0");
                                                    document.getElementById("scs").innerHTML= "";
                                                }

                                                if(sb==0)
                                                {
                                                    document.getElementById("sbs").innerHTML= "Enter Brand";
                                                    //sb.focus();
                                                    return false;
                                                }
                                                else
                                                {
                                                    document.getElementById("sbs").innerHTML= "";
                                                }

                                                if(sp==0)
                                                {
                                                    document.getElementById("sps").innerHTML= "Enter Product";
                                                    //sp.focus();
                                                    return false;
                                                }
                                                else
                                                {
                                                    document.getElementById("sps").innerHTML= "";
                                                }
                                            }

            var set_category;
                                            var set_brand;
                                            var set_product;
                                            function setval()
                                            {
                                                var e=document.getElementById("sc");
                                                set_category = e.options[e.selectedIndex].value;
                                                

                                                e=document.getElementById("sb");
                                                set_brand = e.options[e.selectedIndex].value;
                                                

                                                e=document.getElementById("sp");
                                                set_product = e.options[e.selectedIndex].value;
                                                document.getElementById("ok").disabled=false;

                                                alert(set_category);
                                                alert(set_brand);
                                                alert(set_product);
                                                

                                            }
                                            function getval() {
                                                //document.getElementById("tx2").value = "BMW";
                                                document.getElementById('tx1').innerHTML = "18";
                                                document.getElementById('gc').selectedIndex = set_category;
                                                document.getElementById('gb').selectedIndex = set_brand;
                                                document.getElementById('gp').selectedIndex = set_product;
                                                document.getElementById('tx2').value = "180";
                                                document.getElementById('tx3').value = "This is an amazing product for the home made purpose and had a global customer review of 4.9 Stars out of 5";
                                                document.getElementById('product_img').style.visibility="visible";
                                                document.getElementById('update_product').disabled=false;
                                                document.getElementById('delete_product').disabled=false;
                                                //document.getElementById("tx1").disabled=false;
                                            }
                                            

                                            function checksval()
                                        {


                                            var gc=document.getElementById("gc").value;
                                            var gb=document.getElementById("gb").value;
                                            var gp=document.getElementById("gp").value;

                                            if(gc==0)
                                                {

                                                    document.getElementById("gcs").innerHTML= "Enter Category";
                                                   // gc.focus();
                                                    return false;
                                                }
                                                else
                                                {
                                                    document.getElementById("gcs").innerHTML= "";
                                                }

                                                if(gb==0)
                                                {
                                                    document.getElementById("gbs").innerHTML= "Enter Brand";
                                                    //gb.focus();
                                                    return false;
                                                }
                                                else
                                                {
                                                    document.getElementById("gbs").innerHTML= "";
                                                }

                                                if(gp==0)
                                                {
                                                    document.getElementById("gps").innerHTML= "Enter Product";
                                                   // gp.focus();
                                                    return false;
                                                }
                                                else
                                                {
                                                    document.getElementById("gps").innerHTML= "";
                                                }



                                                var tx2=document.getElementById("tx2");
                                                var tx3=document.getElementById("tx3");


                                           
                                                var tx3_length= tx3.value.length;
                                                if(tx3_length==0)
                                                {
                                                    document.getElementById("tx3s").innerHTML= "Enter Description";
                                                    tx3.focus();
                                                    return false;
                                                }
                                                else
                                                {
                                                    document.getElementById("tx3s").innerHTML= "";
                                                }
                                                return true;

                                        }
                                        
                                        function submitfile()
                                        {

                                            
                                        }
    function my_fun(str) {
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else{
        xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange= function(){
        if (this.readyState==4 && this.status==200) {
            document.getElementById('sb').innerHTML = this.responseText;
        }
    }
    xmlhttp.open("GET","getBrand.php?value="+str, true);
    xmlhttp.send();

    
}
    function my_fun2(str) {
    //console.log(str);
    var s1= document.getElementById("sc").value;
    //console.log(s1);
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else{
        xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange= function(){
        if (this.readyState==4 && this.status==200) {
            document.getElementById('sp').innerHTML = this.responseText;
        }
    }
    xmlhttp.open("GET","getProduct.php?br="+str+"&cr="+s1, true);
    xmlhttp.send();

}

function my_fun3(str) {
    var s1= document.getElementById("sc").value;
    var s2= document.getElementById("sb").value;
    //console.log(s1);
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else{
        xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange= function(){
        if (this.readyState==4 && this.status==200) {
            document.getElementById('regform2').innerHTML = this.responseText;
        }
    }
    xmlhttp.open("GET","getExistingProduct.php?pr="+str+"&br="+s2+"&cr="+s1, true);
    xmlhttp.send();
    
}

function my_fun4(){
    document.getElementById("gc").disabled=false;
    var pid= document.getElementById("productid");
    
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
                        <li class="active has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-archive"></i>Product Management</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li class="active has-sub">
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
                    <form action="" method="post" id = "regform" name="registerForm" onsubmit="return formValidation();">
                                <div class="card"style="width: 900px;margin-left:100px">

                                    <div class="card-header">
                                        <strong>Existing Product</strong>
                                    </div>

                                    <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label style="margin-left: 20px;margin-top: 10px;" class=" form-control-label">Category</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    
                                                    <?php
                                                    echo "<select name='selectc' id='sc' class='form-control' style='margin-top: 10px;margin-right: 50px;width:600px' onchange='my_fun(this.value);'>";
                                                        echo"<option value='0'>Please select</option>";
                                                        $sql = "select * from product_category";
                                                        $result=mysqli_query($conn,$sql);
                                                        while($row = mysqli_fetch_array($result)){
                                                            echo "<option value=".$row['category_id'].">".$row['category']."</option>";
                                                        }
                                                    echo "</select>";
                                                    ?>
                                                    <span id="scs" style="color: red"></span>
                                                </div>
                                    </div>

                                    <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label" style="margin-left: 20px;margin-top: 10px;">Brand</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <?php
                                                    echo"<select name='selectb' id='sb' class='form-control' style='margin-top: 10px;margin-right: 50px;width:600px' onchange='my_fun2(this.value);'>";
                                                        echo "<option value='0'>Please select</option>";
                                                    echo"</select>";
                                                    ?>
                                                    <span id="sbs" style="color: red"></span>
                                                </div>
                                    </div>
                                    
                                    <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label" style="margin-left: 20px;margin-top: 10px;">Product</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <?php
                                                    echo "<select name='selectp' id='sp' class='form-control' style='margin-top: 10px;margin-right: 50px;width:600px' onchange='my_fun3(this.value);'>";
                                                        echo "<option value='0'>Please select</option>";
                                                    echo "</select>";
                                                        
                                                    ?>
                                                    <span id="sps" style="color: red"></span>
                                                </div>
                                    </div>

                                    <br><br>


                                </form>
                            
                                <form action="" method="post" id = "regform2" name="registerForm2" enctype="multipart/form-data">
                                        
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
