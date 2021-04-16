<?php
	 session_start();
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "iwt_groceryproject";

    $conn = mysqli_connect($server,$user,$pass,$db);

    if(isset($_SESSION['seller_id']))
    {
    	$sc = $_POST['sc'];
    	$sb = $_POST['sb'];
    	$sb2 = $_POST['sb2'];
    	$sp = $_POST['sp'];
    	$p = $_POST['p'];
    	$up = $_POST['up'];
    	$des = $_POST['des'];
    	$filee = $_FILES['f1']['name'];
		$target_dir = "uploads/";

		$target_file = $target_dir.basename($_FILES['f1']['name']);

		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		$extension_arr = array("jpg","jpeg","png","gif","jfif");

    	$cat = 0;
    	$brand = 0;
        $cat = $sc;

    	if($sb == 0)
    	{    		
    		$sql = "insert into brand (brand) values('".$sb2."')";
            echo "<script> alert('$sb2')</script>";
    		mysqli_query($conn,$sql);

    		$sql = "select brand_id from brand where brand='".$sb2."'";
    		$result = mysqli_query($conn,$sql);
        	$row = mysqli_fetch_array($result);
        	if(is_array($row))
        	{
        		$brand = $row['brand_id'];
        	}
    	}
    	else
    	{
    		$brand = $sb;	
    	}

    	if(in_array($imageFileType, $extension_arr))
    	{
    		$sql = "insert into product_details (name,brand_id,stock,photo,price,description,category_id,seller_id) values('".$sp."',".$brand.",".$up.",'".$target_file."',".$p.",'".$des."',".$cat.",".$_SESSION['seller_id'].")";
    		
    		//echo $sql;
    		mysqli_query($conn,$sql);
			move_uploaded_file($_FILES['f1']['tmp_name'], $target_dir.$filee);		
    	}

    	header('location: add_new_product.php');
    }
    else
    {
        header('location: login.php');    
    }
?>