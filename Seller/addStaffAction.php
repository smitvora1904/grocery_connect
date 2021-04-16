<?php
    
    session_start();
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "iwt_groceryproject";

    $conn = mysqli_connect($server,$user,$pass,$db);

    if(isset($_SESSION['seller_id']))
    {
        
        if (isset($_POST['sub'])) {
            $nm = $_POST['name'];
            $cnt = $_POST['contact'];
            $acnt = $_POST['altContact'];
            $des = $_POST['designation'];
            $age = $_POST['age'];
            $gender = $_POST['gender'];
            $residence = $_POST['area']."<br>".$_POST['pin']."<br>".$_POST['city'];
            $stphoto = $_FILES['f1']['name'];
            //echo $stphoto."<br>";
            $stadhaar = $_FILES['f2']['name'];
            $target_dir = "uploads/";

        $target_file1 = $target_dir.basename($_FILES['f1']['name']);
        $target_file2 = $target_dir.basename($_FILES['f2']['name']);

        $imageFileType1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
        $imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));

        $extension_arr = array("jpg","jpeg","png","gif","jfif");

        if(in_array($imageFileType1, $extension_arr) && in_array($imageFileType2, $extension_arr))
        {
            $sql = "insert into staff (seller_id,name,contact,designation,age,gender,id_proof,photo,residance,alt_contact,status) values(".$_SESSION['seller_id'].",'".$nm."',".$cnt.",'".$des."',".$age.",'".$gender."','".$target_file2."','".$target_file1."','".$residence."',".$acnt.",0)";
            
            //echo $sql;
           mysqli_query($conn,$sql);
            move_uploaded_file($_FILES['stphoto']['tmp_name'], $target_dir.$stphoto);
            move_uploaded_file($_FILES['stadhaar']['tmp_name'], $target_dir.$stadhaar);      
        }

        header('location: staff.php');
        }

    }
        else
        {
            header('location: login.php');    
        }

?>