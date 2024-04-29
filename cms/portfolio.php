<?php

$conn = mysqli_connect('localhost', 'root', '', 'portfolio_hamac');

if (isset($_POST['btn'])) {

  $project_category = trim($_POST['project_category']);
  $project_name = trim($_POST['project_name']);
  $photo = $_FILES["project_img"];
  $uploadOk = 1;
  $targetDir = "portfolio/";
  $targetFile = $targetDir . basename($photo["name"]);
  $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

  // Check if any of the fields are empty
  if (empty($project_category) || empty($photo["name"])) {
    echo "";
  } else {
    // Check if file was uploaded and that there were no errors
    if ($photo["error"] == UPLOAD_ERR_OK) {
      // Generate unique file name to prevent conflicts
      $fileName = uniqid() . '.' . $imageFileType;

      // Move uploaded file to target directory
      if (move_uploaded_file($photo["tmp_name"], $targetDir . $fileName)) {
        // Insert record into database
        $stmt = $conn->prepare("INSERT INTO portfolio (project_category, project_name, project_img) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $project_category, $project_name, $fileName);
        $stmt->execute();

        echo "File uploaded successfully.";
      } else {
        echo "Error uploading file.";
      }
    } else {
      echo "Error uploading file.";
    }
  }
}
?>

<!-- code for delete  -->
<?php
//if click on delete
if (isset($_GET['delete'])) {
  $stdid = $_GET['delete']; //keeping the delete id in stdid
  $query = "DELETE FROM portfolio WHERE id={$stdid}";
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
    <title>Portfolio</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="shortcut icon" href="" type="image/png">

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
          <h1 style="line-height: 1;"><a href="index.php" class="logo"> <span>CMS Portfolio</span></a></h1>

          <ul class="list-unstyled components mb-5">

            <li>
              <a href="./"><span class="fa fa-home mr-3"></span> Home</a>
            </li>

            <li>
              <a href="about.php"><span class="fa fa-address-card mr-3"></span> About</a>
            </li>


            <li>
              <a href="service.php"><span class="fa fa-tasks mr-3"></span> Service</a>
            </li>

            <li class="active">
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
        <h2 class="mb-4">PORTFOLIO</h2>



        <button type="button" class="btn btn-dark" onclick="togglePopUp('portfolio')"><i class="fas fa-plus"></i> Add a
          Project</button>

        <div id="portfolio" class="popup" style="display: none;">
          <div class="popup-content">

            <span class="close" onclick="togglePopUp('portfolio')">&times;</span>

            <div class="container shadow m-5 p-4 mx-auto rounded">
              <form method="post" action="portfolio.php" enctype="multipart/form-data">

                <div class="form-group">

                  <div class="row mb-3">
                    <div class="col">
                      <label for="school" class="form-label">Enter Project Category</label>
                      <input type="text" class="form-control" id="project_category" name="project_category"
                        placeholder="Enter the project category">
                    </div>
                  </div>

                  <tr>


                    <div class="row mb-3">
                      <div class="col">
                        <select class="form-select me-3" name="project_category">
                          <option selected disabled>Existing Created Category</option>


                          <?php
                          // Loop through the data and display each row in a table row
                          $query = "SELECT DISTINCT project_category FROM portfolio ORDER BY project_category ASC";
                          $readQuery = mysqli_query($conn, $query);
                          if ($readQuery->num_rows > 0) {
                            while ($rd = mysqli_fetch_assoc($readQuery)) {

                              $stdid = $rd['id'];
                              $project_category = $rd['project_category'];
                              ?>


                              <option value="<?php echo "$project_category" ?>"><?php echo "$project_category" ?></option>

                              <?php
                            }
                          } else {
                            echo "No data to show";
                          }

                          ?>

                        </select>
                      </div>
                    </div>


                    <div class="row mb-3">
                      <div class="col">
                        <label for="school" class="form-label">Enter Project Name</label>
                        <input type="text" class="form-control" id="project_name" name="project_name"
                          placeholder="Enter the project name">
                      </div>
                    </div>

                    <label for="photo">Select a photo:</label>
                    <input type="file" name="project_img" id="project_img">



                    <div class="row mb-3">
                      <div class="col-auto">
                        <button type="submit" class="btn btn-success" name="btn">Submit</button>
                      </div>
                    </div>

                </div>

              </form>
            </div>

          </div>
        </div>



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



        <?php
        if (isset($_GET['update'])) { //if click on update button
          $id = $_GET['update']; //geting update id from search query
          $query = "SELECT * FROM portfolio WHERE id={$id}";
          $getData = mysqli_query($conn, $query); //getting data based on query
      
          while ($rx = mysqli_fetch_assoc($getData)) { //keep data rx variable afte fetch
            $id = $rx['id'];
            $project_category = $rx['project_category'];
            $project_name = $rx['project_name'];
            $project_img = $rx['project_img'];
            ?>

            <div class="container  m-5 p-3 mx-auto hidethis">
              <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="container"
                onclick="hideContainer()"></button>
              <form method="post" class="d-flex justify-content-around" enctype="multipart/form-data">
                <table class="bordered padded wide">
                  <tr>
                    <td>Update Project Category</td>
                    <td><input class="form-control me-3" type="text" name="project_category"
                        value="<?php echo $project_category ?>"></td>
                  </tr>
                  <tr>
                    <td>Update Project Name</td>
                    <td><input class="form-control me-3" type="text" name="project_name" value="<?php echo $project_name ?>">
                    </td>
                  </tr>
                  <tr>
                    <td>Current Project Image</td>
                    <td><?php echo "<img style='max-width:100px;' src='portfolio/" . "$project_img" . "'>" ?></td>
                  </tr>
                  <tr>
                    <td>Update Project Image</td>
                    <td>
                      <label for="project_img">Select a new photo:</label>
                      <input type="file" name="project_img" id="project_img">
                      <input type="hidden" name="current_project_img" value="<?php echo $project_img ?>">
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
          // Retrieve form data
          $project_category = $_POST['project_category'];
          $project_name = $_POST['project_name'];
          $current_project_img = $_POST['current_project_img']; // get the filename of the current image
          $project_img = $_FILES['project_img']['name']; // get the filename of the uploaded file
      
          if (!empty($project_category) && !empty($project_name)) {
            if (!empty($project_img)) { // if a new image is uploaded
              // upload the file to the "portfolio" folder with a new filename
              $target_dir = "portfolio/";
              $target_file = $target_dir . basename($_FILES["project_img"]["name"]);
              $new_project_img = basename($_FILES["project_img"]["name"]);
              $uploadOk = 1;
              $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
              // Check if image file is a actual image or fake image
              if (isset($_POST["submit"])) {
                $check = getimagesize($_FILES["project_img"]["tmp_name"]);
                if ($check !== false) {
                  $uploadOk = 1;
                } else {
                  echo "File is not an image.";
                  $uploadOk = 0;
                }
              }
              // Check if file already exists
              if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
              }

              // Allow certain file formats
              if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
              }
              // Check if $uploadOk is set to 0 by an error
              if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
              } else {
                if (move_uploaded_file($_FILES["project_img"]["tmp_name"], $target_file)) {
                  // delete the old image file
                  unlink($current_project_img);
                  // update the project with the new image filename
                  $sql = "UPDATE portfolio SET project_category = ?, project_name = ?, project_img = ? WHERE id = ?";
                  $stmt = $conn->prepare($sql);
                  $stmt->bind_param("sssi", $project_category, $project_name, $new_project_img, $id);
                  $stmt->execute();
                  $stmt->close();
                  echo "<script>alert('Data successfully updated.');</script>";
                } else {
                  echo "Sorry, there was an error uploading your file.";
                }
              }
            } else { // if no new image is uploaded
              $sql = "UPDATE portfolio SET project_category = ?, project_name = ? WHERE id = ?";
              $stmt = $conn->prepare($sql);
              $stmt->bind_param("ssi", $project_category, $project_name, $id);
              $stmt->execute();
              $stmt->close();
              echo "<script>alert('Data successfully updated.');</script>";
            }
          } else {
            echo "Please fill in all fields.";
          }
        }

        ?>





        <hr>


        <div class="container">
          <table class="table table-bordered">
            <tr>
              <th>Project Category</th>
              <th>Project Name</th>
              <th>Project Image</th>
            </tr>

            <?php
            // Pagination variables
            $results_per_page = 6; // Number of results per page
            $query = "SELECT * FROM portfolio ORDER BY project_category ASC";
            $result = mysqli_query($conn, $query);
            $number_of_results = mysqli_num_rows($result);
            $number_of_pages = ceil($number_of_results / $results_per_page);

            // Determine which page number visitor is currently on
            if (!isset($_GET['page'])) {
              $page = 1;
            } else {
              $page = $_GET['page'];
            }

            // Determine the SQL LIMIT starting number for the results on the displaying page
            $starting_limit_number = ($page - 1) * $results_per_page;

            // Retrieve the data for the current page
            $query = "SELECT * FROM portfolio ORDER BY project_category ASC LIMIT $starting_limit_number, $results_per_page";
            $readQuery = mysqli_query($conn, $query);

            // Loop through the data and display each row in a table row
            if ($readQuery->num_rows > 0) {
              while ($rd = mysqli_fetch_assoc($readQuery)) {
                $stdid = $rd['id'];
                $project_category = $rd['project_category'];
                $project_name = $rd['project_name'];
                $project_img = $rd['project_img'];
                ?>

                <tr>
                  <td><?php echo "$project_category" ?></td>
                  <td><?php echo "$project_name" ?></td>
                  <td><?php echo "<img style='max-width:100px;' src='portfolio/" . "$project_img" . "'>" ?></td>

                  <td><a href="portfolio.php?update=<?php echo "$stdid" ?>&img=<?php echo "$project_img" ?>"
                      class="btn btn-dark">Update</a></td>
                  <!-- passing query parameter id for perform delete while click on delete btn -->
                  <td><a href="portfolio.php?delete=<?php echo "$stdid" ?>" class="btn btn-danger">Delete</a></td>
                </tr>

                <?php
              }
            } else {
              echo "No data to show";
            }
            ?>

          </table>

          <div class="text-center">
            <nav aria-label="Page navigation">
              <ul class="pagination">
                <?php
                for ($page = 1; $page <= $number_of_pages; $page++) {
                  echo '<li class="page-item"><a href="portfolio.php?page=' . $page . '" class="btn btn-dark text-white h5 mr-2">' . $page . '</a></li> ';
                }
                ?>
              </ul>
            </nav>
          </div>


        </div>







      </div>
    </div>

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