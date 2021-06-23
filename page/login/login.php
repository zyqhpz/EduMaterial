<html lang="en">
    <head>	
        <title>EduMaterial | Login</title>
        <!-- meta -->	
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
     
        <link rel="stylesheet" href="lib/font-awesome-4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
      
         <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500' rel='stylesheet' type='text/css'>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Custom css -->
        <link href="../../src/css/login.css" rel="stylesheet" type="text/css" media="all" />
    </head>
    <body>
        <!----start header---->
        
        <div class="header-wrapper">
            <a id="home" href="../../index.php">
                <i class="fas fa-home"></i>
            </a>
            <h1>
                <strong>Login Page</strong></h1>
            <div class="description">
                <p>
                </p>
            </div>
        </div>
        <!----//End header---->

        <!-- Start Body -->
        <div class="content-wrapper">
            <div class="sub-main">
                <h2 class="sub-heading">Login To Start Donate</h2>

                <?php if (isset($_GET['message']))
                echo '<h3 style="color:red;text-shadow: 3px 3px 5px black;">' . $_GET['message'] . '</h3>'
            ?>

            <!--login start here-->
            <div class="login">
				
            <form action="auth.php" method="POST">

            <h3>Email</h3>
            <label for="email" class="emailBox">
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
                <span class="emailText"></span>
            </label>

            <h3>Password</h3>
            <label for="password" class="passBox">
                <input type="password" id="pass" name="pass" placeholder="Enter your password" required>
                <span class="passText"></span>
            </label>

            <input type="submit" name="login" value="Login">
            </form>
            <h4>Don't have an Account?</a></h4>
                <div class="reg-bwn"><a href="register.php">Register Now!</a></div>
            </div>
            </div>
                <a href="reset.php"> Forgot Password? </a>
                <div class="clear"> </div>

					
						<script>

	</script>
					
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

        <!-- <script src="../../src/js/login.js"></script> -->
    </body>
</html>