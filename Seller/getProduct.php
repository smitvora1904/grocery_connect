<?php
	 session_start();
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "iwt_groceryproject";

    $conn = mysqli_connect($server,$user,$pass,$db);

    if(isset($_SESSION['seller_id']))
    {
        $brand_id = $_GET['br'];
        $ct_id = $_GET['cr'];

        $sql = "select prod_id,name from product_details where brand_id=".$brand_id." and category_id=".$ct_id." and seller_id=".$_SESSION['seller_id'];
        $result = mysqli_query($conn,$sql);
        echo "<option value='0'>Please Select</option>";
        while($row = mysqli_fetch_array($result)) {
            echo "<option value= ".$row['prod_id'].">".$row['name']."</option>";
        }
        echo "</select>";
    }
    else
    {
        header('location: login.php');    
    }
?>