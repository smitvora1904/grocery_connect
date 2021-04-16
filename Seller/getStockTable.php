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
            $sql = "select prod_id,name,category_id,price,stock from product_details where seller_id=".$_SESSION['seller_id']." and brand_id in(select brand_id from brand where brand='".$val."')";
            $result = mysqli_query($conn,$sql);

            if(mysqli_num_rows($result) > 0)
            {
            while ($row=mysqli_fetch_array($result)) {
                
                $sql2 = "select category from product_category where category_id=".$row['category_id'];
                $result2 = mysqli_query($conn,$sql2);
                $row2=mysqli_fetch_array($result2);

                echo "<tr>";
                echo "<td>".$row['prod_id']."</td>";
                echo "<td>".$row['name']."</td>";
                echo "<td>".$row2['category']."</td>";
                echo "<td>".$val."</td>";
                echo "<td>".$row['price']."</td>";
                if($row['stock']<15)
                {
                    echo "<td style='color: red;'>".$row['stock']."</td>";    
                }
                else
                {
                    echo "<td>".$row['stock']."</td>";    
                }
                
                
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
            $sql = "select prod_id,name,brand_id,price,stock from product_details where seller_id=".$_SESSION['seller_id']." and category_id in(select category_id from product_category where category='".$val."')";
            $result = mysqli_query($conn,$sql);

            if(mysqli_num_rows($result) > 0)
            {
            while ($row=mysqli_fetch_array($result)) {
                
                $sql2 = "select brand from brand where brand_id=".$row['brand_id'];
                $result2 = mysqli_query($conn,$sql2);
                $row2=mysqli_fetch_array($result2);

                echo "<tr>";
                echo "<td>".$row['prod_id']."</td>";
                echo "<td>".$row['name']."</td>";
                echo "<td>".$val."</td>";
                echo "<td>".$row2['brand']."</td>";
                echo "<td>".$row['price']."</td>";
                if($row['stock']<15)
                {
                    echo "<td style='color: red;'>".$row['stock']."</td>";    
                }
                else
                {
                    echo "<td>".$row['stock']."</td>";    
                }
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
            $sql = "select prod_id,name,category_id,brand_id,price,stock from product_details where seller_id=".$_SESSION['seller_id']." and name='".$val."'";
            $result = mysqli_query($conn,$sql);

            if(mysqli_num_rows($result) > 0)
            {
            while ($row=mysqli_fetch_array($result)) {
            $sql2 = "select category from product_category where category_id=".$row['category_id'];
            $result2 = mysqli_query($conn,$sql2);
            $row2=mysqli_fetch_array($result2);


            $sql3 = "select brand from brand where brand_id=".$row['brand_id'];
            $result3 = mysqli_query($conn,$sql3);
            $row3=mysqli_fetch_array($result3);

            echo "<tr>";
            echo "<td>".$row['prod_id']."</td>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row2['category']."</td>";
            echo "<td>".$row3['brand']."</td>";
            echo "<td>".$row['price']."</td>";
            if($row['stock']<15)
                {
                    echo "<td style='color: red;'>".$row['stock']."</td>";    
                }
                else
                {
                    echo "<td>".$row['stock']."</td>";    
                }
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