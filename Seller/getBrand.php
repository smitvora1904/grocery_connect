<?php
	 session_start();
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "iwt_groceryproject";

    $conn = mysqli_connect($server,$user,$pass,$db);

    if(isset($_SESSION['seller_id']))
    {
        $category_id = $_GET['value'];
        
        $sql = "select * from brand where brand_id in(select brand_id from product_details where category_id=".$category_id." and seller_id=".$_SESSION['seller_id'].")";
        $result = mysqli_query($conn,$sql);
        echo "<option value='0'>Please select</option>";
        while($row = mysqli_fetch_array($result)) {
            echo "<option value=".$row['brand_id'].">".$row['brand']."</option>";
        }
        echo "</select>";
    }
    else
    {
        header('location: login.php');    
    }
?>