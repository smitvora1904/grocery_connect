<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
	session_start();
	if(isset($_COOKIE['current_seller']))
	{
	 $server = "localhost";
	
    $user = "root";
    $pass = "";
    $db = "iwt_groceryproject";

    $conn = mysqli_connect($server,$user,$pass,$db);

	$count=1;
	}
	else
	{
		echo "<script>alert('Please select a seller from HOME page.');</script>";
		header('location:index.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>Personal Care</title>
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
	function newCategory(catID,opt=1)
	{
		console.log(catID);
			document.getElementById('pc'+catID).hidden = false;
			document.getElementById('pcProducts').hidden = true;
			for(var i=21;i<27;i++)
			{
				if(i != catID)
				{
					//console.log(i);
					document.getElementById('pc'+i).hidden = true;
				}
			}	
	}
	


</script>
</head>
<body>
<a href="offer.php"><img src="images/download.png" class="img-head" alt=""></a>
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
								<a href="kitchen.php" class="dropdown-toggle  hyper"><span>Kitchen<b class="caret"></b></span></a>
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
							<li class="dropdown active active1">
							
								<a href="#" class="dropdown-toggle hyper" data-toggle="dropdown" ><span> Personal Care <b class="caret"></b></span></a>
								<ul class="dropdown-menu multi multi1">
									<div class="row">
										<div class="col-sm-3">
											<ul class="multi-column-dropdown">
												<li><a href="#" onclick="newCategory(this.id);" id="21"><i class="fa fa-angle-right" aria-hidden="true"></i> Ayurvedic </a></li>
												<li><a href="#" onclick="newCategory(this.id);" id="22"><i class="fa fa-angle-right" aria-hidden="true"></i>Baby Care</a></li>
												
												<li><a href="#" onclick="newCategory(this.id);" id="23"> <i class="fa fa-angle-right" aria-hidden="true"></i>Hair Care </a></li>
												<li><a href="#" onclick="newCategory(this.id);" id="24"><i class="fa fa-angle-right" aria-hidden="true"></i>Oral Care</a></li>
										
											</ul>
											
										</div>
										<div class="col-sm-3">
											
											<ul class="multi-column-dropdown">
												<li><a href="#" onclick="newCategory(this.id);" id="25"><i class="fa fa-angle-right" aria-hidden="true"></i>Shaving Need</a></li>
												<li><a href="#" onclick="newCategory(this.id);" id="26"><i class="fa fa-angle-right" aria-hidden="true"></i>Sanitary Needs</a></li>
										
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
					 <div class="cart" >
					
						<span class="fa fa-shopping-cart my-cart-icon"><span class="badge badge-notify my-cart-badge"></span></span>
					</div>
					<div class="clearfix"></div>
				</div>
					
				</div>			
</div>
  <!---->

    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <a href="care.php"><img class="first-slide" src="images/ba1.jpg" alt="First slide"></a>
       
        </div>
        <div class="item">
          <a href="kitchen.php"><img class="second-slide " src="images/ba.jpg" alt="Second slide"></a>
         
        </div>
        <div class="item">
          <a href="hold.php"><img class="third-slide " src="images/ba2.jpg" alt="Third slide"></a>
          
        </div>
      </div>
    
    </div><!-- /.carousel -->

<!--content-->
<div class="kic-top ">
	<div class="container ">
	<div class="kic ">
			<h3>Popular Categories</h3>
			
		</div>
		<div class="col-md-4 kic-top1">
			<a href="#" onclick="newCategory(this.id);" id="21">
				<img src="images/ki3.jpg" class="img-responsive" alt="">
			</a>
			<h6>Ayurvedic</h6>
		</div>
		<div class="col-md-4 kic-top1">
			<a href="#" onclick="newCategory(this.id);" id="25">
				<img src="images/ki4.jpg" class="img-responsive" alt="">
			</a>
			<h6>Shaving Kit</h6>
		</div>
		<div class="col-md-4 kic-top1">
			<a href="#" onclick="newCategory(this.id);" id="23">
				<img src="images/dove.jfif" class="img-responsive" alt="">
			</a>
			<h6>Hair Care</h6>
		</div>
	</div>
</div>

<!--content-->
		<div class="product">
		<div class="container">
			<div class="spec ">
				<h3>Products</h3>
				<div class="ser-t">
					<b></b>
					<span><i></i></span>
					<b class="line"></b>
				</div>
			</div>
				<?php
				echo "<div class='con-w3l agileinf' id='pcProducts'>";
				
					
					 $sql = "select * from product_details where category_id in(21,22,23,24,25,26) and stock > 0 and seller_id=".$_SESSION['current_seller']; 
					 $result = mysqli_query($conn,$sql);
					// $count=1;
					 while($row = mysqli_fetch_array($result)) {
					echo "<div class='col-md-3 pro-1'>
								<div class='col-m'>
								<a href='#' data-toggle='modal' data-target='#myModal".$count."' class='offer-img'>
										<img src='".$row['photo']."' class='img-responsive' alt=''>
									</a>
									<div class='mid-1'>
										<div class='women'>
											<h6>".$row['name']."</h6>							
										</div>
										<div class='mid-2'>
											<p ><em class='item_price'>Rs.".$row['price']."</em></p>
											  <div class='block'>
												<h6>Stock: ".$row['stock']."</h6>
											</div>
											<div class='clearfix'></div>
										</div>
											<div class='add'>
										   <button class='btn btn-danger my-cart-btn my-cart-b' data-id='".$row['prod_id']."' data-name='".$row['name']."' data-summary='summary 36' data-price='".$row['price']."' data-quantity='1' data-image='".$row['photo']."'>Add to Cart</button>
										</div>
									</div>
								</div>
							</div>";

					echo "<div class='modal fade' id='myModal".$count."' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
				<div class='modal-dialog' role='document'>
					<div class='modal-content modal-info'>
						<div class='modal-header'>
							<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>						
						</div>
						<div class='modal-body modal-spa'>
								<div class='col-md-5 span-2'>
											<div class='item'>
												<img src='".$row['photo']."' class='img-responsive' alt=''>
											</div>
								</div>
								<div class='col-md-7 span-1 '>
									<h3>".$row['name']."</h3>
									<div class='price_single'>
									  <span class='reducedfrom '>Rs.".$row['price']."</span>
									
									 <div class='clearfix'></div>
									</div>
									<h4 class='quick'>Quick Overview:</h4>
									<p class='quick_desc'> ".$row['description']."</p>
									 <div class='add-to'>
										   <button class='btn btn-danger my-cart-btn my-cart-btn1 ' data-id='".$row['prod_id']."' data-name='".$row['name']."' data-summary='summary 24' data-price='".$row['price']."' data-quantity='1' data-image='".$row['photo']."'>Add to Cart</button>
										</div>
								</div>
								<div class='clearfix'> </div>
							</div>
						</div>
					</div>
				</div>";
				$count++;
						}
							
				echo "</div>";
				?>
				<div class=" con-w3l agileinf" id="pc21" hidden="true">
					<?php
					
					 $sql = "select * from product_details where category_id=21 and stock > 0 and seller_id=".$_SESSION['current_seller']; 
					 $result = mysqli_query($conn,$sql);
					// $count=1;
					 while($row = mysqli_fetch_array($result)) {
					echo "<div class='col-md-3 pro-1'>
								<div class='col-m'>
								<a href='#' data-toggle='modal' data-target='#myModal".$count."' class='offer-img'>
										<img src='".$row['photo']."' class='img-responsive' alt=''>
									</a>
									<div class='mid-1'>
										<div class='women'>
											<h6>".$row['name']."</h6>							
										</div>
										<div class='mid-2'>
											<p ><em class='item_price'>Rs.".$row['price']."</em></p>
											  <div class='block'>
												<h6>Stock: ".$row['stock']."</h6>
											</div>
											<div class='clearfix'></div>
										</div>
											<div class='add'>
										   <button class='btn btn-danger my-cart-btn my-cart-b' data-id='".$row['prod_id']."' data-name='".$row['name']."' data-summary='summary 36' data-price='".$row['price']."' data-quantity='1' data-image='".$row['photo']."'>Add to Cart</button>
										   
										</div>
									</div>
								</div>
							</div>";

					echo "<div class='modal fade' id='myModal".$count."' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
				<div class='modal-dialog' role='document'>
					<div class='modal-content modal-info'>
						<div class='modal-header'>
							<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>						
						</div>
						<div class='modal-body modal-spa'>
								<div class='col-md-5 span-2'>
											<div class='item'>
												<img src='".$row['photo']."' class='img-responsive' alt=''>
											</div>
								</div>
								<div class='col-md-7 span-1 '>
									<h3>".$row['name']."</h3>
									<div class='price_single'>
									  <span class='reducedfrom '>Rs.".$row['price']."</span>
									
									 <div class='clearfix'></div>
									</div>
									<h4 class='quick'>Quick Overview:</h4>
									<p class='quick_desc'> ".$row['description']."</p>
									 <div class='add-to'>
										   <button class='btn btn-danger my-cart-btn my-cart-btn1 ' data-id='".$row['prod_id']."' data-name='".$row['name']."' data-summary='summary 24' data-price='".$row['price']."' data-quantity='1' data-image='".$row['photo']."'>Add to Cart</button>
										</div>
								</div>
								<div class='clearfix'> </div>
							</div>
						</div>
					</div>
				</div>";
				$count++;
						}
							?>
				</div>
				<div class=" con-w3l agileinf" id="pc22" hidden="true">
					<?php
					
					 $sql = "select * from product_details where category_id=22 and stock > 0 and seller_id=".$_SESSION['current_seller']; 
					 $result = mysqli_query($conn,$sql);
					// $count=1;
					 while($row = mysqli_fetch_array($result)) {
					echo "<div class='col-md-3 pro-1'>
								<div class='col-m'>
								<a href='#' data-toggle='modal' data-target='#myModal".$count."' class='offer-img'>
										<img src='".$row['photo']."' class='img-responsive' alt=''>
									</a>
									<div class='mid-1'>
										<div class='women'>
											<h6>".$row['name']."</h6>							
										</div>
										<div class='mid-2'>
											<p ><em class='item_price'>Rs.".$row['price']."</em></p>
											  <div class='block'>
												<h6>Stock: ".$row['stock']."</h6>
											</div>
											<div class='clearfix'></div>
										</div>
											<div class='add'>
										   <button class='btn btn-danger my-cart-btn my-cart-b' data-id='".$row['prod_id']."' data-name='".$row['name']."' data-summary='summary 36' data-price='".$row['price']."' data-quantity='1' data-image='".$row['photo']."'>Add to Cart</button>
										   
										</div>
									</div>
								</div>
							</div>";

					echo "<div class='modal fade' id='myModal".$count."' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
				<div class='modal-dialog' role='document'>
					<div class='modal-content modal-info'>
						<div class='modal-header'>
							<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>						
						</div>
						<div class='modal-body modal-spa'>
								<div class='col-md-5 span-2'>
											<div class='item'>
												<img src='".$row['photo']."' class='img-responsive' alt=''>
											</div>
								</div>
								<div class='col-md-7 span-1 '>
									<h3>".$row['name']."</h3>
									<div class='price_single'>
									  <span class='reducedfrom '>Rs.".$row['price']."</span>
									
									 <div class='clearfix'></div>
									</div>
									<h4 class='quick'>Quick Overview:</h4>
									<p class='quick_desc'> ".$row['description']."</p>
									 <div class='add-to'>
										   <button class='btn btn-danger my-cart-btn my-cart-btn1 ' data-id='".$row['prod_id']."' data-name='".$row['name']."' data-summary='summary 24' data-price='".$row['price']."' data-quantity='1' data-image='".$row['photo']."'>Add to Cart</button>
										</div>
								</div>
								<div class='clearfix'> </div>
							</div>
						</div>
					</div>
				</div>";
				$count++;
						}
							?>
				</div>
				<div class=" con-w3l agileinf" id="pc23" hidden="true">
					<?php
					
					 $sql = "select * from product_details where category_id=23 and stock > 0 and seller_id=".$_SESSION['current_seller']; 
					 $result = mysqli_query($conn,$sql);
					// $count=1;
					 while($row = mysqli_fetch_array($result)) {
					echo "<div class='col-md-3 pro-1'>
								<div class='col-m'>
								<a href='#' data-toggle='modal' data-target='#myModal".$count."' class='offer-img'>
										<img src='".$row['photo']."' class='img-responsive' alt=''>
									</a>
									<div class='mid-1'>
										<div class='women'>
											<h6>".$row['name']."</h6>							
										</div>
										<div class='mid-2'>
											<p ><em class='item_price'>Rs.".$row['price']."</em></p>
											  <div class='block'>
												<h6>Stock: ".$row['stock']."</h6>
											</div>
											<div class='clearfix'></div>
										</div>
											<div class='add'>
										   <button class='btn btn-danger my-cart-btn my-cart-b' data-id='".$row['prod_id']."' data-name='".$row['name']."' data-summary='summary 36' data-price='".$row['price']."' data-quantity='1' data-image='".$row['photo']."'>Add to Cart</button>
										   
										</div>
									</div>
								</div>
							</div>";

					echo "<div class='modal fade' id='myModal".$count."' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
				<div class='modal-dialog' role='document'>
					<div class='modal-content modal-info'>
						<div class='modal-header'>
							<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>						
						</div>
						<div class='modal-body modal-spa'>
								<div class='col-md-5 span-2'>
											<div class='item'>
												<img src='".$row['photo']."' class='img-responsive' alt=''>
											</div>
								</div>
								<div class='col-md-7 span-1 '>
									<h3>".$row['name']."</h3>
									<div class='price_single'>
									  <span class='reducedfrom '>Rs.".$row['price']."</span>
									
									 <div class='clearfix'></div>
									</div>
									<h4 class='quick'>Quick Overview:</h4>
									<p class='quick_desc'> ".$row['description']."</p>
									 <div class='add-to'>
										   <button class='btn btn-danger my-cart-btn my-cart-btn1 ' data-id='".$row['prod_id']."' data-name='".$row['name']."' data-summary='summary 24' data-price='".$row['price']."' data-quantity='1' data-image='".$row['photo']."'>Add to Cart</button>
										</div>
								</div>
								<div class='clearfix'> </div>
							</div>
						</div>
					</div>
				</div>";
				$count++;
						}
							?>
				</div>
				<div class=" con-w3l agileinf" id="pc24" hidden="true">
					<?php
					
					 $sql = "select * from product_details where category_id=24 and stock > 0 and seller_id=".$_SESSION['current_seller']; 
					 $result = mysqli_query($conn,$sql);
					// $count=1;
					 while($row = mysqli_fetch_array($result)) {
					echo "<div class='col-md-3 pro-1'>
								<div class='col-m'>
								<a href='#' data-toggle='modal' data-target='#myModal".$count."' class='offer-img'>
										<img src='".$row['photo']."' class='img-responsive' alt=''>
									</a>
									<div class='mid-1'>
										<div class='women'>
											<h6>".$row['name']."</h6>							
										</div>
										<div class='mid-2'>
											<p ><em class='item_price'>Rs.".$row['price']."</em></p>
											  <div class='block'>
												<h6>Stock: ".$row['stock']."</h6>
											</div>
											<div class='clearfix'></div>
										</div>
											<div class='add'>
										   <button class='btn btn-danger my-cart-btn my-cart-b' data-id='".$row['prod_id']."' data-name='".$row['name']."' data-summary='summary 36' data-price='".$row['price']."' data-quantity='1' data-image='".$row['photo']."'>Add to Cart</button>
										   
										</div>
									</div>
								</div>
							</div>";

					echo "<div class='modal fade' id='myModal".$count."' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
				<div class='modal-dialog' role='document'>
					<div class='modal-content modal-info'>
						<div class='modal-header'>
							<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>						
						</div>
						<div class='modal-body modal-spa'>
								<div class='col-md-5 span-2'>
											<div class='item'>
												<img src='".$row['photo']."' class='img-responsive' alt=''>
											</div>
								</div>
								<div class='col-md-7 span-1 '>
									<h3>".$row['name']."</h3>
									<div class='price_single'>
									  <span class='reducedfrom '>Rs.".$row['price']."</span>
									
									 <div class='clearfix'></div>
									</div>
									<h4 class='quick'>Quick Overview:</h4>
									<p class='quick_desc'> ".$row['description']."</p>
									 <div class='add-to'>
										   <button class='btn btn-danger my-cart-btn my-cart-btn1 ' data-id='".$row['prod_id']."' data-name='".$row['name']."' data-summary='summary 24' data-price='".$row['price']."' data-quantity='1' data-image='".$row['photo']."'>Add to Cart</button>
										</div>
								</div>
								<div class='clearfix'> </div>
							</div>
						</div>
					</div>
				</div>";
				$count++;
						}
							?>
				</div>
			<div class=" con-w3l agileinf" id="pc25" hidden="true">
					<?php
					
					 $sql = "select * from product_details where category_id=25 and stock > 0 and seller_id=".$_SESSION['current_seller']; 
					 $result = mysqli_query($conn,$sql);
					// $count=1;
					 while($row = mysqli_fetch_array($result)) {
					echo "<div class='col-md-3 pro-1'>
								<div class='col-m'>
								<a href='#' data-toggle='modal' data-target='#myModal".$count."' class='offer-img'>
										<img src='".$row['photo']."' class='img-responsive' alt=''>
									</a>
									<div class='mid-1'>
										<div class='women'>
											<h6>".$row['name']."</h6>							
										</div>
										<div class='mid-2'>
											<p ><em class='item_price'>Rs.".$row['price']."</em></p>
											  <div class='block'>
												<h6>Stock: ".$row['stock']."</h6>
											</div>
											<div class='clearfix'></div>
										</div>
											<div class='add'>
										   <button class='btn btn-danger my-cart-btn my-cart-b' data-id='".$row['prod_id']."' data-name='".$row['name']."' data-summary='summary 36' data-price='".$row['price']."' data-quantity='1' data-image='".$row['photo']."'>Add to Cart</button>
										   
										</div>
									</div>
								</div>
							</div>";

					echo "<div class='modal fade' id='myModal".$count."' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
				<div class='modal-dialog' role='document'>
					<div class='modal-content modal-info'>
						<div class='modal-header'>
							<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>						
						</div>
						<div class='modal-body modal-spa'>
								<div class='col-md-5 span-2'>
											<div class='item'>
												<img src='".$row['photo']."' class='img-responsive' alt=''>
											</div>
								</div>
								<div class='col-md-7 span-1 '>
									<h3>".$row['name']."</h3>
									<div class='price_single'>
									  <span class='reducedfrom '>Rs.".$row['price']."</span>
									
									 <div class='clearfix'></div>
									</div>
									<h4 class='quick'>Quick Overview:</h4>
									<p class='quick_desc'> ".$row['description']."</p>
									 <div class='add-to'>
										   <button class='btn btn-danger my-cart-btn my-cart-btn1 ' data-id='".$row['prod_id']."' data-name='".$row['name']."' data-summary='summary 24' data-price='".$row['price']."' data-quantity='1' data-image='".$row['photo']."'>Add to Cart</button>
										</div>
								</div>
								<div class='clearfix'> </div>
							</div>
						</div>
					</div>
				</div>";
				$count++;
						}
							?>
				</div>
			<div class=" con-w3l agileinf" id="pc26" hidden="true">
					<?php
					
					 $sql = "select * from product_details where category_id=26 and stock > 0 and seller_id=".$_SESSION['current_seller']; 
					 $result = mysqli_query($conn,$sql);
					// $count=1;
					 while($row = mysqli_fetch_array($result)) {
					echo "<div class='col-md-3 pro-1'>
								<div class='col-m'>
								<a href='#' data-toggle='modal' data-target='#myModal".$count."' class='offer-img'>
										<img src='".$row['photo']."' class='img-responsive' alt=''>
									</a>
									<div class='mid-1'>
										<div class='women'>
											<h6>".$row['name']."</h6>							
										</div>
										<div class='mid-2'>
											<p ><em class='item_price'>Rs.".$row['price']."</em></p>
											  <div class='block'>
												<h6>Stock: ".$row['stock']."</h6>
											</div>
											<div class='clearfix'></div>
										</div>
											<div class='add'>
										   <button class='btn btn-danger my-cart-btn my-cart-b' data-id='".$row['prod_id']."' data-name='".$row['name']."' data-summary='summary 36' data-price='".$row['price']."' data-quantity='1' data-image='".$row['photo']."'>Add to Cart</button>
										   
										</div>
									</div>
								</div>
							</div>";

					echo "<div class='modal fade' id='myModal".$count."' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
				<div class='modal-dialog' role='document'>
					<div class='modal-content modal-info'>
						<div class='modal-header'>
							<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>						
						</div>
						<div class='modal-body modal-spa'>
								<div class='col-md-5 span-2'>
											<div class='item'>
												<img src='".$row['photo']."' class='img-responsive' alt=''>
											</div>
								</div>
								<div class='col-md-7 span-1 '>
									<h3>".$row['name']."</h3>
									<div class='price_single'>
									  <span class='reducedfrom '>Rs.".$row['price']."</span>
									
									 <div class='clearfix'></div>
									</div>
									<h4 class='quick'>Quick Overview:</h4>
									<p class='quick_desc'> ".$row['description']."</p>
									 <div class='add-to'>
										   <button class='btn btn-danger my-cart-btn my-cart-btn1 ' data-id='".$row['prod_id']."' data-name='".$row['name']."' data-summary='summary 24' data-price='".$row['price']."' data-quantity='1' data-image='".$row['photo']."'>Add to Cart</button>
										</div>
								</div>
								<div class='clearfix'> </div>
							</div>
						</div>
					</div>
				</div>";
				$count++;
						}
							?>
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
  $(function () {

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
        var prodArr = [];
      	var i=0;
      	var total = 0;	
        $.each(products, function(){
        	var temp = [];
          	temp[0]=this.id;
          	total = this.quantity * this.price;
          	temp[1]=this.name;
          	temp[2]=this.price;
          	temp[3]=this.quantity;
          	temp[4]=total;
          	prodArr[i++]=temp;
        });
        console.log(prodArr);
        document.cookie = 'prodArr='+prodArr;
        window.open("checkout.php");
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

  });
  </script>

  
  
  
  <!-- product -->
			<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
						<div class="modal-body modal-spa">
								<div class="col-md-5 span-2">
											<div class="item">
												<img src="images/of36.png" class="img-responsive" alt="">
											</div>
								</div>
								<div class="col-md-7 span-1 ">
									<h3>Baby Oil(250 g)</h3>
									<p class="in-para"> There are many variations of passages of Lorem Ipsum.</p>
									<div class="price_single">
									  <span class="reducedfrom "><del>$2.00</del>$1.50</span>
									
									 <div class="clearfix"></div>
									</div>
									<h4 class="quick">Quick Overview:</h4>
									<p class="quick_desc"> Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; es</p>
									 <div class="add-to">
										   <button class="btn btn-danger my-cart-btn my-cart-btn1 " data-id="36" data-name="Baby Oil" data-summary="summary 36" data-price="1.50" data-quantity="1" data-image="images/of36.png">Add to Cart</button>
										</div>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
				</div>
<!-- product -->
			<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
						<div class="modal-body modal-spa">
								<div class="col-md-5 span-2">
											<div class="item">
												<img src="images/of37.png" class="img-responsive" alt="">
											</div>
								</div>
								<div class="col-md-7 span-1 ">
									<h3>Soap(250 g)</h3>
									<p class="in-para"> There are many variations of passages of Lorem Ipsum.</p>
									<div class="price_single">
									  <span class="reducedfrom "><del>$10.00</del>$9.00</span>
									
									 <div class="clearfix"></div>
									</div>
									<h4 class="quick">Quick Overview:</h4>
									<p class="quick_desc"> Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; es</p>
									 <div class="add-to">
										   <button class="btn btn-danger my-cart-btn my-cart-btn1 " data-id="37" data-name="Soap" data-summary="summary 37" data-price="9.00" data-quantity="1" data-image="images/of37.png">Add to Cart</button>
										</div>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
				</div>
				<!-- product -->
			<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
						<div class="modal-body modal-spa">
								<div class="col-md-5 span-2">
											<div class="item">
												<img src="images/of38.png" class="img-responsive" alt="">
											</div>
								</div>
								<div class="col-md-7 span-1 ">
									<h3>Hair Gel(100 g)</h3>
									<p class="in-para"> There are many variations of passages of Lorem Ipsum.</p>
									<div class="price_single">
									  <span class="reducedfrom "><del>$3.00</del>$2.00</span>
									
									 <div class="clearfix"></div>
									</div>
									<h4 class="quick">Quick Overview:</h4>
									<p class="quick_desc"> Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; es</p>
									 <div class="add-to">
										   <button class="btn btn-danger my-cart-btn my-cart-btn1 " data-id="38" data-name="Hair Gel" data-summary="summary 38" data-price="2.00" data-quantity="1" data-image="images/of38.png">Add to Cart</button>
										</div>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
				</div>
				<!-- product -->
			<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
						<div class="modal-body modal-spa">
								<div class="col-md-5 span-2">
											<div class="item">
												<img src="images/of39.png" class="img-responsive" alt="">
											</div>
								</div>
								<div class="col-md-7 span-1 ">
									<h3>Lotion (100 g)</h3>
									<p class="in-para"> There are many variations of passages of Lorem Ipsum.</p>
									<div class="price_single">
									  <span class="reducedfrom "><del>$4.00</del>$3.50</span>
									
									 <div class="clearfix"></div>
									</div>
									<h4 class="quick">Quick Overview:</h4>
									<p class="quick_desc"> Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; es</p>
									 <div class="add-to">
										   <button class="btn btn-danger my-cart-btn my-cart-btn1 " data-id="39" data-name="Lotion " data-summary="summary 39" data-price="3.50" data-quantity="1" data-image="images/of39.png">Add to Cart</button>
										</div>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
				</div>
				<!-- product -->
			<div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
						<div class="modal-body modal-spa">
								<div class="col-md-5 span-2">
											<div class="item">
												<img src="images/of40.png" class="img-responsive" alt="">
											</div>
								</div>
								<div class="col-md-7 span-1 ">
									<h3>Shower Gel(250 g)</h3>
									<p class="in-para"> There are many variations of passages of Lorem Ipsum.</p>
									<div class="price_single">
									  <span class="reducedfrom "><del>$1.00</del>$0.70</span>
									
									 <div class="clearfix"></div>
									</div>
									<h4 class="quick">Quick Overview:</h4>
									<p class="quick_desc"> Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; es</p>
									 <div class="add-to">
										   <button class="btn btn-danger my-cart-btn my-cart-btn1 " data-id="40" data-name="Shower Gel" data-summary="summary 40" data-price="0.70" data-quantity="1" data-image="images/of40.png">Add to Cart</button>
										</div>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
				</div>
				<!-- product -->
			<div class="modal fade" id="myModal6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
						<div class="modal-body modal-spa">
								<div class="col-md-5 span-2">
											<div class="item">
												<img src="images/of41.png" class="img-responsive" alt="">
											</div>
								</div>
								<div class="col-md-7 span-1 ">
									<h3>Hair Color(250 g)</h3>
									<p class="in-para"> There are many variations of passages of Lorem Ipsum.</p>
									<div class="price_single">
									  <span class="reducedfrom "><del>$1.00</del>$0.70</span>
									
									 <div class="clearfix"></div>
									</div>
									<h4 class="quick">Quick Overview:</h4>
									<p class="quick_desc"> Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; es</p>
									 <div class="add-to">
										   <button class="btn btn-danger my-cart-btn my-cart-btn1 " data-id="41" data-name="Hair Color" data-summary="summary 41" data-price="0.70" data-quantity="1" data-image="images/of41.png">Add to Cart</button>
										</div>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
				</div>
				<!-- product -->
			<div class="modal fade" id="myModal7" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
						<div class="modal-body modal-spa">
								<div class="col-md-5 span-2">
											<div class="item">
												<img src="images/of42.png" class="img-responsive" alt="">
											</div>
								</div>
								<div class="col-md-7 span-1 ">
									<h3>Wipes(300 kg)</h3>
									<p class="in-para"> There are many variations of passages of Lorem Ipsum.</p>
									<div class="price_single">
									  <span class="reducedfrom "><del>$2.00</del>$1.00</span>
									
									 <div class="clearfix"></div>
									</div>
									<h4 class="quick">Quick Overview:</h4>
									<p class="quick_desc"> Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; es</p>
									 <div class="add-to">
										   <button class="btn btn-danger my-cart-btn my-cart-btn1 " data-id="42" data-name="Wipes" data-summary="summary 42" data-price="1.00" data-quantity="1" data-image="images/of42.png">Add to Cart</button>
										</div>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
				</div>
				<!-- product -->
			<div class="modal fade" id="myModal8" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
						<div class="modal-body modal-spa">
								<div class="col-md-5 span-2">
											<div class="item">
												<img src="images/of43.png" class="img-responsive" alt="">
											</div>
								</div>
								<div class="col-md-7 span-1 ">
									<h3>Essential Oils(200 g)</h3>
									<p class="in-para"> There are many variations of passages of Lorem Ipsum.</p>
									<div class="price_single">
									  <span class="reducedfrom "><del>$4.00</del>$3.50</span>
									
									 <div class="clearfix"></div>
									</div>
									<h4 class="quick">Quick Overview:</h4>
									<p class="quick_desc"> Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; es</p>
									 <div class="add-to">
										   <button class="btn btn-danger my-cart-btn my-cart-btn1 " data-id="43" data-name="Essential Oils" data-summary="summary 43" data-price="3.50" data-quantity="1" data-image="images/of43.png">Add to Cart</button>
										</div>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
				</div>
				<!-- product -->
			<div class="modal fade" id="myModal9" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
						<div class="modal-body modal-spa">
								<div class="col-md-5 span-2">
											<div class="item">
												<img src="images/of44.png" class="img-responsive" alt="">
											</div>
								</div>
								<div class="col-md-7 span-1 ">
									<h3>Cream(150 g)</h3>
									<p class="in-para"> There are many variations of passages of Lorem Ipsum.</p>
									<div class="price_single">
									  <span class="reducedfrom "><del>$2.00</del>$1.50</span>
									
									 <div class="clearfix"></div>
									</div>
									<h4 class="quick">Quick Overview:</h4>
									<p class="quick_desc"> Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; es</p>
									 <div class="add-to">
										   <button class="btn btn-danger my-cart-btn my-cart-btn1 " data-id="44" data-name="Cream" data-summary="summary 44" data-price="1.50" data-quantity="1" data-image="images/of44.png">Add to Cart</button>
										</div>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
				</div>
				<!-- product -->
			<div class="modal fade" id="myModal10" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
						<div class="modal-body modal-spa">
								<div class="col-md-5 span-2">
											<div class="item">
												<img src="images/of45.png" class="img-responsive" alt="">
											</div>
								</div>
								<div class="col-md-7 span-1 ">
									<h3>Hair Color(250 g)</h3>
									<p class="in-para"> There are many variations of passages of Lorem Ipsum.</p>
									<div class="price_single">
									  <span class="reducedfrom "><del>$1.00</del>$0.70</span>
									
									 <div class="clearfix"></div>
									</div>
									<h4 class="quick">Quick Overview:</h4>
									<p class="quick_desc"> Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; es</p>
									 <div class="add-to">
										   <button class="btn btn-danger my-cart-btn my-cart-btn1 " data-id="45" data-name="Hair Color" data-summary="summary 45" data-price="0.70" data-quantity="1" data-image="images/of45.png">Add to Cart</button>
										</div>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
				</div>
				<!-- product -->
			<div class="modal fade" id="myModal11" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
						<div class="modal-body modal-spa">
								<div class="col-md-5 span-2">
											<div class="item">
												<img src="images/of46.png" class="img-responsive" alt="">
											</div>
								</div>
								<div class="col-md-7 span-1 ">
									<h3>Baby Care(1 kg)</h3>
									<p class="in-para"> There are many variations of passages of Lorem Ipsum.</p>
									<div class="price_single">
									  <span class="reducedfrom "><del>$2.00</del>$1.00</span>
									
									 <div class="clearfix"></div>
									</div>
									<h4 class="quick">Quick Overview:</h4>
									<p class="quick_desc"> Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; es</p>
									 <div class="add-to">
										   <button class="btn btn-danger my-cart-btn my-cart-btn1 " data-id="46" data-name="Baby Care" data-summary="summary 46" data-price="1.00" data-quantity="1" data-image="images/of46.png">Add to Cart</button>
										</div>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
				</div>
				<!-- product -->
			<div class="modal fade" id="myModal12" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
						<div class="modal-body modal-spa">
								<div class="col-md-5 span-2">
											<div class="item">
												<img src="images/of47.png" class="img-responsive" alt="">
											</div>
								</div>
								<div class="col-md-7 span-1 ">
									<h3>Lotion(100 g)</h3>
									<p class="in-para"> There are many variations of passages of Lorem Ipsum.</p>
									<div class="price_single">
									  <span class="reducedfrom "><del>$4.00</del>$3.50</span>
									
									 <div class="clearfix"></div>
									</div>
									<h4 class="quick">Quick Overview:</h4>
									<p class="quick_desc"> Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; es</p>
									 <div class="add-to">
										   <button class="btn btn-danger my-cart-btn my-cart-btn1 " data-id="47" data-name="Lotion" data-summary="summary 47" data-price="3.50" data-quantity="1" data-image="images/of47.png">Add to Cart</button>
										</div>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
				</div>
				
</body>
</html>