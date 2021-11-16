<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Sign Up</title>
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
                  <h4>REGISTER</h4>
               </div>
            </div>
         </div>
         <div class="ui attached bottom message">
            <div class="ui horizontal divider">Please sign up</div>
            <form action="register_user.php" method="post" id="registerUser" class="ui form">
               <div class="field" id="new_messages"></div>
               <div class="field">
                  <div class="two fields">
                     <div class="field">
                           <label>First Name</label>
                           <input type="text" name="first_name" placeholder="name here..." required>
                     </div>
                     <div class="field">
                           <label>Last Name</label>
                           <input type="text" name="last_name" placeholder="name here..." required>
                     </div>
                  </div>
               </div>
               <div class="field">
                  <label>Email</label>
                  <input type="email" name="email" placeholder="email here..." required>
               </div>
               <div class="field">
                  <label>User Name</label>
                  <input type="text" name="user_name" placeholder="username here..." required>
               </div>
               <div class="field">
                  <div class="two fields">
                     <div class="field">
                           <label>Password</label>
                           <input type="password" name="password" placeholder="password here..." required>
                     </div>
                     <div class="field">
                           <label>Confirm Password</label>
                           <input type="password" name="confirm_password" placeholder="retype here..." required>
                     </div>
                  </div>
               </div>
               <div class="field">
                  <div class="ui checkbox">
                     <input type="checkbox" tabindex="0">
                     <label>I agree to the Terms and Conditions</label>
                  </div>
               </div>
               <div class="field">
                  <button type="submit" name="submit" class="ui button">Submit</button>
               </div>
               <div class="field right center aligned">
                  <label>Already have an account? <a href="login.php">Sign In</a></label>
               </div>
            </form>
         </div>
      </div>

      <script type="text/javascript">
        $(document).ready(function() {
            $("#registerUser").unbind('submit').bind('submit', function() {

                var form = $(this);
                var formData = new FormData($(this)[0]);

                $.ajax({
                    url: form.attr('action'),
                    type: form.attr('method'),
                    data: formData,
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    async: false,
                    success:function(responses) {
                        if(responses.success == true) {

                            $("#new_messages").html(
                              '<div class="ui message">'+
                              '<div class="header">'+
                              'Thank you!'+
                              '</div>'+
                              '<p>'+responses.message+'</p>'+
                              '</div>'
                            ).delay(3000).fadeOut('fast');

                            $('input[type="text"]').val('');
                            $(".fileinput-remove-button").click();

                            setTimeout(() => {
                              window.location.href = "login.php";
                           }, 1000);
                        }
                        else {

                            $("#new_messages").html(
                              '<div class="ui message">'+
                              '<div class="header">'+
                              'Sorry!'+
                              '</div>'+
                              '<p>'+responses.message+'</p>'+
                              '</div>'
                            );
                        }
                    }
                });

                return false;
            });
        });
      </script>
   </body>
</html>