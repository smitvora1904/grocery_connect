<?php
     session_start();

    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "iwt_groceryproject";

    $conn = mysqli_connect($server,$user,$pass,$db);

    $pr=$_GET['pr'];
    $_SESSION['currentproduct']=$pr;
    $br=$_GET['br'];
    $cr=$_GET['cr'];

    $sql = "select * from product_details where prod_id=".$pr." and seller_id=".$_SESSION['seller_id'];
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);


?>

<div class="card-body card-block">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Product Id</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <label id="productid" name="productid"><?php echo $pr ?></label>
                                                </div>
                                            </div>
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label style="margin-left: 0px;margin-top: 10px;" class=" form-control-label">Category</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <?php
                                                    echo"<select name='selectgc' id='gc' class='form-control'  style='margin-top: 10px;margin-right: 50px;width:600px'>";
                                                        $sql2 = "select * from product_category where category_id=".$cr;
                                                        $result2=mysqli_query($conn,$sql2);
                                                        $row2 = mysqli_fetch_array($result2);

                                                        echo"<option value=".$cr.">".$row2['category']."</option>";
                                                        $sql3 = "select * from product_category where category_id not in(".$cr.")";
                                                        $result3=mysqli_query($conn,$sql3);
                                                        while($row3 = mysqli_fetch_array($result3)){
                                                            echo "<option value=".$row3['category_id'].">".$row3['category']."</option>";
                                                        }
                                                    echo"</select>"
                                                    ?>
                                                    <span id="gcs" style="color: red;"></span>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label" style="margin-left: 0px;margin-top: 10px;">Brand</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <?php
                                                    echo"<select name='selectgb' id='gb' class='form-control'  style='margin-top: 10px;margin-right: 50px;width:600px'>";
                                                        $sql2 = "select * from brand where brand_id=".$br;
                                                        $result2=mysqli_query($conn,$sql2);
                                                        $row2 = mysqli_fetch_array($result2);

                                                        echo"<option value=".$br.">".$row2['brand']."</option>";
                                                        $sql3 = "select * from brand where brand_id not in(".$br.")";
                                                        $result3=mysqli_query($conn,$sql3);
                                                        while($row3 = mysqli_fetch_array($result3)){
                                                            echo "<option value=".$row3['brand_id'].">".$row3['brand']."</option>";
                                                        }
                                                    echo"</select>";
                                                        
                                                    ?>
                                                    <span id="gbs" style="color: red;"></span>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label" >Product name</label>

                                                </div>
                                                <div class="col-12 col-md-9">

                                                     <input type="text" id="proname" name="proname"  required="true" value="<?php echo $row['name'] ?>"class="form-control" style="margin-right: 50px;width:600px">
                                                     <span id="tx2s" style="color: red;"></span>
                                                </div>
                                            </div>
                                    
                                            

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label" >Price</label>

                                                </div>
                                                <div class="col-12 col-md-9">

                                                     <input type="text" id="proprice" name="proprice" placeholder="0" required="true" value="<?php echo $row['price'] ?>"class="form-control" style="margin-right: 50px;width:600px">
                                                     <span id="tx2s" style="color: red;"></span>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Description</label>

                                                </div>
                                                <div class="col-12 col-md-9">
                                                
                                                    <textarea name="prodescription" id="prodescription" rows="9"   class="form-control" required="true" style="height: 100px"><?php echo $row['description']; ?></textarea>
                                                    <span id="tx3s" style="color: red;"></span>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Photo</label>
                                                    <div class="col-12 col-md-9" style="margin-left: 200px">
                                                     <img  src="<?php echo $row['photo'] ?>" alt="Card image cap" id="product_img">

                                                     <!--<img src="< echo $row['image'] ?>" id="image" name="image" style="width">-->
                                                     <input type="file" id="myfile" name="ff" >

                                                    </div>
                                                </div>
                                            
                                            </div>

                                            
                                            
                                        
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm" id="update_product" name="update_product" style="background-color: #FFC107;margin-left: 200px">
                                             Update Product
                                        </button>
                                       <button type="submit" class="btn btn-danger btn-sm" id="delete_product" name="delete_product" style="margin-left: 20px">
                                            <i class="fa fa-ban"></i>Delete Product
                                        </button>
                                        </div>