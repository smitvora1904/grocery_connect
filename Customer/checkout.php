
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
	 session_start();
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "iwt_groceryproject";

    $conn = mysqli_connect($server,$user,$pass,$db);
  

    if(isset($_POST['submit']))
    {

        $em = $_POST['email'];
        $pwd = $_POST['password'];
        $sql = "select cust_id,email,psswd from customer_details where email='".$em."'";

        $result = mysqli_query($conn,$sql);

        $row = mysqli_fetch_array($result);

        if(is_array($row))
        {
            if($row['email']==$em)
            {
                if($row['psswd']==$pwd)
                {
                    //$_SESSION['cust_id'] = $row['cust_id'];
                    $cname="user";
                    $cval=$row['cust_id'];
                    //echo "<script>alert('".$cval."');</script>";
                    setcookie($cname,$cval,time()+(86400*30),"/");
                    //mysqli_close($conn);
                }
                else
                {
                    mysqli_close($conn);
                    echo'<script>alert("Invalid Username or Password..")</script>';
                }

            }
            else
            {
                mysqli_close($conn);
                echo'<script>alert("User Not Registered!")</script>';
            }
        }

            else
            {
                mysqli_close($conn);
                echo'<script>alert("User Not Registered!")</script>';
            }
    }

    if (isset($_POST['cancel'])) {
    	echo "<script>window.close();</script>";
    	//exit();
    }
    if (isset($_POST['place'])) {

    	//echo "<script>alert('Place: ".$_POST['payMethod']."');</script>";
    	$products="";
    	$quantity="";
    	$k=0;
    	$net_amt1=0;
    	$flag=0;
    	$prodArr = explode(",",$_COOKIE['prodArr']);

    	while($k < count($prodArr))
    	{

			$sql1 = "select stock,name from product_details where prod_id=".$prodArr[$k];
			//echo $sql;
			$result1 = mysqli_query($conn,$sql1);
			$row1 = mysqli_fetch_array($result1);
			//echo "		".$row1['name'].",".$row1['stock'].",".$prodArr[$k+3];
			if($row1['stock'] > $prodArr[$k+3])
			{
    			$products = $products.$prodArr[$k]."#";
    			$k+=3;
    			$quantity = $quantity.$prodArr[$k]."#";
    			$k++;
    			$net_amt1 += $prodArr[$k];
    			$k++;
    		}
    		else
    		{
    			echo "<script>alert('".$row1['name']." quantity selected is more than available stock. Please, rearrange the cart');";
    			echo 'window.location.href = "kitchen.php";</script>';
    		}
    	}

    	/*if($_POST['payMethod'] == "credit" && $flag==0) 
    	{
    		if ($net_amt1 <= 5000) {
    		$sql = "insert into orders (cust_id,seller_id,products,quantity,total_amt,payMode,date) values(".$_COOKIE['user'].",".$_COOKIE['current_seller'].",'".$products."','".$quantity."',".$net_amt1.",'".$_POST['payMethod']."','".date("Y-m-d")."')";
    		mysqli_query($conn,$sql);
    		//echo $sql;
    		header('location:order_history.php');
    		}
    		else
    		{
    			echo "<script>alert('Order above 5000 is not allowed in Credit Period.');</script>";
    		}
    	}*/
    	if ($flag==0)
    	{
    		$sql = "insert into orders (cust_id,seller_id,products,quantity,total_amt,payMode,date) values(".$_COOKIE['user'].",".$_COOKIE['current_seller'].",'".$products."','".$quantity."',".$net_amt1.",'".$_POST['payMethod']."','".date("Y-m-d")."')";
    		mysqli_query($conn,$sql);
    		//echo $sql;
    		header('location:order_history.php');	
    	}
    }

?>

<!DOCTYPE html>
<html>
<head>
<title>Checkout</title>
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
	}
</script>
</head>
<body>
<div class="header">

		<div class="container">
			
			<div class="logo">
				<h1 ><a href="index.php">Grocery Connect<span>The Best Supermarket</span></a></h1>
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
								<a href="kitchen.php" class="dropdown-toggle  hyper"  ><span>Kitchen<b class="caret"></b></span></a>
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
								<a href="hold.php" class="dropdown-toggle hyper"><span>Household<b class="caret"></b></span></a>
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
<!--<div class="banner-top">
	<div class="container">
		<h3 >Login</h3>
		<h4><a href="index.php">Home</a><label>/</label>Login</h4>
		<div class="clearfix"> </div>
	</div>
</div>-->
<!--login-->

	<div class="login" id="loginPage" hidden="true">
	
		<div class="main-agileits">
				<div class="form-w3agile">
					<h3>Login</h3>
					<form action="#" method="post" onsubmit="return formValidation();">
						Email-ID
						<div class="key">
							<i class="fa fa-envelope" aria-hidden="true"></i>
							<input  type="text" placeholder="Email" name="email">
							<div class="clearfix"></div>
							<span style="color: red;" id="em"></span>
						</div>
						Password
						<div class="key">
							<i class="fa fa-lock" aria-hidden="true"></i>
							<input  type="password" placeholder="Password" name="password">
							<div class="clearfix"></div>
							<span style="color: red;" id="psswd"></span>
						</div>
						<input type="submit" value="Login" id="submit" name="submit">
					</form>
				</div>
				<div class="forg">
					<a href="#" class="forg-left">Forgot Password</a>
					<a href="register.php" class="forg-right">Register</a>
				<div class="clearfix"></div>
				</div>
			</div>
		</div>

		<div id="checkoutPage" hidden="true">
			<?php
				$sql = "select * from customer_details where cust_id=".$_COOKIE['user'];
        		$result = mysqli_query($conn,$sql);
        		$row = mysqli_fetch_array($result);


				$sql2 = "select * from seller_details where seller_id=".$_COOKIE['current_seller'];
        		$result2 = mysqli_query($conn,$sql2);
        		$row2 = mysqli_fetch_array($result2);
			?>
		<div class="product">
		<div class="container">
			<div class="spec " align="left" style="float: left;height: 200px;">
				<h3 id="heading" align="left" style="color: #f19210;">Your Details</h3>
				
				<div class=" con-w3l">
				<p style="font-size: 20px;">
					<?php
						echo "<br>Address: ".$row['address']."<br><br>";
						echo "Name: ".$row['name']."<br>Contact: ".$row['contact']."<br>Pincode: ".$row['pincode']."<br>City: ".$row['city'];
					?>
				</p>
				</div>
			</div>
			<div class="spec " align="right" style="float: right;height: 200px;">
				<h3 id="heading" align="right" style="color: #f19210;">Seller Details</h3>
				
				<div class=" con-w3l">
					<p style="font-size: 20px;">
					<?php
					echo "<br>Address: ".$row2['shop_address']."<br><br>";
						echo "Shop: ".$row2['shop_name']."<br>Contact: ".$row2['contact']."<br>Email: ".$row2['email']."<br>Pincode: ".$row2['pincode']."<br>City: ".$row2['city'];
					?>
				</p>
				</div>
			</div>
		</div>
	</div>
	<div class="product" style="padding-top: 20px;padding-bottom: 10px;">
		<div class="container">
			<div class="spec " align="left">
				<h3 id="heading" align="left" style="color: #f19210;">Order Summary</h3>
				</div>
				<div class=" con-w3l" align="left" style="margin-top: 10px;">
					<table class="table table-striped">
              <thead>
                <tr>
                  <th>Item ID</th>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Quantity(Units)</th>
                  <th>Total(Rs.)</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $k=0;
                if(isset($_COOKIE['prodArr']))
				{
					//$prodArr = $_COOKIE['prodArr'];
					$prodArr = explode(",",$_COOKIE['prodArr']);
					$net_amt=0;
					while($k != count($prodArr))
					{
						
						$z=$k;
						//echo $row['stock'];
						echo "<tr>";
							//echo "<td style='color: green;'>In Stock</td>";
							for($i=$k;$i< $z+5 ;$i++)
							{
								if($i == ($z+4))
							{
								$net_amt += $prodArr[$i];
							}
						
							echo "<td>".$prodArr[$i]."</td>";
							$k++;
							}
					/*for($i=$k;$i< $z+5 ;$i++)
					{
						if($i == ($z+4))
						{
							$net_amt += $prodArr[$i];
						}
						
						echo "<td>".$prodArr[$i]."</td>";
						$k++;
					}*/
					echo "</tr>";
					}
					/*foreach ($_COOKIE['prodArr'] as $tempProd) {
						foreach ($tempProd as $temp){
						echo "<tr>
							<td>".$temp."</td>
						</tr>";
					}
					}*/
					echo "<tr>
							<td colspan=5 style='font-size: 20px;color: green;'>Net Amount: Rs.".$net_amt." /-</td>
						</tr>";
				}
                ?>
              </tbody>
            </table> 
            <p style="font-size: 12px;color: grey;">
            	<p style="font-size: 16px;">Please Note</p>
            	<ul style="color: grey;">
            		<li>In case of Order Cancelation from Seller, you will be notified via email.</li>
            		<li>Orders can be tracked in Order History.</li>
            		<li>Delivery will be placed in 1 or 2 working days.</li>
            	</ul>
            </p>
				</div>
		</div>
	</div>
	<div class="product" style="padding-top: 10px;padding-bottom: 10px;">
		<div class="container">
			<div class="spec " align="left">
				<h3 id="heading" align="left" style="color: #f19210;">Payment Method</h3>
				</div>
				<div class=" con-w3l" align="left" style="margin-top: 10px;">
				<form method="post">
				<div class="input-group">
      				<span class="input-group-addon">
        			<input value="cod" type="radio" name="payMethod" aria-label="..." checked="true">
      				</span>
      				<p style="font-size: 20px;">Pay On Delivery</p>
    			</div>
    			<?php
    				$sql = "select * from credit_customers where cust_id=".$_COOKIE['user']." and seller_id=".$_COOKIE['current_seller']." and current_due_amt=0";
    				 	$result = mysqli_query($conn,$sql);
        				$row = mysqli_fetch_array($result);

        				if(is_array($row) && $net_amt<=5000)
        				{
        					echo "<div class='input-group' name='credOpt'>
      						<span class='input-group-addon'>
        					<input value='credit' type='radio' name='payMethod' aria-label='...'>
      						</span>
      						<p style='font-size: 20px;'>30 Day Credit Period</p>
    						</div>";
        				}
        				else if ($net_amt>5000) {
        					echo "<p style='font-size: 20px; color: red;'>Orders Above 5000 Not Allowed for Credit Period</p>";
        				}
    			?>
    			
    			<div class="input-group">
    			<h2 class="t-button">
				<button name="place"><span class="label label-success" style="float: left;margin-right: 30px;">Place Order</span></button>
				<button name="cancel"><span class="label label-danger" style="float: right;">Cancel</span></button>
			  </h2>
    			</div>
    			</form>
				</div>
		</div>
	</div>
	
		</div>
		<?php
			if(isset($_COOKIE['user']))
		{
			echo "<script>document.getElementById('loginPage').hidden=true;</script>";
			echo "<script>document.getElementById('checkoutPage').hidden=false;</script>";
			
		}
		else
		{
			echo "<script>document.getElementById('loginPage').hidden=false;</script>";
			echo "<script>document.getElementById('checkoutPage').hidden=true;</script>";	
		}
		?>
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
 /* $(function () {

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