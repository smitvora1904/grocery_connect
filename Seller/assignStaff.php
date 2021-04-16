<?php
	 session_start();
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "iwt_groceryproject";

    $conn = mysqli_connect($server,$user,$pass,$db);

    if(isset($_SESSION['seller_id']))
    {
        $id = $_POST['assignStaff'];
        $oid = $_POST['orders'];

        //echo $id."<br>".$oid;

        if($id !=0 && $oid !=0)
        {
            $sql = "update delivery_management set staff_id=".$id." where order_id=".$oid;
            mysqli_query($conn,$sql);


            $sql = "update orders_log set staff_id=".$id." where order_id=".$oid;
            mysqli_query($conn,$sql);

            //echo $sql;
            $sql = "update staff set status=1 where staff_id=".$id;
            mysqli_query($conn,$sql);
        }
        header('location: deliveryMgmt.php');
    }
    else
    {
        header('location: login.php');    
    }
?>