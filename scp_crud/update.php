<?php

include 'connection.php';

 if(isset($_POST['update']))
    {
        // Create variables from our form post data
            $id = $_POST['id'];
        
        
        // using escape method (procedule Style) to allow certain characters to be inserted into DB
            $item = mysqli_real_escape_string($conn, $_POST['item']);
            $object_class = mysqli_real_escape_string($conn, $_POST['object_class']);
            $image = mysqli_real_escape_string($conn, $_POST['image']);
            $special_containment_procedures = mysqli_real_escape_string($conn, $_POST['special_containment_procedures']);
            $description = mysqli_real_escape_string($conn, $_POST['description']);
            $addendum = mysqli_real_escape_string($conn, $_POST['addendum']);
        
        // create a sql update command
        $update = "update scp set item='$item', object_class='$object_class', special_containment_procedures='$special_containment_procedures', description='$description', addendum='$addendum' where id='$id'";
        
        if($conn->query($update) === TRUE)
        {
            $status ="Update+Successful";
            header("Location:status.php?update=".$status);
            exit();
        }
        else
        {
            $error = "update+failed";
            header("Location:status.php?error=".$error);
            exit();
        }
        
    } // end isset POST (update record)
    
        $id = $_GET['update'];
        $record = $conn->query("select * from scp where id=$id");
        $row = $record->fetch_assoc();

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SCP Foundation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/style2.css">
    <link rel="stylesheet" href="./assets/css/scp.css">
</head>

<body class="bodybg">


    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
         <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.php" class="app-brand-link">
              <span class="app-brand-logo demo">
              </span>
              <span class="app-brand-text demo menu-text fw-bolder ms-2">SCP Foundation</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item">
              <a href="index.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Home</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="create.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Create</div>
              </a>
            </li>
            <!-- Layouts -->
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Subject Files</span>
            </li>
            
              </ul>
          </ul>
        </aside>
        <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <nav class="navbar navbar-expand-lg bg-dark mb-5">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="index.php"><img src="assets/images/icons/scp-foundation.png" alt="SCP_Logo"> </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="create.php">Create Record</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Subject Files
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                                        <?php foreach ($all_records as $link) : ?>
                                            <li><a class="dropdown-item" href="index.php?link='<?php echo $link['item'] ?>'"><?php echo $link['item'] ?></a></li>
                                        <?php endforeach; ?>


                                    </ul>
                                </li>

                            </ul>
                            <form class="d-flex" onsubmit="return false">
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                                <button class="btn btn-outline-primary" type="submit">Search</button>
                            </form>
                        </div>
                    </div>
                </nav>

                <!-- / Navbar -->



                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4">Update Entry</h4>

                        <!-- Basic Layout -->
                        <div class="row">

                            <div class="col-xl">
                                <div class="card mb-4">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5 class="mb-0">SCP Entry</h5>
                                        <small class="text-muted float-end">Restricted access required</small>
                                    </div>

                                    <div class="card-body">
                                        <div class="mb-3">
                                            <form method="post" action="" class="form-group">
                                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>" <label class="form-label" for="basic-icon-default-fullname">Item #:</label>
                                                <div class="input-group input-group-merge">
                                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i class="scpicon"></i></span>
                                                    <input type="text" class="form-control" id="basic-icon-default-fullname" placeholder="SCP-XXXX" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" name="item" value="<?php echo $row['item']; ?>" />
                                                </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="basic-icon-default-company">Object Class:</label>
                                            <div class="input-group input-group-merge">
                                                <span id="basic-icon-default-company2" class="input-group-text"><i class="scpicon"></i></span>
                                                <input type="text" class="form-control" id="basic-icon-default-fullname" placeholder="indicate which class" aria-label="indicate which class" aria-describedby="basic-icon-default-fullname2" name="object_class" value="<?php echo $row['object_class']; ?>" />
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="basic-icon-default-company">Image:</label>
                                            <div class="input-group input-group-merge">
                                                <span id="basic-icon-default-company2" class="input-group-text"><i class="scpicon"></i></span>
                                                <input type="file" class="form-control" id="basic-icon-default-fullname" placeholder="Upload Image" aria-label="image upload" aria-describedby="basic-icon-default-fullname2" name="image" value="<?php echo $row['image']; ?>" />
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <div class="input-group input-group-merge">
                                                <span id="basic-icon-default-company2" class="input-group-text"><i class="scpicon"></i></span>
                                                <textarea id="basic-icon-default-message" class="form-control" placeholder="Paragraphs explaining the procedures" aria-label="Paragraphs explaining the procedures" aria-describedby="basic-icon-default-message2" name="special_containment_procedures"><?php echo $row['special_containment_procedures']; ?></textarea>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="basic-icon-default-phone">Description:</label>
                                            <div class="input-group input-group-merge">
                                                <span id="basic-icon-default-phone2" class="input-group-text"><i class="scpicon"></i></span>
                                                <textarea id="basic-icon-default-message" class="form-control" placeholder="Paragraphs explaining the description" aria-label="Paragraphs explaining the description" aria-describedby="basic-icon-default-message2" name="description"><?php echo $row['description']; ?></textarea>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="basic-icon-default-message">Addendum:</label>
                                            <div class="input-group input-group-merge">
                                                <span id="scpicon" class="input-group-text"><i class="scpicon"></i></span>
                                                <textarea id="basic-icon-default-message" class="form-control" placeholder="Optional additional paragraphs" aria-label="Hi, Do you have a moment to talk Joe?" aria-describedby="basic-icon-default-message2" name="addendum"><?php echo $row['addendum']; ?></textarea>
                                            </div>
                                        </div>

                                        <input type="submit" name="update" value="Update record" class="btn rounded-pill btn-primary">

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / Content -->
                    <!-- Footer -->
                    <footer class="content-footer footer footerbg">
                        <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                            <div class="mb-2 mb-md-0">
                                ©SCP Foundation
                            </div>
                            <div>
                                <a href="#" class="footer-link me-4" target="#top">Top of page</a>

                            </div>
                        </div>
                    </footer>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->










    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>

</html>