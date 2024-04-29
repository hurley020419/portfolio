<?php

$conn = mysqli_connect('localhost', 'root', '', 'portfolio_hamac');


//if click on delete
if (isset($_GET['delete'])) {
  $stdid = $_GET['delete']; //keeping the delete id in stdid
  $query = "DELETE FROM aboutdes WHERE id={$stdid}";
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
          <h1 style="line-height: 1;"><a href="index.php" class="logo"><span>CMS Portfolio</span></a></h1>


          <ul class="list-unstyled components mb-5">


            <li class="active">
              <a href="./"><span class="fa fa-home mr-3"></span> Home</a>
            </li>

            <li>
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


      <style>
        .bordered {
          border-collapse: collapse;
          border: 1px solid black;
        }

        .padded td,
        .padded th {
          padding: 2px;
        }

        .wide {
          width: 100%;
        }

        .bordered td,
        .bordered th {
          border: 1px solid black;
        }

        .bordered tbody td {
          text-align: center;
        }

        table {
          width: 100%;
          border-collapse: collapse;
        }

        td {
          padding: 10px;
          border: 1px solid #ccc;
        }
      </style>



      <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4">HOME</h2>

        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="homephotos-tab" data-toggle="tab" href="#homephotos" role="tab"
              aria-controls="homephotos" aria-selected="true">Update Home Photos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="displayskillname-tab" data-toggle="tab" href="#displayskillname" role="tab"
              aria-controls="displayskillname" aria-selected="false">Update Display Name and Profession</a>
          </li>
        </ul>




        <div class="tab-content" id="myTabContent">

          <div class="tab-pane fade show active" id="homephotos" role="tabpanel" aria-labelledby="homephotos-tab">

            <?php
            // Get uploaded file
            if (isset($_FILES['homeimg'])) {
              // Handle Home Image upload
              $homeimg = $_FILES['homeimg']['name'];
              $targetDir = "../img/";
              $sql = "UPDATE homephotos SET home_img='$homeimg' WHERE id=1"; // Assumes there is only one row in the table
              if (mysqli_query($conn, $sql)) {
                move_uploaded_file($_FILES['homeimg']['tmp_name'], $targetDir . $homeimg);
                echo "
    <div id='successModal' class='modal'>
      <div class='modal-content'>
        <p><strong>Success!</strong> Uploaded successfully.</p>
      </div>
    </div>
    <style>
      /* Modal styles */
      .modal {
        display: flex;
        justify-content: center;
        align-items: center;
        position: fixed;
        z-index: 9999;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
      }

      .modal-content {
        max-width: 300px;
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
      }
    </style>
    <script>
      // Get the modal
      var modal = document.getElementById('successModal');

      // Close the modal after 3 seconds
      setTimeout(function() {
        modal.style.display = 'none';
      }, 3000);
    </script>
    ";
              } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }
            }
            ?>






            <div class="container mt-5">

              <div class="container">
                <h5>Upload Home Image</h5>

                <button type="button" class="btn btn-dark" onclick="togglePopUp('popup3')"><i class="fas fa-plus"></i>
                  Update Home Image</button>

                <div id="popup3" class="popup mt-3" style="display: none;">
                  <div class="popup-content">
                    <span class="close" onclick="togglePopUp('popup3')">&times;</span>

                    <form method="post" action="index.php" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="homeimg">Home Image</label>
                        <input type="file" class="form-control-file" id="homeimg" name="homeimg">
                      </div>
                      <button type="submit" class="btn btn-success">Upload Home Image</button>
                    </form>

                  </div>
                </div>

              </div>
              <hr>





            </div>

            <table>

              <tr>

                <td>Home Image</td>

              </tr>

              <tr>
                <td>

                  <?php
                  $result = $conn->query("SELECT * FROM homephotos");
                  while ($row = $result->fetch_assoc()) {
                    echo '<img style="width:15rem;border-radius: 10px;" src="../img/' . $row["home_img"] . '" alt="Photo">';
                  }
                  ?>
                </td>







              </tr>

            </table>


            <hr>

          </div>




          <div class="tab-pane fade" id="displayskillname" role="tabpanel" aria-labelledby="displayskillname-tab">



            <?php
            if (isset($_GET['updatesoc'])) { //if click on update button
              $id = $_GET['updatesoc']; //geting update id from search query
              $query = "SELECT * FROM displaycontent WHERE id={$id}";
              $getData = mysqli_query($conn, $query); //getting data based on query
          
              while ($rx = mysqli_fetch_assoc($getData)) { //keep data rx variable afte fetch
                $id = $rx['id'];

                $displayname = $rx['display_name'];
                $skill1 = $rx['display_skill'];
                $skill2 = $rx['display_skill2'];
                $avail = $rx['display_avail'];
                ?>

                <div class="container  m-5 p-3 mx-auto hidethis">
                  <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="container"
                    onclick="hideContainer()"></button>
                  <form method="post" class="d-flex justify-content-around">
                    <table class="bordered padded wide">

                      <tr>
                        <td>Update Display Name</td>
                        <td><input class="form-control me-3" type="text" name="displayname"
                            value="<?php echo $displayname ?>"></td>
                      </tr>

                      <tr>
                        <td>Update Profession</td>
                        <td><input class="form-control me-3" type="text" name="skill1" value="<?php echo $skill1 ?>"></td>
                      </tr>

                      <tr>
                        <td>Update Course</td>
                        <td><input class="form-control me-3" type="text" name="skill2" value="<?php echo $skill2 ?>"></td>
                      </tr>
                      <tr>
                        <td>Update Availability</td>
                        <td>
                          <select class="form-select me-3" name="avail">
                            <option value="Available" <?php if ($avail == "Available")
                              echo "selected"; ?>>Available</option>
                            <option value="Not Available" <?php if ($avail == "Not Available")
                              echo "selected"; ?>>Not Available
                            </option>
                          </select>
                        </td>
                      </tr>

                      <tr>
                        <td colspan="2"><input class="btn btn-dark" type="submit" value="Update" name="update-btn"></td>
                      </tr>

                    </table>
                  </form>
                </div>
                <?php
              } //closing previous php while/if backet
            } ?>

            <?php
            if (isset($_POST['update-btn'])) {

              $displayname = $_POST['displayname'];
              $skill1 = $_POST['skill1'];
              $skill2 = $_POST['skill2'];
              $avail = $_POST['avail'];


              if (!empty($displayname)) {
                $query = "UPDATE displaycontent SET display_name='$displayname', display_skill='$skill1', display_skill2='$skill2', display_avail='$avail' WHERE id='$id'";
                $updateQuery = mysqli_query($conn, $query);

                if ($updateQuery) {
                  echo "
                  <div id='successModal' class='modal'>
                    <div class='modal-content'>
                      <p><strong>Success!</strong> Updated successfully.</p>
                    </div>
                  </div>
                  <style>
                    /* Modal styles */
                    .modal {
                      display: flex;
                      justify-content: center;
                      align-items: center;
                      position: fixed;
                      z-index: 9999;
                      top: 0;
                      left: 0;
                      width: 100%;
                      height: 100%;
                      background-color: rgba(0, 0, 0, 0.5);
                    }
              
                    .modal-content {
                      max-width: 300px;
                      background-color: #fff;
                      padding: 20px;
                      border-radius: 5px;
                      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
                    }
                  </style>
                  <script>
                    // Get the modal
                    var modal = document.getElementById('successModal');
              
                    // Close the modal after 3 seconds
                    setTimeout(function() {
                      modal.style.display = 'none';
                    }, 3000);
                  </script>
                  ";
                }

              }

            }
            ?>


            <div class="container mt-5">
              <table class="table table-bordered">
                <tr>
                  <th>Display Name</th>
                  <th>Display Profession</th>
                  <th>Display Course</th>
                  <th>Display Availability</th>
                  <th>Edit</th>
                </tr>

                <?php
                $query = "SELECT * FROM displaycontent";
                $readQuery = mysqli_query($conn, $query);
                if ($readQuery->num_rows > 0) {

                  while ($rd = mysqli_fetch_assoc($readQuery)) {

                    $stdid = $rd['id'];
                    $displayname = $rd['display_name'];
                    $skill1 = $rd['display_skill'];
                    $skill2 = $rd['display_skill2'];
                    $avail = $rd['display_avail'];



                    ?>
                    <tr>
                      <td><?php echo $displayname ?></td>
                      <td><?php echo $skill1 ?></td>
                      <td><?php echo $skill2 ?></td>
                      <td><?php echo $avail ?></td>


                      <td><a href="index.php?updatesoc=<?php echo $stdid ?>" class="btn btn-dark">Update</a></td>
                      <!-- <td><a href="index.php?delete=<?php echo $stdid ?>" class="btn btn-danger">Delete</a></td> -->
                    </tr>
                    <?php
                  }
                } else {
                  echo "No data to show";
                }
                ?>
              </table>
            </div>


          </div>



        </div>



        <script>
          // Get the active tab ID from localStorage or set it to the default value
          var activeTab = localStorage.getItem('activeTab') || '#homephotos';

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
          var activeTab = localStorage.getItem('activeTab') || '#home';

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