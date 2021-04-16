
?>

<?php
 session_start();
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "iwt_groceryproject";

    $conn = mysqli_connect($server,$user,$pass,$db);

    $req = $_POST['hidden_req'];
    $man = $_POST['hidden_man'];

    if($req == 'on' && $man == 'on')
    {
    	$status = 11;
    }
    else if($req == 'on' && $man == 'off')
    {
    	$status = 10;	
    }
    else if($req == 'off' && $man == 'on')
    {
    	$status = 01;	
    }
    else if($req == 'off' && $man == 'off')
    {
    	$status = 00;	
    }

    $del = mysqli_query($conn,"update admin set status=".$status);

if($del)
{
    mysqli_close($conn); // Close connection
    echo 'done';	
}
?>

