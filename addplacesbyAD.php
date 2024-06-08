<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<?php

session_start();

if ($_SESSION['id_admin'] == "") {
    header("location: signin.php");
} else {

?>
    <?php
    include_once('functions.php');
    $userdata = new DB_con();

    if (isset($_POST['insert'])) {
        $name_Area = $_POST['name_Area'];
        $name_places = $_POST['name_places'];
        $details_places = $_POST['details_places'];
        $contact_places = $_POST['contact_places'];


        $sql = $userdata->addplacesbyadmin($name_places, $details_places, $contact_places, $name_Area, $_SESSION['id_admin']);

        if ($sql) {
            // echo "<script>alert('Add Places Success!');</script>";
            // echo "<script>window.location.href='areaandplacesMG.php'</script>";
            echo  "<script>
                $(document).ready(function() {
                    Swal.fire({
                        title: 'Add Places Success!',
                        text: 'กำลังบันทึกข้อมูลสถานที่',
                        icon: 'success',
                        timer: 1000,
                        showConfirmButton: false
                    }).then(() => {
                        window.location.href = 'areaandplacesMG.php';
                    });
                });
            </script>";
        } else {
            // echo "<script>alert('Add Places Failed!');</script>";
            // echo "<script>window.location.href='addplacesbyAD.php'</script>";
            echo  "<script>
                $(document).ready(function() {
                    Swal.fire({
                        title: 'Add Places Failed!',
                        text: 'ไม่สามารถเพิ่มสถานที่ได้ โปรดลองอีกครั้ง!',
                        icon: 'error',
                        timer: 3000,
                        showConfirmButton: false
                    }).then(() => {
                        window.location.href = 'addplacesbyAD.php';
                    });
                });
            </script>";
        }
    }
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
        <title>เพิ่มข้อมูลสถานที่ท่องเที่ยว</title>
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
                margin-left: 1%;
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

            .dropdown-item {
                font-size: 20px;
            }

            .rounded-circle {
                width: 5%;
                height: 5%;
                margin-right: 3%;
                margin-bottom: -10%;

            }

            .sidebar {
                height: 100vh;
                width: 250px;
                position: fixed;
                top: 0;
                left: 0;
                background-color: #f8f9fa;
                padding-top: 20px;
                border-right: 1px solid #dee2e6;
            }

            .sidebar .nav-link {
                font-weight: bold;
                color: #000;
                /* Set font color to black */
            }

            .sidebar .nav-link:hover {
                background-color: #ffc107;
                /* Change background color to warning on hover */
                color: white;
                /* Optional: Change font color to white on hover */
            }

            .content {
                margin-left: 250px;
                padding: 20px;
            }

            .custom-margin-left {
                margin-left: 20px;
                /* Custom left margin */
            }
        </style>


        <nav class="navbar navbar-expand-lg navbar-light bg-warning">
            <button class="btn btn-warning custom-margin-left" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                <i class="fas fa-bars "></i>
            </button>
            <div class="container-fluid ">
                <a class="navbar-brand" href="#">
                    <span class="app-name">Theaw-kan-mai App </span>
                    <span class="app-desc">Location information management application</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>


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

        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel">Menu</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="nav flex-column">
                    <li class="nav-item mt-3">
                        <a class="dropdown-item" aria-current="page" href="homeadmin.php">Home</a>
                    </li>
                    <li class="nav-item mt-2">
                        <a class="dropdown-item" href="Areamanagement.php">Area Management</a>
                    </li>
                    <li class="nav-item mt-2">
                        <a class="dropdown-item" href="areaandplacesMG.php">Places Management</a>
                    </li>
                    <li class="nav-item dropdown mt-2">
                        <a class="dropdown-item dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Type Management
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item mt-2" href="typearea.php">Area Type Management</a></li>
                            <li><a class="dropdown-item mt-2" href="tourtypeMG.php">Tour Type Management</a></li>

                        </ul>
                    </li>
                    <li class="nav-item mt-2">
                        <a class="dropdown-item" href="memberMG.php">Member Management</a>
                    </li>
                </ul>
            </div>
        </div>

        <style>
            .container {
                margin-top: 40px;
                width: 100%;
                /* Set the initial width */
                max-width: 1000px;
                margin-top: 10px;

            }

            .addplace {
                margin-top: 100px;
                /* Adjusted margin-top to create space between button and cards */
                width: 200px;
                /* Set button width */
                margin-left: 1255px;
                margin-right: auto;
                display: block;
                /* Make the button a block-level element to center it */
                text-align: center;
                /* Center text within the button */
            }
        </style>
        <?php
        include_once('functions.php');
        $fetchdataarea = new DB_con();
        $sql = $fetchdataarea->fetchdataarea();


        ?>
        <div class="addplace "><a></a></div>
        <div class="container">
            <h1 class="mt-5"> เพิ่มข้อมูลสถานที่ท่องเที่ยว </h1>
            <hr>

            <form method="post">
                <div class="mb-3">
                    <label for="name_Area" class="form-label">ต้องการเพิ่มในสถานที่บริเวณไหน</label>
                    <select class="form-select" id="name_Area" name="name_Area" aria-describedby="ชื่อสถานที่หลัก" required>
                        <!-- Add option elements for each main location -->
                        <option value="" disabled selected>โปรดเลือกสถานที่</option>
                        <?php
                        while ($row = mysqli_fetch_array($sql)) {
                        ?>
                            <!-- Ensure to echo the value of name_Area -->
                            <option value='<?php echo $row['name_Area']; ?>'><?php echo $row['name_Area']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>


                <div class="mb-3">
                    <label for="name_places" class="form-label">ชื่อสถานที่</label>
                    <input type="text" class="form-control" id="name_places" name="name_places" aria-describedby="ชื่อสถานที่" onblur="nameplacescheck(this.value)" required>
                    <span id="placesnameavailable"></span>
                </div>
                <div class="mb-3">
                    <label for="details_places" class="form-label">ข้อมูลทั่วไปของสถานที่</label>
                    <textarea type="text" class="form-control" row="10" id="details_places" name="details_places" aria-describedby="ข้อมูลทั่วไปของสถานที่" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="contact_places" class="form-label">ข้อมูลติดต่อ สถานที่</label>
                    <input type="text" class="form-control" id="contact_places" name="contact_places" aria-describedby="ข้อมูลติดต่อ สถานที่" required>

                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">รูปภาพสถานที่</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                </div>

                <button type="submit" name="insert" id="insert" class="btn btn-warning">เพิ่มข้อมูลสถานที่ใหม่</button>

            </form>
        </div>


        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script>
            function nameplacescheck(val) {
                $.ajax({
                    type: 'POST',
                    url: 'checkplaces_available.php',
                    data: 'name_places=' + val,
                    success: function(data) {
                        $('#placesnameavailable').html(data);
                    }
                });

            }
        </script>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    </body>

    </html>

<?php
}
?>