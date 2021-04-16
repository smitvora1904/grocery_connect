<?php
    
    session_start();
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "iwt_groceryproject";

    $conn = mysqli_connect($server,$user,$pass,$db);

        if(isset($_SESSION['admin_id']))
        {
            $sql = "select * from admin where admin_id='".$_SESSION['admin_id']."'";

            $result = mysqli_query($conn,$sql);

            $row = mysqli_fetch_array($result);

        if(is_array($row))
        {
            $name = $row['name'];
            $email = $row['email'];
            $contact = $row['contact'];
        }
        }
        else
        {
            header('location: login.php');    
        }

            if(isset($_POST['submit']))
    {
        $onm = $_POST['ownername'];
        $em = $_POST['email'];
        $phn = $_POST['phone'];
        $psswd = $_POST['password'];
        
        $sql = "update admin set name = '".$onm."',email='".$em."',contact=".$phn.",psswd='".$psswd."' where admin_id=".$_SESSION['admin_id'];
    
        mysqli_query($conn,$sql);
    
        mysqli_close($conn);
        header('location: index.php');
        
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
    <title>My Account Details</title>

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

            var name = document.getElementById("ownername");
            var atpattrn = /[a-zA-Z]/;
            if(!name.value.match(atpattrn))
            {
                document.getElementById("onmF").innerHTML= "Name not in correct format.";
                name.focus();
                return false;
            }
            else
            {
                document.getElementById("onmF").innerHTML= "";
            }

            var email = document.getElementById("email");
            var email_length = email.value.length;
            var atpattrn = /@/i;
            if(!email.value.match(atpattrn) || !email.value.includes("."))
            {
                document.getElementById("emF").innerHTML= "Email-id mail not in correct format.";
                email.focus();
                return false;
            }
            else
            {
                document.getElementById("emF").innerHTML= "";
            }

            var phone = document.getElementById("phone");
            var phone_length = phone.value.length;
            var atpattrn = /[0-9]/;
            if(phone_length != 10 || !phone.value.match(atpattrn))
            {
                document.getElementById("pF").innerHTML= "Phone Number must be of 10 digits.";
                phone.focus();
                return false;
            }
            else
            {
                document.getElementById("pF").innerHTML= "";
            }


            var psswd = document.getElementById("password");
            var psswd_length = psswd.value.length;
            if(psswd_length < 8 || psswd_length > 16)
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
            if( cpsswd.value != psswd.value)
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
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="images/icon/logo.png" alt="CoolAdmin">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="" method="post" name="registerForm" onsubmit="return(formValidation());">
                                <div class="form-group"> 
                            <input type="submit" id="saveBtn" name="submit" value="Save & Update" style="background-color: green;color: white;width: 150px;height: 30px;"></input>
                        </div>

                        </script>
                                    <label>Owner Name</label>
                                    <input class="au-input au-input--full" type="text" id="ownername" name="ownername" placeholder="Owner name" required="true" value="<?php echo $name;?>">
                                    <span id="onmF" style="color: red;"></span>
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" id="email" name="email" placeholder="Email" required="true" value="<?php echo $email;?>">
                                    <span id="emF" style="color: red;"></span>
                                </div>
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input class="au-input au-input--full" type="text" id="phone" name="phone" placeholder="Phone Number" required="true" value="<?php echo $contact;?>">
                                    <span id="pF" style="color: red;"></span>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" id="password" name="password" placeholder="Password" required="true">
                                    <span id="psswdF" style="color: red;"></span>
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input class="au-input au-input--full" type="password" id="confirmpassword" name="confirmpassword" placeholder="Confirm Password" required="true">
                                    <span id="cpsswdF" style="color: red;"></span>
                                </div>
                            
                            </form>
                            
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

