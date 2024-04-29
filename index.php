<?php

$conn = mysqli_connect('localhost', 'root', '', 'portfolio_hamac');

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>My portfolio</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.lineicons.com/2.0/LineIcons.css">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css">
  <link rel="stylesheet" type="text/css" href="css/lightbox.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    integrity="sha512-NyT/QdY1l1m8ZyJOtmo8dy0BMx0VGsSxWfaupF3eQJwYzsVxXS5Wo+YtbO0b+8Vc0h/7uKuT/Q9SqT3LpG/wnQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <link
    href="https://fonts.googleapis.com/css2?family=Eczar:wght@400;500;600;700&family=Hind:wght@300;400;500;600;700&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <style>


  </style>
</head>

<body data-bs-spy="scroll" data-bs-offset="60" data-bs-target="#myNavbar">
  <nav id="myNavbar" class="navbar navbar-expand-md  navbar-light py-3 kk fixed-top">
    <div class="container"> <a href="#" class="navbar-brand fw-bold"><?php
    $result = $conn->query("SELECT * FROM displaycontent");
    while ($row = $result->fetch_assoc()) {
      echo '' . $row["display_name"] . '';
    }
    ?></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span
          class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="nav navbar-nav ms-auto nav-pills">
          <li class="nav-item"> <a href="#home" class="nav-link">Home</a> </li>
          <li class="nav-item"> <a href="#about" class="nav-link">About</a> </li>
          <li class="nav-item"> <a href="#service" class="nav-link">Service</a> </li>
          <li class="nav-item"> <a href="#portfolio" class="nav-link">Portfolio</a> </li>
          <li class="nav-item"> <a href="#contact" class="nav-link">Contact</a> </li>
        </ul>
      </div>
    </div>
  </nav>
  <div id="home" style="background:url(img/banner-bg.png) no-repeat right top;">
    <div class="padd padd-top-new padd-bottom-new">
      <div class="container padd-bottom-new">
        <div class="row align-items-center">
          <div class="col-lg-6 col-12 order-1">
            <h2 class="display-5 mb-5">I'm <?php
            $result = $conn->query("SELECT * FROM displaycontent");
            while ($row = $result->fetch_assoc()) {
              echo '' . $row["display_name"] . '';
            }
            ?>, <?php
            $result = $conn->query("SELECT * FROM displaycontent");
            while ($row = $result->fetch_assoc()) {
              echo $row["display_skill"];
            }
            ?> </h2>
            <p class="text-muted lead pb-4"><?php
            $result = $conn->query("SELECT * FROM displaycontent");
            while ($row = $result->fetch_assoc()) {
              echo $row["display_skill2"];
            }
            ?>.</p>
            <a href="#" class="btn"> I'M <?php
            $result = $conn->query("SELECT * FROM displaycontent");
            while ($row = $result->fetch_assoc()) {
              echo $row["display_avail"];
            }
            ?> </a>
            <div class="social-icons mt-5">
              <?php
              $query = "SELECT * FROM socialmedia ORDER BY id ASC";
              $readQuery = mysqli_query($conn, $query);
              if ($readQuery->num_rows > 0) {

                while ($rd = mysqli_fetch_assoc($readQuery)) {

                  $socialmedialink = $rd['socialmedialink'];
                  $socialmedialogo = $rd['socialmedialogo'];

                  ?>
                  <?php
                  for ($i = 0; $i < 1; $i++) {
                    ?>



                    <a href="<?php echo $socialmedialink ?>"><i class="<?php echo $socialmedialogo ?>"></i></a>



                  <?php }  ?>
                  <?php
                }
              } else {
                echo "No data to show";
              }
              ?>

            </div>

          </div>
          <div class="col-lg-6 col-12 text-center mb-5 mb-lg-0 order-lg-1">
            <div class="banner-image">
              <?php
              $result = $conn->query("SELECT * FROM homephotos");
              while ($row = $result->fetch_assoc()) {
                echo '<img class="img-fluid" src="img/' . $row["home_img"] . '" alt="Image">';
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="bg-light">
    <div class="padd" id="about">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h2 class="display-5 mb-5">About Me</h2>
            <?php
            $result = $conn->query("SELECT * FROM aboutdes");
            while ($row = $result->fetch_assoc()) {
              echo '<p class="text-muted lead pb-4"> ' . $row["des"] . '</p>';
            }

            ?>
            <?php
            $result = $conn->query("SELECT * FROM aboutdes");
            while ($row = $result->fetch_assoc()) {
              echo '<p class="text-muted lead pb-4"> ' . $row["des2"] . '</p>';
            }

            ?>

          </div>

        </div>
      </div>
    </div>
  </div>
  <style>
    .service-item {
      margin-bottom: 20px;
   
    }
  </style>
  <div class="padd" id="service">
    <div class="container padd-bottom-new">
      <div class="row padd-top-new">
        <div class="col-lg-12">
        <h2 class="display-6 mb-4">What I Do</h2>

          <div class="service-content">

            <?php
            $query = "SELECT * FROM service ORDER BY id ASC";
            $readQuery = mysqli_query($conn, $query);
            if ($readQuery->num_rows > 0) {
              while ($rd = mysqli_fetch_assoc($readQuery)) {
                $servicelogo = $rd['logo'];
                $servicename = $rd['name'];
                $servicedes = $rd['des'];
                ?>

                <!-- Service Item -->
                <div class="service-item">
                  <div class="service-details">
                    <h3>
                      <!-- Service Name with Icon -->
                      <i class="<?php echo $servicelogo ?>"></i>
                      <?php echo $servicename ?>
                    </h3>
                    <p><?php echo $servicedes ?></p>
                  </div>
                </div>
                <!-- End of Service Item -->

                <?php
              }
            } else {
              echo "No data to show";
            }
            ?>

          </div>

        </div>
      </div>
    </div>
  </div>

  <style>
    .portfolio-item {
      position: relative;
      overflow: hidden;
    }

    .portfolio-img img {
      width: 100%;
      height: auto;
    
    }

    .portfolio-overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.7);
      color: #fff;
      opacity: 0;
      transition: opacity 0.3s ease;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }

    .portfolio-overlay h3,
    .portfolio-overlay p {
      margin: 0;
      text-align: center;
    }

    .portfolio-item:hover .portfolio-overlay {
      opacity: 1;
    }
  </style>
  <div class="bg-light">
    <div class="padd container" id="portfolio">
      <div class="row">
        <div class="col-12">
          <h2 class="display-6 mb-4">Recent Works</h2>

          <div class="row">
            <?php
           
            $query = "SELECT * FROM portfolio ORDER BY project_category DESC";
            $readQuery = mysqli_query($conn, $query);
            if ($readQuery->num_rows > 0) {
              while ($rd = mysqli_fetch_assoc($readQuery)) {

                $stdid = $rd['id'];
                $project_category = $rd['project_category'];
                $project_name = $rd['project_name'];
                $project_img = $rd['project_img'];
                $project_category = $rd['project_category'];
                ?>




                <div class="col-md-4 portfolio-item <?php echo str_replace(' ', '-', trim($project_category)); ?>">
                  <div class="portfolio-img">
                    <img src="<?php echo "./cms/portfolio/" . "$project_img" ?>" alt="Project 1">
                    <div class="portfolio-overlay">
                      <h3 style="color: #ede574;"><?php echo "$project_name" ?></h3>
                      <p><?php echo "$project_category" ?></p>
                    </div>
                  </div>
                </div>

                <?php
              }
            } else {
              echo "No data to show";
            }
            ?>



          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="padd" id="contact">
    <div class="container" style="max-width: 800px; margin: 0 auto; padding: 20px;">
      <div class="row padd-top-new">
        <div class="col-12">
          <h2 class="display-6 mb-5">Contact Me</h2>
          <p class="text-muted lead pb-4"></p>

          <div class="social-icons" style="margin-bottom: 20px;">
            <?php
            $query = "SELECT * FROM socialmedia ORDER BY id ASC";
            $readQuery = mysqli_query($conn, $query);
            if ($readQuery->num_rows > 0) {

              while ($rd = mysqli_fetch_assoc($readQuery)) {

                $socialmedialink = $rd['socialmedialink'];
                $socialmedialogo = $rd['socialmedialogo'];

                ?>
                <?php
                for ($i = 0; $i < 1; $i++) {
                  ?>



                  <a href="<?php echo $socialmedialink ?>"><i class="<?php echo $socialmedialogo ?>"
                      style="color: #333; text-decoration: none; margin-right: 10px; font-size: 24px;"></i></a>


                <?php }  ?>
                <?php
              }
            } else {
              echo "No data to show";
            }
            ?>
          </div>

          <div class="contact-details mt-4">
            <?php
            $query = "SELECT * FROM contact ORDER BY id ASC";
            $readQuery = mysqli_query($conn, $query);
            if ($readQuery->num_rows > 0) {

              while ($rd = mysqli_fetch_assoc($readQuery)) {

                $email = $rd['email'];
                $mobilenum = $rd['mobile_num'];
                $address = $rd['address'];
                ?>
                <?php
                // Looping col-md-6
                for ($i = 0; $i < 1; $i++) {
                  ?>
                  <div class="contact-item" style="margin-bottom: 10px;">
                    <i class="fas fa-phone" style="margin-right: 10px; color: #ede574;"></i>
                    <span style="font-weight: bold; margin-right: 5px;">Contact Number:</span>
                    <a href="tel:+1234567890" style="color: #333; text-decoration: none;"><?php echo "$mobilenum" ?></a>
                  </div>

                  <div class="contact-item" style="margin-bottom: 10px;">
                    <i class="fas fa-envelope" style="margin-right: 10px; color: #ede574;"></i>
                    <span style="font-weight: bold; margin-right: 5px;">Email:</span>
                    <a href="mailto:example@example.com"
                      style="color: #333; text-decoration: none;"><?php echo "$email" ?></a>
                  </div>

                  <div class="contact-item" style="margin-bottom: 10px;">
                    <i class="fas fa-map-marker-alt" style="margin-right: 10px; color: #ede574;"></i>
                    <span style="font-weight: bold; margin-right: 5px;">Address:</span>
                    <span><?php echo "$address" ?></span>
                  </div>
                <?php }  ?>
                <?php
              }
            } else {
              echo "No data to show";
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>



  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>
  <script src="http://rexbd.net/html/multicast/demo/assets/js/isotope.pkgd.min.js"></script>
  <script src="js/lightbox.js"></script>
  <script src="js/script.js"></script>

  </div>
</body>

</html>