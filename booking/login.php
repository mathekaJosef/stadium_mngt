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
            session_start();
            $_SESSION["username"] = $username;
            header("Location: index.php");
        } 
        else {
            ?>
            <script>
               alert('Wrong Username/Password');
            </script>
            <?php
        }
    }

?>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Sign In</title>
      <link rel="stylesheet" type="text/css" href="semantic/semantic.min.css">
      <script src="semantic/jquery.min.js"> </script>
      <script src="semantic/semantic.min.js"></script>
      <script src="order_validate.js"></script>
      <style>
         body{
         background-color:f1f1f1;
         }
         a{
         cursor:pointer;
         }
      </style>
   </head>
   <body>
      <div class="ui inverted huge borderless fixed fluid menu">
         <a class="header item">MACHAKOS STADIUM SYSTEM</a>
      </div>
      <br>
      <div class="ui text container" style="margin-top:90px">
         <div id="err001" class="ui icon small attached message">
            <div class="content">
               <div id="proceed">
                  <h4>LOGIN</h4>
               </div>
            </div>
         </div>
         <div class="ui attached bottom message">
            <div class="ui horizontal divider">Please sign in</div>
            <form action="" method="POST" class="ui form">
               <div class="field">
                  <label>User Name</label>
                  <input type="text" name="username" placeholder="username here..." required>
               </div>
               <div class="field">
                  <label>Password</label>
                  <input type="password" name="password" placeholder="password here..." required>
               </div>
               <div class="field">
                  <div class="ui checkbox">
                     <input type="checkbox" tabindex="0">
                     <label>Remember me</label>
                  </div>
               </div>
               <div class="field">
               <input type="submit" name="submit" class="ui button" value="Login">
               </div>
            </form>
         </div>
      </div>
   </body>
</html>