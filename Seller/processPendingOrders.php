<?php
    
    session_start();
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "iwt_groceryproject";

    $conn = mysqli_connect($server,$user,$pass,$db);

    if(isset($_SESSION['seller_id']))
    {
        $sql = "select name,email from seller_details where seller_id='".$_SESSION['seller_id']."'";

        $result = mysqli_query($conn,$sql);

        $row = mysqli_fetch_array($result);

        if(is_array($row))
        {
            $name = $row['name'];
            $email = $row['email'];
            //$contact = $row['contact'];
        }
        if(isset($_POST['btn']))
        {
        if($_POST['btn']=="Approve")
        {
            $sqli="select order_id,cust_id,seller_id,products,total_amt,payMode,date,quantity from orders";
            $resulti = mysqli_query($conn,$sqli);
            $rowi = mysqli_fetch_array($resulti);


            $product=explode("#", $rowi['products']);
            $quantity=explode("#",$rowi['quantity']);
            $i=0;
            while($i!=(count($product)-1))
            {
                $sql3="update product_details set stock = stock -".$quantity[$i]." where prod_id=".$product[$i];
                mysqli_query($conn,$sql3);
                                                    

                $i++;  
            }
            $sqli2="insert into orders_log (order_id,cust_id,seller_id,products,total_amt,status,date) values(".$rowi['order_id'].",".$rowi['cust_id'].",".$_SESSION['seller_id'].",'".$rowi['products']."',".$rowi['total_amt'].",3,'".$rowi['date']."')";
            mysqli_query($conn,$sqli2);

            $sqli3="insert into delivery_management (staff_id,order_id,cust_id,pay_method,delivery_feedback,seller_id) values(0,".$rowi['order_id'].",".$rowi['cust_id'].",'".$rowi['payMode']."','good',".$_SESSION['seller_id'].")";
            mysqli_query($conn,$sqli3);

            if($rowi['payMode'] == "credit")
            {
                $ndate = date('Y-m-d', strtotime($rowi['date']. ' + 30 days'));
                $sqli4="update credit_customers set current_due_amt=".$rowi['total_amt'].", next_due_date='".$ndate."' where cust_id=".$rowi['cust_id'];
                mysqli_query($conn,$sqli4);   
            }

            $sqli4="delete from orders where order_id=".$rowi['order_id'];
            mysqli_query($conn,$sqli4);

        }
        if($_POST['btn']=="Cancel")
        {
            $sqli="select order_id,cust_id,seller_id,products,total_amt,payMode,date from orders";
            $resulti = mysqli_query($conn,$sqli);
            $rowi = mysqli_fetch_array($resulti);

            $sqli4="delete from orders where order_id=".$rowi['order_id'];
            mysqli_query($conn,$sqli4);
        }
        header('location: pending_orders.php'); 
    }
    }
        else
        {
            header('location: login.php');    
        }

?>