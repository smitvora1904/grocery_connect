<?php
 session_start();
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "iwt_groceryproject";

    $conn = mysqli_connect($server,$user,$pass,$db);

$id = $_GET['id']; // get id through query string

$del = mysqli_query($conn,"delete from staff where staff_id=".$id); // delete query

if($del)
{
    mysqli_close($conn); // Close connection
    header("location:staff.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>

