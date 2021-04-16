<?php
	 session_start();
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "iwt_groceryproject";

    $conn = mysqli_connect($server,$user,$pass,$db);

    if(isset($_SESSION['seller_id']))
    {
        $id = $_GET['value'];
        $val = $_GET['val'];
        if($id == 1)
        {
            $sql= "select order_id,date,cust_id,total_amt from orders_log where seller_id=".$_SESSION['seller_id']." and date='".$val."' and status in(1,2)";
            /*$sql = "select prod_id,name,category_id,price,stock from product_details where seller_id=".$_SESSION['seller_id']." and brand_id in(select brand_id from brand where brand='".$val."')";*/
            $result = mysqli_query($conn,$sql);

            if(mysqli_num_rows($result) > 0)
            {
            while ($row=mysqli_fetch_array($result)) {
                $sql2 = "select name,contact,city from customer_details where cust_id=".$row['cust_id'];
                $result2 = mysqli_query($conn,$sql2);
                $row2=mysqli_fetch_array($result2);

                echo "<tr>";
                echo "<td>".$val."</td>";
                echo "<td>".$row['order_id']."</td>";
                echo "<td>".$row2['name']."</td>";
                echo "<td>".$row2['contact']."</td>";
                echo "<td>".$row2['city']."</td>";
                echo "<td>".$row['total_amt']."</td>";
                echo "</tr>";
            }
            }
            else
            {
                echo "<tr>";
                echo "<td>N/A</td>";
                echo "<td>N/A</td>";
                echo "<td>N/A</td>";
                echo "<td>N/A</td>";
                echo "<td>N/A</td>";
                echo "<td>N/A</td>";
                echo "</tr>";   
            }
        }

        if($id == 11)
        {
            $sql= "select order_id,date,cust_id,total_amt from orders_log where seller_id=".$_SESSION['seller_id']." and date='".$val."' and status=0";
            /*$sql = "select prod_id,name,category_id,price,stock from product_details where seller_id=".$_SESSION['seller_id']." and brand_id in(select brand_id from brand where brand='".$val."')";*/
            $result = mysqli_query($conn,$sql);

            if(mysqli_num_rows($result) > 0)
            {
            while ($row=mysqli_fetch_array($result)) {
                $sql2 = "select name,contact,city from customer_details where cust_id=".$row['cust_id'];
                $result2 = mysqli_query($conn,$sql2);
                $row2=mysqli_fetch_array($result2);

                echo "<tr>";
                echo "<td>".$val."</td>";
                echo "<td>".$row['order_id']."</td>";
                echo "<td>".$row2['name']."</td>";
                echo "<td>".$row2['contact']."</td>";
                echo "<td>".$row2['city']."</td>";
                echo "<td>".$row['total_amt']."</td>";
                echo "</tr>";
            }
            }
            else
            {
                echo "<tr>";
                echo "<td>N/A</td>";
                echo "<td>N/A</td>";
                echo "<td>N/A</td>";
                echo "<td>N/A</td>";
                echo "<td>N/A</td>";
                echo "<td>N/A</td>";
                echo "</tr>";   
            }
        }
        
        if($id == 2)
        {
             $sql= "select order_id,date,cust_id,total_amt from orders_log where seller_id=".$_SESSION['seller_id']." and order_id=".$val." and status in(1,2)";
            $result = mysqli_query($conn,$sql);

            if(mysqli_num_rows($result) > 0)
            {
            while ($row=mysqli_fetch_array($result)) {
                
                $sql2 = "select name,contact,city from customer_details where cust_id=".$row['cust_id'];
                $result2 = mysqli_query($conn,$sql2);
                $row2=mysqli_fetch_array($result2);

                 echo "<tr>";
                echo "<td>".$row['date']."</td>";
                echo "<td>".$val."</td>";
                echo "<td>".$row2['name']."</td>";
                echo "<td>".$row2['contact']."</td>";
                echo "<td>".$row2['city']."</td>";
                echo "<td>".$row['total_amt']."</td>";
                echo "</tr>";
            }
            }
            else
            {
                echo "<tr>";
                echo "<td>N/A</td>";
                echo "<td>N/A</td>";
                echo "<td>N/A</td>";
                echo "<td>N/A</td>";
                echo "<td>N/A</td>";
                echo "<td>N/A</td>";
                echo "</tr>";   
            }       
        }

        if($id == 22)
        {
             $sql= "select order_id,date,cust_id,total_amt from orders_log where seller_id=".$_SESSION['seller_id']." and order_id=".$val." and status=0";
            $result = mysqli_query($conn,$sql);

            if(mysqli_num_rows($result) > 0)
            {
            while ($row=mysqli_fetch_array($result)) {
                
                $sql2 = "select name,contact,city from customer_details where cust_id=".$row['cust_id'];
                $result2 = mysqli_query($conn,$sql2);
                $row2=mysqli_fetch_array($result2);

                 echo "<tr>";
                echo "<td>".$row['date']."</td>";
                echo "<td>".$val."</td>";
                echo "<td>".$row2['name']."</td>";
                echo "<td>".$row2['contact']."</td>";
                echo "<td>".$row2['city']."</td>";
                echo "<td>".$row['total_amt']."</td>";
                echo "</tr>";
            }
            }
            else
            {
                echo "<tr>";
                echo "<td>N/A</td>";
                echo "<td>N/A</td>";
                echo "<td>N/A</td>";
                echo "<td>N/A</td>";
                echo "<td>N/A</td>";
                echo "<td>N/A</td>";
                echo "</tr>";   
            }       
        }
        if($id == 3)
        {
             $sql= "select order_id,date,cust_id,total_amt from orders_log where seller_id=".$_SESSION['seller_id']." and cust_id=".$val." and status in(1,2)";
            $result = mysqli_query($conn,$sql);

            if(mysqli_num_rows($result) > 0)
            {
            while ($row=mysqli_fetch_array($result)) {
             $sql2 = "select name,contact,city from customer_details where cust_id=".$row['cust_id'];
            $result2 = mysqli_query($conn,$sql2);
            $row2=mysqli_fetch_array($result2);


             echo "<tr>";
                echo "<td>".$row['date']."</td>";
                echo "<td>".$row['order_id']."</td>";
                echo "<td>".$row2['name']."</td>";
                echo "<td>".$row2['contact']."</td>";
                echo "<td>".$row2['city']."</td>";
                echo "<td>".$row['total_amt']."</td>";
                echo "</tr>";
            }
            }
            else
            {
                echo "<tr>";
                echo "<td>N/A</td>";
                echo "<td>N/A</td>";
                echo "<td>N/A</td>";
                echo "<td>N/A</td>";
                echo "<td>N/A</td>";
                echo "<td>N/A</td>";
                echo "</tr>"; 
            }   
        }
        if($id == 33)
        {
             $sql= "select order_id,date,cust_id,total_amt from orders_log where seller_id=".$_SESSION['seller_id']." and cust_id=".$val." and status=0";
            $result = mysqli_query($conn,$sql);

            if(mysqli_num_rows($result) > 0)
            {
            while ($row=mysqli_fetch_array($result)) {
             $sql2 = "select name,contact,city from customer_details where cust_id=".$row['cust_id'];
            $result2 = mysqli_query($conn,$sql2);
            $row2=mysqli_fetch_array($result2);


             echo "<tr>";
                echo "<td>".$row['date']."</td>";
                echo "<td>".$row['order_id']."</td>";
                echo "<td>".$row2['name']."</td>";
                echo "<td>".$row2['contact']."</td>";
                echo "<td>".$row2['city']."</td>";
                echo "<td>".$row['total_amt']."</td>";
                echo "</tr>";
            }
            }
            else
            {
                echo "<tr>";
                echo "<td>N/A</td>";
                echo "<td>N/A</td>";
                echo "<td>N/A</td>";
                echo "<td>N/A</td>";
                echo "<td>N/A</td>";
                echo "<td>N/A</td>";
                echo "</tr>"; 
            }   
        }
    }
    else
    {
        header('location: login.php');    
    }
?>