<?php

session_start();

if ($_SESSION['id_admin'] == "") {
  header("location: signin.php");
} else {

?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lily+Script+One&display=swap" rel="stylesheet">
    <title>สถานที่ของฉัน</title>
  </head>
  <style>
    body {
      margin-top: 0px;
      background-image: url('img/img4.png');
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: 100% 100%;
    }
  </style>

  <body>
    <style>
      @font-face {
        font-family: 'Lily Script One';
        src: url('path_to_font_files/linly-script.woff2') format('woff2'),
          url('path_to_font_files/linly-script.woff') format('woff');

      }

      a {
        font-family: 'Lily Script One', cursive;
      }

      .navbar {
        position: fixed;
        top: 0;
        width: 100%;
        /* Ensures the navbar spans the full width of the viewport */
        z-index: 1000;
        /* Ensure the navbar appears above other content */
        overflow: hidden;
      }


      .navbar-nav {
        margin-left: 15%;
        flex-grow: 1;
        justify-content: center;

      }

      .navbar-nav .nav-item {
        margin-left: 10%;
        align-items: center;
        justify-content: center;

      }

      .collapse .navbar-collapse {
        margin-left: 4%;
        align-items: center;

      }

      .navbar-brand {
        display: flex;
        flex-direction: column;
        align-items: center;
      }

      .navbar-brand .app-name {
        margin-bottom: -5px;
      }

      .navbar-brand .app-desc {
        font-size: 12px;
      }

      .rounded-circle {
        width: 8%;
        height: 8%;
        margin-right: 3%;
        margin-bottom: -10%;



      }
    </style>



    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <span class="app-name">Theaw-kan-mai App </span>
          <span class="app-desc">Location information management application</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" style="white-space: nowrap;" aria-current="page" href="homeadmin.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" style="white-space: nowrap;" aria-current="page" href="Areamanagement.php">Area Management</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" style="white-space: nowrap;" aria-current="page" href="areaandplacesMG.php">Places Management</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" style="white-space: nowrap;" aria-current="page" href="memberMG.php">Member Management</a>
            </li>


          </ul>
          <div>

            <form class="d-flex justify-content-end ">
              <a class="navbar-brand " href="#">Welcome, </a>
              <a class="navbar-brand" href="#">
                <span class="app-name"><?php echo $_SESSION['username']; ?></span>
                <span class="app-desc">ผู้ดูเเลระบบ</span>

              </a>
              <img src="img/pro.jpg" class="rounded-circle " alt="...">


              <a class="btn btn-success" type="submit" href="logout.php">ออกจากระบบ</a>
            </form>
          </div>
        </div>
      </div>
    </nav>

    <style>
      .addplace {
        margin-top: 100px;
        /* Adjusted margin-top to create space between button and cards */
        width: 1000px;
        /* Set button width */
        margin-left: 150px;
        margin-bottom: 10px;
        text-align: center;
        /* Center text within the button */
        display: flex;

      }
    </style>


    <div class="addplace ">
      <div style="width: 1000px; padding: 20px; white-space: nowrap;">
        <h1><b>รายการสถานที่ท่องเที่ยว</b></h1>
      </div>
      <div style="width: 300px; padding: 20px; margin-left: 450px; white-space: nowrap; margin-top: 7px;">
        <a href="addarea.php" class="btn btn-warning">เพิ่มสถานที่หลัก</a>
      </div>
      <div style="width: 300px; padding: 20px; margin-left: 10px; white-space: nowrap; margin-top: 7px;">
        <a href="addplacesbyAD.php" class="btn btn-warning">เพิ่มสถานที่ย่อย</a>
      </div>
    </div>

    <style>
      .clicked {
        background-color: #ccc;
        /* Change to the desired gray color */
      }

      .td {
        text-overflow: ellipsis;
      }
    </style>

    <script>
      function handleClick(areaName) {
        // Do something with the clicked area name
        alert('You clicked on: ' + areaName);
      }
    </script>





    <div class="container" style=" font-size: 25px; background-color: #ffffff; width: 1250px; padding: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 10, 0.15); text-align: center; 
                ">
      <b>รายละเอียด สถานที่</b>
      <div style="margin-top: 20px; ">
        <table class="table table-bordered" style="font-size: 15px; justify-content: center; text-overflow: ellipsis;">
          <thead>
            <tr>
              <th scope="col">ลำดับสถานที่</th>
              <th scope="col">รายการสถานที่ท่องเที่ยวย่อย</th>
              <th scope="col">รายละเอียดสถานที่ท่องเที่ยวย่อย</th>
              <th scope="col">สถานที่หลักที่อยู่</th>
              <th scope="col">เจ้าของสถานที่</th>
              <th scope="col">เเก้ไข</th>
              <th scope="col">ลบ</th>
            </tr>
          </thead>
          <tbody>


            <?php
            include_once('functions.php');
            $fetchdataplaces = new DB_con();
            $sql = $fetchdataplaces->fetchdataplaces();

            $fetchdataarea = new DB_con();
            $sqlar = $fetchdataarea->fetchdataarea();

            $index = 1;



            // Fetch data from your query and loop through the rows
            while ($row = mysqli_fetch_array($sql)) {
              // Check if id_manager is set and not null
              if (isset($row['id_manager']) && $row['id_manager'] !== null) {
                // Get manager info for each row
                $getinfomanager = new DB_con();
                $info = $getinfomanager->getinfomanager($row['id_manager']);
                // Check if manager info is fetched successfully
                if ($info) {
                  $manager_info = mysqli_fetch_assoc($info);
                  $manager_email = isset($manager_info['email']) ? $manager_info['email'] : 'admin';
                } else {
                  // Handle error when manager info is not fetched
                  $manager_email = 'admin';
                }
              } else {
                // Handle case where id_manager is not set or null
                $manager_email = 'admin';
              }
            ?>



              <tr>
                <td><?php echo $index ?></td>
                <?php $index = $index + 1; ?> <!-- Corrected line -->
                <td><?php echo $row['name_places']; ?></td>
                <td style="max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?php echo $row['details_places']; ?></td>
                <td><?php echo $row['id_Area']; ?></td>
                <td><?php echo $manager_email; ?></td> <!-- Display 'admin' if manager info is not available -->
                <td><a href="updateplacesAD.php?id=<?php echo $row['id_places']; ?>">แก้ไข</a></td>
                <td><a href="deleteplacesAD.php?del=<?php echo $row['id_places']; ?>">ลบ</a></td>
              </tr>


            <?php
            }
            ?>
          </tbody>


        </table>
      </div>
    </div>


    </div>





  </body>

  </html>


<?php
}
?>