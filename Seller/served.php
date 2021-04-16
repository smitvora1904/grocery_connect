<?php
    
    session_start();
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "iwt_groceryproject";

    $conn = mysqli_connect($server,$user,$pass,$db);

    if(isset($_SESSION['seller_id']))
    {
        if(isset($_POST['servedBtn']))
        {
            $arr = explode("#",$_POST['servedBtn']);

            mysqli_query($conn,"update staff set status=0 where staff_id=".$arr[0]);

            if($arr[2] == "credit")
            {
                mysqli_query($conn,"update orders_log set status=1 where order_id=".$arr[1]);
            }
            else
            {
                mysqli_query($conn,"update orders_log set status=2 where order_id=".$arr[1]);
            }

            mysqli_query($conn,"delete from delivery_management where order_id=".$arr[1]);

        header('location: index.php');
        }
    }
        else
        {
            header('location: login.php');    
        }

?>