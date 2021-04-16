<?php
    function insert()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";

        $onm = $_POST['ownername'];
        echo "Owner Name: ".$onm;
    }   
 /*           
    // Create connection
    $conn = new mysqli($servername, $username, $password);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    //echo "Connected successfully";
    $sql = "INSERT INTO MyGuests (firstname, lastname, email)
    VALUES ('John', 'Doe', 'john@example.com')";
    $conn->query($sql);

    mysqli_close($conn);*/ 
?>