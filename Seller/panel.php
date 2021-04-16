<?php
    
    session_start();
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "iwt_groceryproject";

    $conn = mysqli_connect($server,$user,$pass,$db);

    if(isset($_SESSION['seller_id']))
    {
    if(isset($_POST['b1']))
    {
        $req = $_POST['req'];
        $man = $_POST['man'];

        $sql = "update seller_details set orders_status=".$req.", holiday_status=".$man." where seller_id=".$_SESSION['seller_id'];
        mysqli_query($conn,$sql);

        header('location: cntrlPanel.php');
    }
    }
    else
    {
        header('location: login.php');   
    }
?>
