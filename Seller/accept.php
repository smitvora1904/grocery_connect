<?php
 session_start();
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "iwt_groceryproject";

    $conn = mysqli_connect($server,$user,$pass,$db);

$id = $_GET['id']; // get id through query string
echo $id;

$del = mysqli_query($conn,"update customer_details set credit_req=0 where cust_id=".$id); // delete query
//echo $del;

$in = mysqli_query($conn,"insert into credit_customers values(".$_SESSION['seller_id'].",".$id.",30,5000,0,0)");
if($del and $in)
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

