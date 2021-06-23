<html lang="en">
    <head>	
        <title>EduMaterial | Register</title>
        <!-- meta -->	
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
       
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

        <!-- Google Fonts-->
         <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500' rel='stylesheet' type='text/css'>
        <!-- Custom css -->
        <link href="../../src/css/login.css" rel="stylesheet" type="text/css" media="all" />
    </head>
    <body>
        <!----start header---->
        <div class="header-wrapper">
            <a id="home" href="../../index.php">
                <i class="fas fa-home"></i>
            </a>
            <h1><strong>Register Page</strong></h1>
        </div>
        <!----//End header---->

        <!-- Start Body -->
        <div class="content-wrapper">
            <div class="sub-main">
                <h2 class="sub-heading">Join us now!</h2>
                <?php if (isset($_GET['message']))
                echo '<h3 style="color:red;text-shadow: 3px 3px 5px black;"> ******* ' . $_GET['message'] . ' *******</h3>'
            ?>
                <!--login start here-->
                <div class="login">
                    <p class="span line-left">Enter your details to create an account.</p>
            <form action="auth.php" method="POST">
                <h3>First Name</h3>
                <label class="nameBox">
                    <input type="text" name="fname" id="fname" placeholder="Enter your first name" required>
                    <span class="emailText1"></span>
                </label>
                
                <h3>Last Name</h3>
                <label class="nameBox">
                    <input type="text" name="lname" id="lname" placeholder="Enter your last name" required>
                    <span class="emailText1"></span>
                </label>
                
                <h3>Email Address</h3>
                <label class="emailBox">
                    <input type="email" name="email" id="email" placeholder="Enter your email" required>
                    <span class="emailText"></span>
                </label>

                <h3>Password</h3>
                <label class="passBox">
                    <input type="password" name="pass" id="pass" placeholder="Enter your password" required>
                    <span class="passText"></span>
                </label>
                <div class="login-bwn">
                    <input type="submit" id="submit" name="submit" value="Register" />
                </div>
                <div class="login-bottom">
                    <h4>Already have an Account?</a></h4>
                    <div class="reg-bwn"><a href="login.php">Login Now!</a></div>
                </div>
            </form>
                </div>
                <!--login end here-->
            </div>
        </div>
        

        <!-- End Body -->

        <!-- Start footer-wrapper -->
        <div class='footer-wrapper'>
            <div class='footer'><!-- Start footer -->

            </div><!-- End footer -->
            <div class='copyright'><!-- Start copyright -->
                <p>
                    <strong>EduMaterial &#169; 2021</strong>
                </p>
            </div><!-- End copyright -->
        </div>
        </div>
  
        <script src="lib/jquery-1.8.1.min.js"></script>
        <script src="../../src/js/login.js"></script>
        <script>
            $(document).ready(function() {
                $('#submit').click(function() {
                    var fname = $('#fname').val();
                    var lname = $('#lname').val();
                    var email = $('#email').val();
                    var pass = $('#pass').val();


                });
            })
        </script>
    </body>
</html>