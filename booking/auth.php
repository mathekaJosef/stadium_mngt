<?php 

    if($_POST) {
        // database connection
        $conn = new mysqli("localhost","root","","stadium_mngt");

        // check db connection
        if($conn->connect_error) {
            die("Connection Failed : " . $conn->connect_error);
        } 
        else {
            // echo "Successfully Connected";
        }

        $valid = array('success' => false, 'messages' => array());

        $username = addslashes($_POST['username']);
        $password = addslashes($_POST['password']);
        
        $sql = $conn->query("SELECT * FROM registered_users WHERE username = '$username' AND password = '$password'");
        // echo var_dump($sql['total']);
        if($sql->num_rows > 0) {
            $_SESSION["username"] = $username;
            $valid['success'] = true;
            $valid['message'] = $_SESSION["username"];
        } 
        else {
            $valid['success'] = false;
            $valid['message'] = "Wrong Credentials/Token";
        }

        $conn->close();
        echo json_encode($valid);
    }

?>