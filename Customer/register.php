<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
    
    if(isset($_POST['b1']))
    {
           $servername = "localhost";
        $username = "root";
        $password = "";
        $db = "iwt_groceryproject";
       
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db);

    if(!$conn)
    {
        die("Connection Failed::".mysqli_connect_error());
    }


        $onm = $_POST['name'];
        $em = $_POST['email'];
        $phn = $_POST['phone'];
        $pin = $_POST['pincode'];
        $ad1 = $_POST['addr1'];
        $ad2 = $_POST['addr2'];
        $ad3 = $_POST['addr3'];
        $cityf = $_POST['cityf'];
        $psswd = $_POST['password'];

        $sa = $ad1."<br>".$ad2."<br>".$ad3;
        //echo $sa."<br/>";

    $sql = "select contact from customer_details where contact=".$phn;

        $result = mysqli_query($conn,$sql);

        $row = mysqli_fetch_array($result);

        if(is_array($row))
        {
            if($row['contact']==$phn)
            {
                mysqli_close($conn);
                echo'<script>alert("Admin alredy Registered...")</script>';
            }
        }

        else
        {
        $sql = "INSERT INTO customer_details (email,name,contact,pincode,address,psswd,credit_req,credit_limit,city)
        VALUES ('".$em."','".$onm."',".$phn.",".$pin.",'".$sa."','".$psswd."',0,30,'".$cityf."')";
        //echo $sql;
    
        mysqli_query($conn,$sql);
    
        mysqli_close($conn);
        header('location: login.php');
        }
    }

?>
<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="Vide" />
<meta name="keywords" content="Big store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- js -->
   <script src="js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'>
<!--- start-rate---->
<script src="js/jstarbox.js"></script>
	<link rel="stylesheet" href="css/jstarbox.css" type="text/css" media="screen" charset="utf-8" />
		<script type="text/javascript">
			jQuery(function() {
			jQuery('.starbox').each(function() {
				var starbox = jQuery(this);
					starbox.starbox({
					average: starbox.attr('data-start-value'),
					changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
					ghosting: starbox.hasClass('ghosting'),
					autoUpdateAverage: starbox.hasClass('autoupdate'),
					buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
					stars: starbox.attr('data-star-count') || 5
					}).bind('starbox-value-changed', function(event, value) {
					if(starbox.hasClass('random')) {
					var val = Math.random();
					starbox.next().text(' '+val);
					return val;
					} 
				})
			});
		});
		</script>
<!---//End-rate---->

<script type="text/javascript">
	 function formValidation()
        {
            var ownername = document.getElementById("name");
            var on_pattern = /[a-zA-Z]/;
            var ownername_length= ownername.value.length;
            if(ownername_length==0)
            {
                document.getElementById("nm").innerHTML= "Enter Full Name";
                ownername.focus();
                return false;
            }
            else if(!ownername.value.match(on_pattern))
            {
                document.getElementById("nm").innerHTML= "Name not in correct format";
                ownername.focus();
                return false;
            }
            else
            {
                document.getElementById("nm").innerHTML= "";
            }


            var email = document.getElementById("email");
            var email_length = email.value.length;
            var atpattrn = /@/i;
            if(email_length==0)
            {
                document.getElementById("em").innerHTML= "Enter Email";
                email.focus();
                return false;
            }
            else if(!email.value.match(atpattrn) || !email.value.includes("."))
            {
                document.getElementById("em").innerHTML= "Email-id mail not in correct format.";
                email.focus();
                return false;
            }
            else
            {
                document.getElementById("em").innerHTML= "";
            }


            var phone = document.getElementById("phone");
            var phone_length = phone.value.length;
            var phoneno = /^\d{10}$/;
            var p_pattern=/[0-9]/;
            if(phone_length==0)
            {
                document.getElementById("ph").innerHTML= "Enter Phone Number";
                phone.focus();
                return false;
            }
            
            else if(!phone.value.match(p_pattern))
            {
                document.getElementById("ph").innerHTML= "Phone Number must be of digits.";
                phone.focus();
                return false;   
            }
            else if(phone_length != 10)
            {
                document.getElementById("ph").innerHTML= "Phone Number must be of 10 digits.";
                phone.focus();
                return false;
            }
            else
            {
                document.getElementById("ph").innerHTML= "";
            }

 var pincode = document.getElementById("pincode");
            var pincode_length = pincode.value.length;
            var pincodeno = /^\d{6}$/;
            var pin_pattern=/[0-9]/;
            if(pincode_length==0)
            {
                document.getElementById("pin").innerHTML= "Enter Pincode";
                pincode.focus();
                return false;
            }
            
            else if(!pincode.value.match(pin_pattern))
            {
                document.getElementById("pin").innerHTML= "Pincode must be of digits.";
                pincode.focus();
                return false;   
            }
            else if(pincode_length != 6)
            {
                document.getElementById("pin").innerHTML= "pincode must be of 6 digits.";
                pincode.focus();
                return false;
            }
            else
            {
                document.getElementById("pin").innerHTML= "";
            }


            var shopname = document.getElementById("addr1");
            var shopname_length= shopname.value.length;
            if(shopname_length==0)
            {
                document.getElementById("ad1").innerHTML= "Enter House/Appartment Name";
                shopname.focus();
                return false;
            }
            else if(shopname.value.search("'") != -1)
            {
                document.getElementById("ad1").innerHTML= "Please Remove Single Quote( ' )";
                shopname.focus();
                return false;	
            }
            else
            {
                document.getElementById("ad1").innerHTML= "";
            }



            var shopaddress = document.getElementById("addr2");
            var shopaddress_length= shopaddress.value.length;
            if(shopaddress_length==0)
            {
                document.getElementById("ad2").innerHTML= "Enter Street Name and Number";
                shopaddress.focus();
                return false;
            }
            else if(shopaddress.value.search("'") != -1)
            {
                document.getElementById("ad2").innerHTML= "Please Remove Single Quote( ' )";
                shopaddress.focus();
                return false;	
            }
            else
            {
                document.getElementById("ad2").innerHTML= "";
            }

            var shopaddress1 = document.getElementById("addr3");
            //var osa_pattern = /[a-zA-Z]/;
            var shopaddress_length= shopaddress1.value.length;
            if(shopaddress_length==0)
            {
                document.getElementById("ad3").innerHTML= "Enter Landmark";
                shopaddress1.focus();
                return false;
            }
            else if(shopaddress1.value.search("'") != -1)
            {
                document.getElementById("ad3").innerHTML= "Please Remove Single Quote( ' )";
                shopaddress1.focus();
                return false;	
            }
            else
            {
                document.getElementById("ad3").innerHTML= "";
            } 
            var shopaddress2 = document.getElementById("city");
            var osa_pattern = /[a-zA-Z]/;
            var shopaddress_length= shopaddress2.value.length;
            if(shopaddress_length==0)
            {
                document.getElementById("cityF").innerHTML= "Enter City";
                shopaddress2.focus();
                return false;
            }
            else if(!shopaddress2.value.match(osa_pattern))
            {
                document.getElementById("cityF").innerHTML= "Not correct format";
                shopaddress2.focus();
                return false;   
            }
            else
            {
                document.getElementById("cityF").innerHTML= "";
            }

            var psswd = document.getElementById("password");
            var psswd_length = psswd.value.length;

            if(psswd_length==0)
            {
                document.getElementById("psswd").innerHTML= "Enter Password";
                psswd.focus();
                return false;
            }
            else if(psswd_length < 8 || psswd_length > 16)
            {
                document.getElementById("psswd").innerHTML= "Password: atleast 8 and atmost 16 characters.";
                psswd.focus();
                return false;
            }
            else
            {
                document.getElementById("psswd").innerHTML= "";
            }
            var cpsswd = document.getElementById("confirm_password");
            var cpsswd_length = cpsswd.value.length;
            if(cpsswd_length==0)
            {
                document.getElementById("cpsswd").innerHTML= "Confirm your Password.";
                cpsswd.focus();
                return false;   
            }
            else if( cpsswd.value != psswd.value)
            {
                document.getElementById("cpsswd").innerHTML= "Do not match with Password.";
                cpsswd.focus();
                return false;
            }
            else
            {

                document.getElementById("cpsswd").innerHTML= "";
            }
            return true;
        }
</script>
</head>
<body>
<a href="offer.php"><img src="images/download.png" class="img-head" alt=""></a>
<div class="header">

		<div class="container">
			
			<div class="logo">
				<h1 ><a href="index.php">Grocerry Connect<span>The Best Supermarket</span></a></h1>
			</div>
			<div class="head-t">
				<ul class="card">
					<li><a href="feedback.php" ><i class="fa fa-heart" aria-hidden="true"></i>Give Feedback</a></li>
					<li><a href="login.php" ><i class="fa fa-user" aria-hidden="true"></i>Login</a></li>
					<li><a href="register.php" ><i class="fa fa-arrow-right" aria-hidden="true"></i>Register</a></li>
					<li><a href="order_history.php" ><i class="fa fa-file-text-o" aria-hidden="true"></i>Order History</a></li>
					<li><a href="shipping.php" ><i class="fa fa-ship" aria-hidden="true"></i>Shipping</a></li>
				</ul>		
			</div>
			
			<div class="header-ri">
				<ul class="social-top">
					<li><a href="#" class="icon facebook"><i class="fa fa-facebook" aria-hidden="true"></i><span></span></a></li>
					<li><a href="#" class="icon twitter"><i class="fa fa-twitter" aria-hidden="true"></i><span></span></a></li>
					<li><a href="#" class="icon pinterest"><i class="fa fa-pinterest-p" aria-hidden="true"></i><span></span></a></li>
					<li><a href="#" class="icon dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i><span></span></a></li>
				</ul>	
			</div>
		

				<div class="nav-top">
					<nav class="navbar navbar-default">
					
					<div class="navbar-header nav_2">
						<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						

					</div> 
					<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
						<ul class="nav navbar-nav ">
							<li ><a href="index.php" class="hyper "><span>Home</span></a></li>	
							
							<li  class="dropdown ">
								<a href="kitchen.php" class="dropdown-toggle  hyper" ><span>Kitchen<b class="caret"></b></span></a>
								<ul class="dropdown-menu multi">
									<div class="row">
										<div class="col-sm-3">
											<ul class="multi-column-dropdown">
			
												<li><a href="kitchen.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Water & Beverages</a></li>
												<li><a href="kitchen.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Fruits & Vegetables</a></li>
												<li><a href="kitchen.php"> <i class="fa fa-angle-right" aria-hidden="true"></i>Staples</a></li>
												<li><a href="kitchen.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Branded Food</a></li>
										
											</ul>
										
										</div>
										<div class="col-sm-3">
										
											<ul class="multi-column-dropdown">
												<li><a href="kitchen.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Breakfast &amp; Cereal</a></li>
												<li><a href="kitchen.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Snacks</a></li>
												<li><a href="kitchen.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Spices</a></li>
												<li><a href="kitchen.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Biscuit &amp; Cookie</a></li>
												<li><a href="kitchen.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Sweets</a></li>
										
											</ul>
										
										</div>
										<div class="col-sm-3">
										
											<ul class="multi-column-dropdown">
												<li><a href="kitchen.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Pickle & Condiment</a></li>
												<li><a href="kitchen.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Instant Food</a></li>
												<li><a href="kitchen.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Dry Fruit</a></li>
												<li><a href="kitchen.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Tea &amp; Coffee</a></li>
										
											</ul>
										</div>
										<div class="col-sm-3 w3l">
											<a href="kitchen.php"><img src="images/me.png" class="img-responsive" alt=""></a>
										</div>
										<div class="clearfix"></div>
									</div>	
								</ul>
							</li>
							<li class="dropdown">
							
								<a href="care.php" class="dropdown-toggle hyper" ><span> Personal Care <b class="caret"></b></span></a>
								<ul class="dropdown-menu multi multi1">
									<div class="row">
										<div class="col-sm-3">
											<ul class="multi-column-dropdown">
												<li><a href="care.php"><i class="fa fa-angle-right" aria-hidden="true"></i> Ayurvedic </a></li>
												<li><a href="care.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Baby Care</a></li>
												<li><a href="care.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Cosmetics</a></li>
												<li><a href="care.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Deo & Purfumes</a></li>
										
											</ul>
											
										</div>
										<div class="col-sm-3">
											
											<ul class="multi-column-dropdown">
												<li><a href="care.php"> <i class="fa fa-angle-right" aria-hidden="true"></i>Hair Care </a></li>
												<li><a href="care.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Oral Care</a></li>
												<li><a href="care.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Personal Hygiene</a></li>
												<li><a href="care.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Skin care</a></li>
										
											</ul>
											
										</div>
										<div class="col-sm-3">
											
											<ul class="multi-column-dropdown">
												<li><a href="care.php"><i class="fa fa-angle-right" aria-hidden="true"></i> Fashion Accessories </a></li>
												<li><a href="care.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Grooming Tools</a></li>
												<li><a href="care.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Shaving Need</a></li>
												<li><a href="care.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Sanitary Needs</a></li>
										
											</ul>
										</div>
										<div class="col-sm-3 w3l">
											<a href="care.php"><img src="images/me1.png" class="img-responsive" alt=""></a>
										</div>
										<div class="clearfix"></div>
									</div>	
								</ul>
							</li>
							<li class="dropdown">
								<a href="hold.php" class="dropdown-toggle hyper" ><span>Household<b class="caret"></b></span></a>
								<ul class="dropdown-menu multi multi2">
									<div class="row">
										<div class="col-sm-3">
											<ul class="multi-column-dropdown">
												<li><a href="hold.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Cleaning Accessories</a></li>
												<li><a href="hold.php"><i class="fa fa-angle-right" aria-hidden="true"></i>CookWear</a></li>
												<li><a href="hold.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Detergents</a></li>
												<li><a href="hold.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Gardening Needs</a></li>
										
											</ul>
										
										</div>
										<div class="col-sm-3">
											
											<ul class="multi-column-dropdown">
												<li><a href="hold.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Kitchen & Dining</a></li>
												<li><a href="hold.php"><i class="fa fa-angle-right" aria-hidden="true"></i>KitchenWear</a></li>
												<li><a href="hold.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Pet Care</a></li>
												<li><a href="hold.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Plastic Wear</a></li>
										
											</ul>
										
										</div>
										<div class="col-sm-3">
										
											<ul class="multi-column-dropdown">
												<li><a href="hold.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Pooja Needs</a></li>
												<li><a href="hold.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Serveware</a></li>
												<li><a href="hold.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Safety Accessories</a></li>
												<li><a href="hold.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Festive Decoratives </a></li>
										
											</ul>
										</div>
										<div class="col-sm-3 w3l">
											<a href="hold.php"><img src="images/me2.png" class="img-responsive" alt=""></a>
										</div>
										<div class="clearfix"></div>
									</div>	
								</ul>
							</li>
							<li><a href="contact.php" class="hyper"><span>Contact Us</span></a></li>
                            <li><a href="creditReq.php" class="hyper"><span>Be a Credit Customer</span></a></li>
						</ul>
					</div>
					</nav>
					 <!--<div class="cart" >
					
						<span class="fa fa-shopping-cart my-cart-icon"><span class="badge badge-notify my-cart-badge"></span></span>
					</div>-->
					<div class="clearfix"></div>
				</div>
					
				</div>			
</div>
  <!---->

     <!--banner-->
<div class="banner-top">
	<div class="container">
		<h3 >Register</h3>
		<h4><a href="index.php">Home</a><label>/</label>Register</h4>
		<div class="clearfix"> </div>
	</div>
</div>

<!--login-->

	<div class="login">
		<div class="main-agileits">
				<div class="form-w3agile form1">
					<h3>Register</h3>
					<form action="" method="post" onsubmit="return formValidation();">
						Full Name
						<div class="key">
							<i class="fa fa-user" aria-hidden="true"></i>
							<input  type="text" placeholder="Name" name="name" id="name">
							<div class="clearfix"></div>
							<span style="color: red;" id="nm"></span>
						</div>
						Email-ID
						<div class="key">
							<i class="fa fa-envelope" aria-hidden="true"></i>
							<input  type="text" placeholder="Email" name="email" id="email">
							<div class="clearfix"></div>
							<span style="color: red;" id="em"></span>
						</div>
						Contact
						<div class="key">
							<i class="fa fa-phone" aria-hidden="true"></i>
							<input  type="text" placeholder="Contact" name="phone" id="phone">
							<div class="clearfix"></div>
							<span style="color: red;" id="ph"></span>
						</div>
						Pincode
						<div class="key">
							<i class="fa fa-map-marker" aria-hidden="true"></i>
							<input  type="text" placeholder="Pincode" name="pincode" id="pincode">
							<div class="clearfix"></div>
							<span style="color: red;" id="pin"></span>
						</div>
						House/Appartment Name
						<div class="key">
							<i class="fa fa-truck" aria-hidden="true"></i>
							<input  type="text" placeholder="House/Appartment Name" name="addr1" id="addr1">
							<div class="clearfix"></div>
							<span style="color: red;" id="ad1"></span>
						</div>
						Lane/Street name and number
						<div class="key">
							<i class="fa fa-truck" aria-hidden="true"></i>
							<input  type="text" placeholder="Lane/Street name and number" name="addr2" id="addr2">
							<div class="clearfix"></div>
							<span style="color: red;" id="ad2"></span>
						</div>
						Landmark
						<div class="key">
							<i class="fa fa-truck" aria-hidden="true"></i>
							<input  type="text" placeholder="Landmark" name="addr3" id="addr3">
							<div class="clearfix"></div>
							<span style="color: red;" id="ad3"></span>
						</div>
                        City
                        <div class="key">
                            <i class="fa fa-truck" aria-hidden="true"></i>
                            <input  type="text" placeholder="Jamnagar" name="cityf" id="city">
                            <div class="clearfix"></div>
                            <span style="color: red;" id="cityF"></span>
                        </div>
						Password
						<div class="key">
							<i class="fa fa-lock" aria-hidden="true"></i>
							<input  type="password" placeholder="Password" name="password" id="password">
							<div class="clearfix"></div>
							<span style="color: red;" id="psswd"></span>
						</div>
						Confirm Password
						<div class="key">
							<i class="fa fa-lock" aria-hidden="true"></i>
							<input  type="password" placeholder="Confirm Password" name="confirm_password" id="confirm_password">
							<div class="clearfix"></div>
							<span style="color: red;" id="cpsswd"></span>
						</div>
						<input type="submit" value="Submit" id="b1" name="b1">
					</form>
				</div>
				
			</div>
		</div>
<!--footer-->
<div class="footer">
    <div class="container">
        <div class="col-md-3 footer-grid">
            <h3>About Us</h3>
            <p>Project By Smit Vora & Darshit Ambasana</p>
        </div>
        <div class="col-md-3 footer-grid ">
            <h3>Menu</h3>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="kitchen.php">Kitchen</a></li>
                <li><a href="care.php">Personal Care</a></li>
                <li><a href="hold.php">Household</a></li>    
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </div>
        <div class="col-md-3 footer-grid ">
            <h3>Customer Services</h3>
            <ul>
                <li><a href="shipping.php">Shipping</a></li>
                <li><a href="terms.php">Terms & Conditions</a></li>
                <li><a href="faqs.php">Faqs</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="offer.php">Online Shopping</a></li>                         
                 
            </ul>
        </div>
        <div class="col-md-3 footer-grid">
            <h3>My Account</h3>
            <ul>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
                
            </ul>
        </div>
        <div class="clearfix"></div>
            <div class="footer-bottom">
                <h2 ><a href="index.php">Grocery Connect<span>The Best Supermarket</span></a></h2>
                <p class="fo-para">Project By Smit Vora & Darshit Ambasana</p>
                <ul class="social-fo">
                    <li><a href="#" class=" face"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#" class=" twi"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="#" class=" pin"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                    <li><a href="#" class=" dri"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                </ul>
                <div class=" address">
                    <div class="col-md-4 fo-grid1">
                            <p><i class="fa fa-home" aria-hidden="true"></i>Morbi Road, Marwadi University, Rajkot Gujarat</p>
                    </div>
                    <div class="col-md-4 fo-grid1">
                            <p><i class="fa fa-phone" aria-hidden="true"></i>+91 9426729507 , +91 9687913890</p>    
                    </div>
                    <div class="col-md-4 fo-grid1">
                        <p><a href="groceryconnect18@gmail.com"><i class="fa fa-envelope-o" aria-hidden="true"></i>groceryconnect18@gmail.com</a></p>
                    </div>
                    <div class="clearfix"></div>
                    
                    </div>
            </div>
        <div class="copy-right">
            <p> &copy; 2016 Big store. All Rights Reserved | Design by  <a href="http://w3layouts.com/"> W3layouts</a></p>
        </div>
    </div>
</div>
<!-- //footer-->
<!-- smooth scrolling -->
	<script type="text/javascript">
		$(document).ready(function() {
		/*
			var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
			};
		*/								
		$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //smooth scrolling -->
<!-- for bootstrap working -->
		<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
<script type='text/javascript' src="js/jquery.mycart.js"></script>
  <script type="text/javascript">
  /*$(function () {

    var goToCartIcon = function($addTocartBtn){
      var $cartIcon = $(".my-cart-icon");
      var $image = $('<img width="30px" height="30px" src="' + $addTocartBtn.data("image") + '"/>').css({"position": "fixed", "z-index": "999"});
      $addTocartBtn.prepend($image);
      var position = $cartIcon.position();
      $image.animate({
        top: position.top,
        left: position.left
      }, 500 , "linear", function() {
        $image.remove();
      });
    }

    $('.my-cart-btn').myCart({
      classCartIcon: 'my-cart-icon',
      classCartBadge: 'my-cart-badge',
      affixCartIcon: true,
      checkoutCart: function(products) {
        $.each(products, function(){
          console.log(this);
        });
      },
      clickOnAddToCart: function($addTocart){
        goToCartIcon($addTocart);
      },
      getDiscountPrice: function(products) {
        var total = 0;
        $.each(products, function(){
          total += this.quantity * this.price;
        });
        return total * 1;
      }
    });

  });*/
  </script>

</body>
</html>