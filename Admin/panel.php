<?php
    
    session_start();
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "iwt_groceryproject";

    $conn = mysqli_connect($server,$user,$pass,$db);

    if(isset($_SESSION['admin_id']))
    {
    if(isset($_POST['b1']))
    {
        $req = $_POST['req'];
        $man = $_POST['man'];

        $sql = "update admin set requests=".$req.", maintanance=".$man." where admin_id=".$_SESSION['admin_id'];
        mysqli_query($conn,$sql);

        header('location: cntrlPanel.php');
    }
    }
    else
    {
        header('location: login.php');   
    }
?>
