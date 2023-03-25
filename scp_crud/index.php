<?php

include 'connection.php';

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    // delete sql command
    $del = "delete from scp where id=$id";

    if ($conn->query($del) === TRUE) {
            $status ="Entry+Deleted";
            header("Location:status.php?delete=".$status);
            exit();
    } else {
        $status = "Unable to delete";
        header("location: status.php$error".$status);
        exit();
    }
} //end of delete
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SCP Foundation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/style2.css">
    <link rel="stylesheet" href="assets/css/scp.css">

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
                    <li class="menu-item active">
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
                                            <li><a class="dropdown-item" href="index.php?link='<?php echo $link['item'] ?>'"><?php echo 'SCP-', $link['item'] ?></a></li>
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
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4">Featured Files</h4>
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <?php

                                        if (isset($_GET['link'])) {
                                            
                                            $item = trim($_GET['link'], "'");

                                            $record = $conn->query("select * from scp where item='$item'");
                                            $array = $record->fetch_assoc();

                                            $id = $array['id'];
                                            $update = "update.php?update=" . $id;
                                            $delete = "index.php?delete=" . $id;
                                            echo "

        <div>
         <img src='assets/images/icons/{$array['object_class']}.svg' class='scp_object_class' alt='{$array['object_class']}'>
        <h2>Item #: SCP-{$array['item']}</h2>
         <h3>Special Containment Procedures: <span style='color:" . ($array['object_class'] == 'Euclid' ? 'green' : ($array['object_class'] == 'Safe' ? 'yellow' : 'red')) . "'>{$array['object_class']}</span></h3>

                      <br>
        <p class='mb-0'><strong>Special Containment Procedures: </strong>{$array['special_containment_procedures']}</p>
        <br>
        <p class='mb-0'><strong>Description: </strong>{$array['description']}</p> 
        <br>
             ";
                                            if ($array['addendum'] != "") {
                                                echo "
        <p class='mb-0'><strong>Addendum: </strong>{$array['addendum']}</p>
        <br>
        ";
                                            }
                                            echo "
        <p><a href='{$update}' class='btn rounded-pill btn-success'>Update Record</a>\t\t\t<a href='{$delete}' class='btn rounded-pill btn-danger'>Delete Record</a></p>
        </div>
    
    ";
                                        } else {
                                            echo " <div class='row row-cols-1 row-cols-md-3 g-4 mb-5'>";
                                            foreach ($randomV as $rnd) {
                                                echo "
                                                                                       
                                                                                       <div class='col'>
                  <div class='card h-100 bg-transparant'>
                    <img class='card-img-top' src='./assets/images/scp_trans.png' alt='Card image cap' />
                    <div class='card-body'>
                      <h4 class='card-title text-center text-danger'>SCP-{$rnd['item']}</h4>
                      <p class='card-text'>
                       {" . substr($rnd['description'], 0, 300) . "...}
                      </p>
                      <a class='btn btn-success' href='index.php?link={$rnd['item']}'>Read More</a>
                    </div>
                  </div>
                </div>
                                                                                       ";
                                            }
                                        }



                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Content -->

                <!-- Footer -->
                <footer class="content-footer footer bg-footer-theme">
                    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                        <div class="mb-2 mb-md-0">
                            ©SCP Foundation

                        </div>
                        <div>
                            <a href="#" class="footer-link me-4" target="#top">Top of Page</a>

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