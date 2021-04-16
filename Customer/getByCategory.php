<?php
	 session_start();
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "iwt_groceryproject";

    $conn = mysqli_connect($server,$user,$pass,$db);

        $category_id = $_GET['value'];
        $operation = $_GET['opt'];
    
        //$sql = "select * from product_details where category_id=".$category_id." and seller_id=".$_SESSION['current_seller'];
        if($operation == 0)
        {
            $sql = "select * from product_details where seller_id=".$_SESSION['current_seller'];   
        }
        else if($operation == 1)
        {
            $sql = "select * from product_details";   
        }
        $result = mysqli_query($conn,$sql);
        $count=1;
                while($row = mysqli_fetch_array($result)) {
                echo "<div class='col-md-3 pro-1'>
                                <div class='col-m'>
                                <a href='#' data-toggle='modal' data-target='#myModal".$count."' class='offer-img'>
                                        <img src='".$row['photo']."' class='img-responsive' alt=''>
                                    </a>
                                    <div class='mid-1'>
                                        <div class='women'>
                                            <h6><a href='single.php'>".$row['name']."</a></h6>                          
                                        </div>
                                        <div class='mid-2'>
                                            <p ><em class='item_price'>Rs.".$row['price']."</em></p>
                                              <div class='block'>
                                                <div class='starbox small ghosting'> </div>
                                            </div>
                                            <div class='clearfix'></div>
                                        </div>
                                            <div class='add'>
                                            <form method='post'>
                                           <button id='cartBtn' name='cartBtn' class='btn btn-danger my-cart-btn my-cart-b' data-id='".$row['prod_id']."' data-name='".$row['name']."' data-summary='summary 36' data-price='".$row['price']."' data-quantity='1' data-image='".$row['photo']."'>Add to Cart</button>
                                           <form>
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
                                                <img src='".$row['photo']."' class='img-responsive' alt=''>
                                            </div>
                                </div>
                                <div class='col-md-7 span-1 '>
                                    <h3>".$row['name']."</h3>
                                    <p class='in-para'> There are many variations of passages of Lorem Ipsum.</p>
                                    <div class='price_single'>
                                      <span class='reducedfrom '>Rs.".$row['price']."</span>
                                    
                                     <div class='clearfix'></div>
                                    </div>
                                    <h4 class='quick'>Quick Overview:</h4>
                                    <p class='quick_desc'> ".$row['description']."</p>
                                     <div class='add-to'>
                                        <form method='post'>
                                           <button id='cartBtn' name='cartBtn' class='btn btn-danger my-cart-btn my-cart-btn1 ' data-id='".$row['prod_id']."' data-name='".$row['name']."' data-summary='summary 24' data-price='".$row['price']."' data-quantity='1' data-image='".$row['photo']."'>Add to Cart</button></form>
                                        </div>
                                </div>
                                <div class='clearfix'> </div>
                            </div>
                        </div>
                    </div>
                </div>";
                $count++;
            }
                
?>
