<?php
	 session_start();
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "iwt_groceryproject";

    $conn = mysqli_connect($server,$user,$pass,$db);

        $sellerCity = $_GET['value'];
        $operation = $_GET['opt'];
        
        if($operation == 0)
        {
            $sql = "select * from seller_details where status=1 and city='".$sellerCity."'";
        }
        else if($operation == 1)
        {
            $sql = "select * from seller_details where status=1 and  shop_name='".$sellerCity."'";   
        }
        
        $result = mysqli_query($conn,$sql);
        $count=17;
                while($row = mysqli_fetch_array($result)) {
                $sql2 = "select count(order_id) from orders_log where seller_id=".$row['seller_id'];
                $result2 = mysqli_query($conn,$sql2);
                $row2 = mysqli_fetch_array($result2);
                    echo "<div class='col-md-3 pro-1'>
                                <div class='col-m'>
                                <a href='#'' data-toggle='modal' data-target='#myModal".$count."' class='offer-img'>
                                        <img src='images/ab.jpg' class='img-responsive' alt=''>
                                    </a>
                                    <div class='mid-1'>
                                        <div class='women'>
                                            <h6>".$row['shop_name']."</h6>
                                            <p class='in-para'>".$row['shop_address']." ,".$row['city']."</p>                            
                                        </div>
                                        <div class='mid-2'>
                                              <div class='block'>
                                                <div class='starbox small ghosting'> </div>
                                            </div>
                                            <div class='clearfix'></div>
                                        </div>
                                            <div class='add add-2'>
                                            <form method='post'>
                                           <button class='btn btn-danger my-cart-btn my-cart-b' name='sellerBtn' value='".$row['seller_id']."'>Select Seller/Shop</button>
                                           </form>
                                        </div>
                                    </div>
                                </div>
                            </div>";

                echo "<div class='modal fade' id='myModal".$count."' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
                <div class='modal-dialog' role='document'>
                    <div class='modal-content modal-info'>
                        <div class='modal-header'>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>                        
                        </div>
                        <div class='modal-body modal-spa'>
                                <div class='col-md-5 span-2'>
                                            <div class='item'>
                                                <img src='images/ab.jpg' class='img-responsive' alt=''>
                                            </div>
                                </div>
                                <div class='col-md-7 span-1'>
                                    <h3>".$row['shop_name']."</h3>
                                    <p class='in-para'>Email: ".$row['email']."  Phone: ".$row['contact']."</p>
                                    <h4 class='quick'>Quick Overview:</h4>
                                    <p class='quick_desc'> 
                                    Happy Customers Served: ".$row2['count(order_id)']."<br>

                                    </p>
                                </div>
                                <div class='clearfix'> </div>
                            </div>
                        </div>
                    </div>
                </div>";

                $count++;
            }
                
?>