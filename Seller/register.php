<?php
    
    if(isset($_POST['b1']))
    {
           $servername = "localhost";
        $username = "root";
        $password = "";
        $db = "iwt_groceryproject";

       // echo "Owner Name: ".$onm;
       
            
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db);

    if(!$conn)
    {
        die("Connection Failed::".mysqli_connect_error());
    }


        $onm = $_POST['ownername'];
        $em = $_POST['email'];
        $phn = $_POST['phone'];
        $psswd = $_POST['password'];
        $snm = $_POST['shopname'];
        $pin = $_POST['pincode'];
        $sa1 = $_POST['shopaddress'];
        $sa2 = $_POST['shopaddress1'];
        $cityf = $_POST['city'];
        $sa = $sa1."<br>".$sa2;
        //echo $sa."<br/>";

    $sql = "select contact from seller_details where contact=".$phn;

        $result = mysqli_query($conn,$sql);

        $row = mysqli_fetch_array($result);

        if(is_array($row))
        {
            if($row['contact']==$phn)
            {
                mysqli_close($conn);
                echo'<script>alert("Admin alredy Registered...")</script>';
            }
        }

        else
        {
        $sql = "INSERT INTO seller_details (name,shop_name,email,contact,psswd,pincode,status,orders_status,holiday_status,shop_address,city)
        VALUES ('".$onm."','".$snm."','".$em."',".$phn.",'".$psswd."',".$pin.",0,1,0,'".$sa."','".$cityf."')";
        //echo $sql;
    
        mysqli_query($conn,$sql);
    
        mysqli_close($conn);
        header('location: login.php');
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Register</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

    <script type="text/javascript">
        function formValidation()
        {
            var ownername = document.getElementById("ownername");
            var on_pattern = /[a-zA-Z]/;
            var ownername_length= ownername.value.length;
            if(ownername_length==0)
            {
                document.getElementById("onm").innerHTML= "Enter ownername";
                ownername.focus();
                return false;
            }
            else if(!ownername.value.match(on_pattern))
            {
                document.getElementById("onm").innerHTML= "Name not in correct format";
                ownername.focus();
                return false;
            }
            else
            {
                document.getElementById("onm").innerHTML= "";
            }


            var email = document.getElementById("email");
            var email_length = email.value.length;
            var atpattrn = /@/i;
            if(email_length==0)
            {
                document.getElementById("em").innerHTML= "Enter Email";
                email.focus();
                return false;
            }
            else if(!email.value.match(atpattrn) || !email.value.includes("."))
            {
                document.getElementById("em").innerHTML= "Email-id mail not in correct format.";
                email.focus();
                return false;
            }
            else
            {
                document.getElementById("em").innerHTML= "";
            }


            var phone = document.getElementById("phone");
            var phone_length = phone.value.length;
            var phoneno = /^\d{10}$/;
            var p_pattern=/[0-9]/;
            if(phone_length==0)
            {
                document.getElementById("ph").innerHTML= "Enter Phone Number";
                phone.focus();
                return false;
            }
            
            else if(!phone.value.match(p_pattern))
            {
                document.getElementById("ph").innerHTML= "Phone Number must be of digits.";
                phone.focus();
                return false;   
            }
            else if(phone_length != 10)
            {
                document.getElementById("ph").innerHTML= "Phone Number must be of 10 digits.";
                phone.focus();
                return false;
            }
            else
            {
                document.getElementById("ph").innerHTML= "";
            }


            var shopname = document.getElementById("shopname");
            var os_pattern = /[a-zA-Z]/;
            var shopname_length= shopname.value.length;
            if(shopname_length==0)
            {
                document.getElementById("shn").innerHTML= "Enter shopname";
                shopname.focus();
                return false;
            }
            else if(!shopname.value.match(os_pattern))
            {
                document.getElementById("shn").innerHTML= "ShopName not in correct format";
                shopname.focus();
                return false;
            }
            else
            {
                document.getElementById("shn").innerHTML= "";
            }



            var shopaddress = document.getElementById("shopaddress");
            //var osa_pattern = /[a-zA-Z]/;
            var shopaddress_length= shopaddress.value.length;
            if(shopaddress_length==0)
            {
                document.getElementById("sha").innerHTML= "Enter shopaddress";
                shopaddress.focus();
                return false;
            }
            else
            {
                document.getElementById("sha").innerHTML= "";
            }

            var shopaddress1 = document.getElementById("shopaddress1");
            //var osa_pattern = /[a-zA-Z]/;
            var shopaddress_length= shopaddress1.value.length;
            if(shopaddress_length==0)
            {
                document.getElementById("sha1").innerHTML= "Enter shopaddress";
                shopaddress1.focus();
                return false;
            }
            else
            {
                document.getElementById("sha1").innerHTML= "";
            }
 var shopaddress2 = document.getElementById("city");
            var osa_pattern = /[a-zA-Z]/;
            var shopaddress_length= shopaddress2.value.length;
            if(shopaddress_length==0)
            {
                document.getElementById("cityF").innerHTML= "Enter City";
                shopaddress2.focus();
                return false;
            }
            else if(!shopaddress2.value.match(osa_pattern))
            {
                document.getElementById("cityF").innerHTML= "Not correct format";
                shopaddress2.focus();
                return false;   
            }
            else
            {
                document.getElementById("cityF").innerHTML= "";
            }
            var pincode = document.getElementById("pincode");
            var pincode_length = pincode.value.length;
            var pincodeno = /^\d{6}$/;
            var pin_pattern=/[0-9]/;
            if(pincode_length==0)
            {
                document.getElementById("pin").innerHTML= "Enter Pincode";
                pincode.focus();
                return false;
            }
            
            else if(!pincode.value.match(pin_pattern))
            {
                document.getElementById("pin").innerHTML= "Pincode must be of digits.";
                pincode.focus();
                return false;   
            }
            else if(pincode_length != 6)
            {
                document.getElementById("pin").innerHTML= "pincode must be of 6 digits.";
                pincode.focus();
                return false;
            }
            else
            {
                document.getElementById("pin").innerHTML= "";
            }

            

            var psswd = document.getElementById("password");
            var psswd_length = psswd.value.length;

            if(psswd_length==0)
            {
                document.getElementById("psswdF").innerHTML= "Enter Password";
                psswd.focus();
                return false;
            }
            else if(psswd_length < 8 || psswd_length > 16)
            {
                document.getElementById("psswdF").innerHTML= "Password: atleast 8 and atmost 16 characters.";
                psswd.focus();
                return false;
            }
            else
            {
                document.getElementById("psswdF").innerHTML= "";
            }
            var cpsswd = document.getElementById("confirmpassword");
            var cpsswd_length = cpsswd.value.length;
            if(cpsswd_length==0)
            {
                document.getElementById("cpsswdF").innerHTML= "Confirm your Password.";
                cpsswd.focus();
                return false;   
            }
            else if( cpsswd.value != psswd.value)
            {
                document.getElementById("cpsswdF").innerHTML= "Do not match with Password.";
                cpsswd.focus();
                return false;
            }
            else
            {

                document.getElementById("cpsswdF").innerHTML= "";
            }
            return true;
        }
    </script>
</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bgee5">
            <div class="container">
                <div class="login-wrap" style="padding: 0px;">
                    <div class="login-content" style="padding: 5px;">
                        <div class="login-logo">
                            <a href="#">
                                <img src="images/icon/logo.png" alt="CoolAdmin">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="" method="post" id = "regform" name="registerForm" onsubmit="return formValidation();">
                                <div class="form-group">
                                    <label>Owner Name</label>
                                    <input class="au-input au-input--full" type="text" name="ownername" id="ownername" placeholder="Owner name">
                                    <span id = "onm" style="color: red;"></span>
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="text" name="email" id="email" placeholder="Email">
                                    <span id = "em" style="color: red;"></span>
                                </div>
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input class="au-input au-input--full" type="text" name="phone" id="phone" placeholder="Phone Number">
                                    <span id = "ph" style="color: red;"></span>
                                </div>
                                <div class="form-group">
                                    <label>Shop Name</label>
                                    <input class="au-input au-input--full" type="text" name="shopname" id="shopname" placeholder="Shop Name">
                                    <span id = "shn" style="color: red;"></span>
                                </div>
                                <div class="form-group">
                                    <label>Lane/Street</label>
                                    <input class="au-input au-input--full" type="text" name="shopaddress" id="shopaddress" placeholder="Shop Address">
                                    <span id = "sha" style="color: red;"></span>
                                </div>
                                <div class="form-group">
                                    <label>Landmark</label>
                                    <input class="au-input au-input--full" type="text" name="shopaddress1" id="shopaddress1" placeholder="Near/Opposite/Beside">
                                    <span id = "sha1" style="color: red;"></span>
                                </div>
                                 <div class="form-group">
                                        <label>City</label>
                                        <input class="au-input au-input--full" type="text" id="city" name="city" placeholder="Jamnagar">
                                        <span id = "cityF" style="color: red;"></span>
                                </div>
                                <div class="form-group">
                                    <label>Pincode</label>
                                    <input class="au-input au-input--full" type="text" name="pincode" id= "pincode" placeholder="Pincode">
                                    <span id = "pin" style="color: red;"></span>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" id="password"placeholder="Password">
                                    <span id = "psswdF" style="color: red;"></span>

                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input class="au-input au-input--full" type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password">
                                    <span id = "cpsswdF" style="color: red;"></span>
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="aggree">Agree the terms and policy
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="b1">register</button>
                            
                            </form>
                            <div class="register-link">
                                <p>
                                    Already have account?
                                    <a href="login.php">Sign In</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
