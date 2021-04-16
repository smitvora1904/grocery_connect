<?php
	 session_start();
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "iwt_groceryproject";

    $conn = mysqli_connect($server,$user,$pass,$db);

    if(isset($_SESSION['seller_id']))
    {
        if(isset($_GET['b1']))
        {
            $stk = $_GET['stockIn'];
            $prod_id = $_GET['sp'];
            $sql = "update product_details set stock = stock + ".$stk." where prod_id=".$prod_id." and seller_id=".$_SESSION['seller_id'];
            mysqli_query($conn,$sql);
            header('location: addStock.php');       
        }

        $prod_id = $_GET['pid'];
        $sql = "select stock,price from product_details where prod_id=".$prod_id." and seller_id=".$_SESSION['seller_id'];
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);
        ?>
         <div class="row form-group">
        <div class="col col-md-3">
        <label class=" form-control-label">Current Price</label>
        </div>
        <div class="col-12 col-md-9">
        <p class="form-control-static" id="price"><?php echo $row['price'] ?> Rs.</p>
        </div>
        </div>
        <div class="row form-group">
        <div class="col col-md-3">
        <label class=" form-control-label">Current Stock</label>
        </div>
        <div class="col-12 col-md-9">
        <p class="form-control-static" id="stock"><?php echo $row['stock'] ?> (KG or Units)</p>
        </div>
        </div>
    <?php
    }
    else
    {
        header('location: login.php');    
    }
?>