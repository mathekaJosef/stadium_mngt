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

    // $section = addslashes($_POST['first_name']);
    $first_name = addslashes($_POST['first_name']);
    $last_name = addslashes($_POST['last_name']);
    $email = addslashes($_POST['email']);
    $username = addslashes($_POST['user_name']);
    $password = addslashes($_POST['password']);
    $confirm_password = addslashes($_POST['confirm_password']);
    $today = date("Y-m-d H:i:s");
    
	if($password == $confirm_password) {
        
        // insert into database
        $sql = "INSERT INTO registered_users (first_name, last_name, email, username, password, date_created) 
                        VALUES ('$first_name', '$last_name', '$email', '$username', '$password', '$today')";

        if($conn->query($sql) === TRUE) {
            $valid['success'] = true;
            $valid['message'] = "User registered successifully. ";
            // DONE!!! 

        } 
        else {
            $valid['success'] = false;
            $valid['message'] = "Error while saving";
        }
	}
	else {
	    
	    $valid['success'] = false;
        $valid['message'] = "The passwords didn't match. Try again.";
        
    }

    $conn->close();
    echo json_encode($valid);

	// upload the file 
}

?>