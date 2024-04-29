<?php

$conn = mysqli_connect('localhost', 'root', '', 'portfolio_hamac');



?>

<!-- code for delete  -->
<?php
//if click on delete
if (isset($_GET['delete'])) {
  $stdid = $_GET['delete']; //keeping the delete id in stdid
  $query = "DELETE FROM about WHERE id={$stdid}";
  $deleteQuery = mysqli_query($conn, $query);
  if ($deleteQuery) {
    echo "<script>alert('Data successfully deleted.');</script>";

  }
}
?>


<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

  ?>



  <!doctype html>
  <html lang="en">

  <head>
    <title>About</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" href="" type="image/png">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/altstyle.css">

  </head>

  <body>





    <div class="container d-flex align-items-stretch">
      <nav id="sidebar" class="img" style="background-image: url(images/DSCF3488.jpg);">
        <div class="p-4">
          <h1 style="line-height: 1;"><a href="about.php" class="logo"><span>CMS Portfolio</span></a></h1>

          <ul class="list-unstyled components mb-5">

            <li>
              <a href="./"><span class="fa fa-home mr-3"></span> Home</a>
            </li>

            <li class="active">
              <a href="about.php"><span class="fa fa-address-card mr-3"></span> About</a>
            </li>

            <li>
              <a href="service.php"><span class="fa fa-tasks mr-3"></span> Service</a>
            </li>

            <li>
              <a href="portfolio.php"><span class="fa fa-file-archive mr-3"></span> Portfolio</a>
            </li>

            <li>
              <a href="contact.php"><span class="fa fa-envelope mr-3"></span> Contact</a>
            </li>

            <li>
              <a href="../adminlogin/logout.php"><span class="fas fa-power-off mr-3"></span> Log Out</a>
            </li>


          </ul>



          <div class="footer">
            <p>
              &copy; | Hurley Dave S. Hamac</a>
            </p>
          </div>

        </div>
      </nav>


      <!-- Page Content  -->






      <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4">ABOUT</h2>

        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
              aria-selected="false">Edit About Description</a>
          </li>
        </ul>




        <div class="tab-content" id="myTabContent">












          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

            <!--  
  <div class="container  m-5 p-3 mx-auto">
        <form method="post" class="d-flex justify-content-around">

            <?php
            if (isset($_GET['updatedes'])) { //if click on update button
              $id = $_GET['updatedes']; //geting update id from search query
              $query = "SELECT * FROM aboutdes WHERE id={$id}";
              $getData = mysqli_query($conn, $query); //getting data based on query
          
              while ($rx = mysqli_fetch_assoc($getData)) { //keep data rx variable afte fetch
                $id = $rx['id'];
                $description = $rx['des'];
                ?>

            <textarea style="min-height: calc(5.5em + 0.75rem + 2px);" class="nah form-control me-3" name="des" rows="10" cols="80"><?php echo $description ?></textarea>
            <input class="btn btn-dark" type="submit" value="Update" name="update-btn-des">

            <?php
              } //closing previous php while/if backet
            } ?>

              <?php
              if (isset($_POST['update-btn-des'])) {

                $description = $_POST['des'];

                if (!empty($description)) {
                  $query = "UPDATE aboutdes SET des='$description' WHERE id='$id'";
                  $updateQuery = mysqli_query($conn, $query);
                  if ($updateQuery) {
                    echo "<script>window.history.go(-1); return false;</script>";
                  }
                }

              }
              ?>

<?php
    if (isset($_GET['updatedes2'])) { //if click on update button
      $id = $_GET['updatedes2']; //geting update id from search query
      $query = "SELECT * FROM aboutdes WHERE id={$id}";
      $getData = mysqli_query($conn, $query); //getting data based on query
  
      while ($rx = mysqli_fetch_assoc($getData)) { //keep data rx variable afte fetch
        $id = $rx['id'];
        $description2 = $rx['des2'];
        ?>

            <textarea style="min-height: calc(5.5em + 0.75rem + 2px);" class="nah form-control me-3" name="des2" rows="10" cols="80"><?php echo $description2 ?></textarea>
            <input class="btn btn-dark" type="submit" value="Update" name="update-btn-des2">

            <?php
      } //closing previous php while/if backet
    } ?>
               <?php
               if (isset($_POST['update-btn-des2'])) {

                 $description2 = $_POST['des2'];

                 if (!empty($description2)) {
                   $query = "UPDATE aboutdes SET des2='$description2' WHERE id='$id'";
                   $updateQuery = mysqli_query($conn, $query);
                   if ($updateQuery) {
                     echo "<script>window.history.go(-1); return false;</script>";
                   }
                 }

               }
               ?>
              
        </form>
  </div>
              -->




            <div class="container-fluid">
              <div class="row">

                <div class="col-md12">

                  <div class="container mt-5">
                    <table class="table table-bordered">
                      <tr>
                        <th>About Description 1</th>
                        <th></th>
                      </tr>

                      <?php
                      $query = "SELECT * FROM aboutdes";
                      $readQuery = mysqli_query($conn, $query);
                      if ($readQuery->num_rows > 0) {
                        while ($rd = mysqli_fetch_assoc($readQuery)) {
                          $stdid = $rd['id'];
                          $description = $rd['des'];
                          ?>
                          <tr>
                            <td><?php echo $description ?></td>
                            <td><button type="button" class="btn btn-dark" data-toggle="modal"
                                data-target="#exampleModal1">Update</button></td>
                          </tr>
                          <?php
                        }
                      } else {
                        echo "No data to show";
                      }
                      ?>

                    </table>
                  </div>

                  <!-- Modal for About Description 1 -->
                  <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel1">Edit About Description 1</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body p-4">
                          <form method="post" class="d-flex justify-content-around">
                            <?php
                            $query = "SELECT * FROM aboutdes";
                            $getData = mysqli_query($conn, $query);
                            while ($rx = mysqli_fetch_assoc($getData)) {
                              $id = $rx['id'];
                              $description = $rx['des'];
                              ?>
                              <textarea style="min-height: calc(20.5em + 0.75rem + 2px);" class="nah form-control me-3"
                                name="des" id="des" rows="10" cols="80"><?php echo $description ?></textarea>
                              <?php
                            }
                            ?>
                            <div class="modal-footer justify-content-end">
                              <button type="submit" class="btn btn-dark" name="update-btn-des">Update</button>
                            </div>
                            <?php
                            if (isset($_POST['update-btn-des'])) {
                              $description = $_POST['des'];
                              if (!empty($description)) {
                                $query = "UPDATE aboutdes SET des=? WHERE id=?";
                                $stmt = mysqli_prepare($conn, $query);
                                mysqli_stmt_bind_param($stmt, "si", $description, $id);
                                if (mysqli_stmt_execute($stmt)) {
                                  echo "<script>alert('About Description 1 Successfully Changed.');</script>";
                                  echo "<script>window.history.go(-1); </script>";
                                } else {
                                  echo "Error updating record: " . mysqli_error($conn);
                                }
                              }
                            }
                            ?>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="container mt-5">
                    <table class="table table-bordered">
                      <tr>
                        <th>About Description 2</th>
                        <th></th>
                      </tr>

                      <?php
                      $query = "SELECT * FROM aboutdes";
                      $readQuery = mysqli_query($conn, $query);
                      if ($readQuery->num_rows > 0) {
                        while ($rd = mysqli_fetch_assoc($readQuery)) {
                          $stdid = $rd['id'];
                          $description2 = $rd['des2'];
                          ?>
                          <tr>
                            <td><?php echo $description2 ?></td>
                            <td><button type="button" class="btn btn-dark" data-toggle="modal"
                                data-target="#exampleModal2">Update</button></td>
                          </tr>
                          <?php
                        }
                      } else {
                        echo "No data to show";
                      }
                      ?>
                    </table>
                  </div>

                  <!-- Modal for About Description 2 -->
                  <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel2" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel2">Edit About Description 2</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body p-4">
                          <form method="post" class="d-flex justify-content-around">
                            <?php
                            $query = "SELECT * FROM aboutdes";
                            $getData = mysqli_query($conn, $query);
                            while ($rx = mysqli_fetch_assoc($getData)) {
                              $id = $rx['id'];
                              $description2 = $rx['des2'];
                              ?>
                              <textarea style="min-height: calc(20.5em + 0.75rem + 2px);" class="nah form-control me-3"
                                name="des2" id="des2" rows="10" cols="80"><?php echo $description2 ?></textarea>
                              <?php
                            }
                            ?>
                            <div class="modal-footer justify-content-end">
                              <button type="submit" class="btn btn-dark" name="update-btn-des2">Update</button>
                            </div>
                            <?php
                            if (isset($_POST['update-btn-des2'])) {
                              $description2 = $_POST['des2'];
                              if (!empty($description2)) {
                                $query = "UPDATE aboutdes SET des2=? WHERE id=?";
                                $stmt = mysqli_prepare($conn, $query);
                                mysqli_stmt_bind_param($stmt, "si", $description2, $id);
                                if (mysqli_stmt_execute($stmt)) {
                                  echo "<script>alert('About Description 2 Successfully Changed.');</script>";
                                  echo "<script>window.history.go(-1); </script>";
                                } else {
                                  echo "Error updating record: " . mysqli_error($conn);
                                }
                              }
                            }
                            ?>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>






          </div>










          <div class="tab-pane fade" id="content" role="tabpanel" aria-labelledby="content-tab">

            <p>dasdasd</p>

          </div>



          <script>
            // Get the active tab ID from localStorage or set it to the default value
            var activeTab = localStorage.getItem('activeTab') || '#profile';

            // Activate the saved tab
            $(activeTab + '-tab').tab('show');

            // Save the active tab ID to localStorage when a tab is clicked
            $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
              var targetTab = e.target.getAttribute('href');
              localStorage.setItem('activeTab', targetTab);
            });
          </script>




          <!-- jQuery first, then Popper.js, then Bootstrap JS -->
          <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

          <script>
            // Get the active tab from local storage or default to the first tab
            var activeTab = localStorage.getItem('activeTab') || '#profile';

            // Set the active tab on page load
            $('a[href="' + activeTab + '"]').tab('show');

            // Save the active tab to local storage when a new tab is shown
            $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
              var targetTab = e.target.getAttribute('href');
              localStorage.setItem('activeTab', targetTab);
            });
          </script>

          <!-- Optional JavaScript; choose one of the two! -->

          <!-- Option 1: Bootstrap Bundle with Popper -->
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>

          <!-- Option 2: Separate Popper and Bootstrap JS -->
          <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->



        </div>
      </div>

      <script>

        // Add event listener to all links on the page
        const links = document.querySelectorAll('a');

        links.forEach(link => {
          link.addEventListener('click', function (event) {
            // Check if the link has a hash in the URL
            if (link.getAttribute('href').charAt(0) === '#') {
              // Prevent the default behavior of the link
              event.preventDefault();

              // Add your own code here to handle the link click
              console.log('Link clicked!');
            }
          });
        });


      </script>

      <script src="js/altscript.js"></script>
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/main.js"></script>
  </body>

  </html>

  <?php
} else {
  header("Location: ../adminlogin/index.php");
  exit();
}
?>