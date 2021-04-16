<?php
 session_start();
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "iwt_groceryproject";

    $conn = mysqli_connect($server,$user,$pass,$db);

$id = $_GET['id']; // get id through query string

$del = mysqli_query($conn,"update credit_customers set current_due_amt=0, next_due_date=0 where cust_id=".$id); // delete query

$del = mysqli_query($conn,"update orders_log set status=2 where status=1 and cust_id=".$id); // delete query

if($del)
{
    mysqli_close($conn); // Close connection
    header("location:cust_book.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>

