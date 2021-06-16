<?php
    session_start();

    $uID;
    if (isset($_SESSION['user_id']))
        $uID = $_SESSION['user_id'];
    else
        $uID = NULL;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduMaterial</title>

    <link rel="icon" href="../../src/image/menu/logo.svg">

    <!-- Template CSS Files-->
    <link rel="stylesheet" type= "text/css" href="../../src/css/header.css">
    <link rel="stylesheet" type="text/css" href="../../src/css/about_us.css">
    <!-- <link rel="stylesheet" type="text/css" href="/src/css/footer.css"> -->
     
    <!-- Vendor CSS Files-->
    <link href="../../assets/icofont/icofont.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rancho&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"/>
    
    <script src="https://unpkg.com/boxicons@latest/dist/boxicons.js"></script>

</head>
<body>
    <!-- ======= General Section ======= -->
    <header id="header">
        <a href="/index.php" class="logo">EduMaterial</a>
        <!-- <a href="/index.html" class="logo"><img src="/src/image/menu/logo.svg">EduMaterial</a> -->
        <div class="toggle"></div>
        <ul class="navigation">
            <li><a href="../../index.php">Home</a></li>
            <li><a href="../donate/donate.php">Donate</a></li>
            <li><a href="../material/math.php">Material</a></li>
            <li><a href="../about-us/about_us.php" class="active">About Us</a></li>
            <?php
            if (isset($_SESSION['user_id'])) {
                if ($_SESSION['items']['Role'] == 1) {
            ?>
            <li><a id="log" href="../../page/dashboard/donator.php"><i class="fas fa-user"></i></a>
            <?php }
                else {
            ?>
            <li><a id="log" href="../../page/dashboard/admin.php"><i class="fas fa-user"></i></a>
            <?php } 
            }
            else {
            ?>
            <li><a href="../../page/login/login.php">Login</a></li>
            <?php
            }
            ?>
                <ul>
                    <li><a href="../login/logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </header>
    <section>
        <h2 id="home_text">About Us</h2>
        <h2 id="sub_text">Are we from Pluto?</h2>
        <img src="../../src/image/home/stars.png" id="star">
        <img src="../../src/image/home/stars2.png" id="star2">
        <img src="../../src/image/home/rock.png" id="rock">
        <img src="../../src/image/home/kucing.svg" id="cat">
        <img src="../../src/image/home/night_back.svg" id="night">
    </section>

    <script>
        let cat = document.getElementById('cat');
        let night = document.getElementById('night');
        let sub_text = document.getElementById('sub_text');
        let header = document.getElementById('header');
        let star = document.getElementById('star');
        let star2 = document.getElementById('star2');
        let rock = document.getElementById('rock');

        window.addEventListener('scroll', function() {
            let value = window.scrollY;
            star.style.bottom = value * 0.05 + '%';
            star2.style.bottom = value * 0.025 + '%';
            rock.style.bottom = value * -0.35 + 'px';
            cat.style.bottom = value * -0.3 + 'px';
            sub_text.style.right = 20 + value * 0.35 + '%';
            sub_text.style.top = 45 + value * 0.04 + '%';
            header.style.top = value * 0.2 + 'px';
        })
    </script><!-- End General Section -->

    <main>
    <!-- ======= Description Section ======= -->
    <section id="desc" class="desc">
        <div class="container">
  
          <div class="text-center">
            <h1>Hello</h1>
            <p> We know how it is hard to find the right reference materials during your studies. Especially to those who do not have any contacts to any seniors, or those who are not in elite cluster to just buy them.  We have brainstormed between our members to contribute to the community a brilliant system which focusing on education field. Kind-hearted people who love to donate are most welcomed here as this the latest educational materials donation platform. Do not throw it away! Help others by donating your precious education materials here!</p>
            <a class="desc-btn" href="../donate/donate.php">Donate Now</a>
        </div>

        </div>
      </section><!-- End Description Section -->

     <!-- ======= Team Section ======= -->
     <section2 id="team" class="team'">
        <div class="text-center">
            <h2>Get to See Us</h2>
        </div>
     <div class="container">
         <div class="card">
             <div class="content">
                 <div class="imgBx"><img src="../..\src\image\team\zyqq.jpg"></div>
                 <div class="content8x">
                     <h3>Haziq Hapiz<br><span>Creative Designer</span></h3>
                    </div>
                </div>
                <ul class="sci">
                    <li style="--i:1">
                    <a href="#"><i class="icofont-plus-circle"></i></a>
                    </li>
                </ul>
            </div>
            
            <div class="card">
                <div class="content">
                    <div class="imgBx"><img src="../..\src\image\team\farah.jpg"></div>
                    <div class="content8x">
                        <h3>Farah Nabila<br><span>Marketing Executive</span></h3>
                    </div>
                </div>
                <ul class="sci">
                    <li style="--i:1">
                        <a href="#"><i class="icofont-plus-circle"></i></a>
                        </li>
                </ul>
            </div>
            
            <div class="card">
                <div class="content">
                    <div class="imgBx"><img src="../..\src\image\team\abdullah.jpg"></div>
                    <div class="content8x">
                        <h3>Someone Smart<br><span>Software Developer</span></h3>
                    </div>
                </div>
                <ul class="sci">
                    <li style="--i:1">
                        <a href="#"><i class="icofont-plus-circle"></i></a>
                        </li>
                </ul>
            </div>

            <div class="container">
                <div class="card">
                    <div class="content">
                        <div class="imgBx"><img src="../..\src\image\team\haziq.jpg"></div>
                        <div class="content8x">
                            <h3>Someone Flexible<br><span>Stakeholders</span></h3>
                           </div>
                       </div>
                       <ul class="sci">
                        <li style="--i:1">
                            <a href="#"><i class="icofont-plus-circle"></i></a>
                            </li>
                       </ul>
                   </div>
        </div>
    </section2><!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
   <div class="contact">
       <div class="container">
        <div style="text-align:center">
          <h2>Contact Us</h2>
          <h3>Swing by for a cup of coffee, or leave us a message:</h3>
        </div>

        <div class="row">
            <iframe style="border:0; width: 100%; height: 270px;" src="https://maps.google.com/maps?q=universiti%20teknikal%20malaysia%20melaka&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" allowfullscreen></iframe>
          
            <div class="column">
              <div class="address">
                  <i class="icofont-google-map"></i>
                  <h4>Location:</h4>    
                  <p>Universiti Teknikal Malaysia Melaka, Jalan Hang Tuah Jaya, 76100 Durian Tunggal, Melaka</p>
                </div>
                  
                <div class="email">
                    <i class="icofont-envelope"></i>
                    <h4>Email</h4>
                    <p>bpa@utem.edu.my</p>
                </div>

                <div class="phone">
                    <i class="icofont-phone"></i>
                    <h4>Call</h4>
                    <p>Tel: +606 270 1960 / 2845 / 2846<br>Fax: +606 270 1067</p>
                </div>
            </div>
          <div class="column">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                <div class="form-row">
                  <div class="col-md-6 form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validate"></div>
                  </div>
                  <div class="col-md-6 form-group">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                    <div class="validate"></div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                  <div class="validate"></div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                  <div class="validate"></div>
                </div>
                <div class="mb-3">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>
                <div class="text-center"><button type="submit">Send Message</button></div>
              </form>
          </div>
        </div>
    </div>
</div>
    </section>
      <!-- End Contact Section -->
    </main>
<!-- ======= Footer Section ======== -->
<footer id="footer">

<div class="container">

    <div class="row">
      <div class="copyright">
        &copy; Copyright <strong><span>EduMaterial</span></strong>. All Rights Reserved
      </div>
    </div>
  </div>
</footer><!-- End Footer -->
    <!-- ======= Back to Top Button ======= -->
    <a href="#" class="back-to-top"><img src="/src/image/icon/arrow-up-line.png"></a>
    
    <!-- Template JavaScript Files-->
    <script src="../../src/js/header.js"></script>
    <script src="../../src/js/validate.js"></script>

</body>
</html>