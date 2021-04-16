<?php
 session_start();
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "iwt_groceryproject";

    $conn = mysqli_connect($server,$user,$pass,$db);

$id = $_GET['id']; // get id through query string
echo $id;

$del = mysqli_query($conn,"update seller_details set status=1 where seller_id=".$id); // delete query
echo $del;

if($del)
{
    mysqli_close($conn); // Close connection
    header("location:creditSys.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error updateing record"; // display error message if not delete
}
?>

