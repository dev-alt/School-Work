<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SCP Foundation</title>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">

</head>


<body class="bg-secondary">

  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
        <div class="col-12">
<nav class="navbar navbar-expand-lg  blur border-radius-xl top-0 z-index-fixed shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
  <div class="container-fluid px-0">
    <a class="navbar-brand font-weight-bolder ms-sm-3" href="#" rel="tooltip" title="Designed and Coded by Creative Tim" data-placement="bottom" target="_blank">
      SCP Foundation
    </a>
    <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon mt-2">
        <span class="navbar-toggler-bar bar1">1</span>
        <span class="navbar-toggler-bar bar2"></span>
        <span class="navbar-toggler-bar bar3"></span>
      </span>
    </button>
    <div class="collapse navbar-collapse pt-3 pb-2 py-lg-0 w-100" id="navigation">
      <ul class="navbar-nav navbar-nav-hover ms-auto">
        <li class="nav-item dropdown dropdown-hover mx-2">
          <a class="nav-link ps-2 d-flex cursor-pointer align-items-center" id="dropdownMenuPages" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="material-icons opacity-6 me-2 text-md">dashboard</i>
            Subject Files
            <img src="images/icons/down-arrow-white.svg" alt="down-arrow" class="arrow ms-auto ms-md-2">
          </a>
          <div class="dropdown-menu dropdown-menu-animation ms-n3 dropdown-md p-3 border-radius-xl mt-0 mt-lg-3" aria-labelledby="dropdownMenuPages">
          <div class="d-none d-lg-block"> <a href="#1" class="dropdown-item border-radius-md">
    <span>SCP-001</span>
  </a>
  <a href="#2" class="dropdown-item border-radius-md">
    <span>SCP-002</span>
  </a>
  <a href="#3" class="dropdown-item border-radius-md">
    <span>SCP-003</span>
  </a>
  <a href="#4" class="dropdown-item border-radius-md">
    <span>SCP-004</span>
  </a>
  <a href="#5" class="dropdown-item border-radius-md">
    <span>SCP-005</span>
  </a>
  <a href="#6" class="dropdown-item border-radius-md">
    <span>SCP-006</span>
  </a></div>
          <div class="d-lg-none">

  <a href="#1" class="dropdown-item border-radius-md">
    <span>SCP-001</span>
  </a>
  <a href="#2" class="dropdown-item border-radius-md">
    <span>SCP-002</span>
  </a>
  <a href="#3" class="dropdown-item border-radius-md">
    <span>SCP-003</span>
  </a>
  <a href="#4" class="dropdown-item border-radius-md">
    <span>SCP-004</span>
  </a>
  <a href="#5" class="dropdown-item border-radius-md">
    <span>SCP-005</span>
  </a>
  <a href="#6" class="dropdown-item border-radius-md">
    <span>SCP-006</span>
  </a>

</div>

</div>

          </div>
        </li>

      </ul>
    </div>
</nav>

</div></div></div>
<!-- End Navbar -->
<div class="header-2 z-index-100">
    <div class="page-header min-vh-75 relative" style="background-image: url('images/scp-background.png');"></div>
    </div> 

<br>
 <div class="container">

  <div class="row row-cols-1 row-cols-md-2 g-4">
  <?php
        // Variable that will hold our JSON content
        $scp = json_decode(file_get_contents('scp.json'));
  
  
        foreach($scp as $display)
        {
            echo "
            <div class='col'>
            <div class='card text-white bg-dark mb-3 card h-100'>
            <div class='card-body' id='$display->id'>
              <h5 class='card-title text-center text-danger'>$display->title</h5>
              <h6 class='card-subtitle mb-2 text-muted text-center'>$display->item</h6>
              <img src='$display->image' class='card-img-top'/>
              <br>
              <p class='card-text text-center text-muted'>Object Class: $display->class</p>
              <p class='card-text'>$display->content</p>
            </div>
            <div class='card-footer border-success bg-light col-md-12 text-center'>
            <button class=btn btn-default id='button$display->id'>
            <img src='images/icons/play-button.png' width='20'/> Play
            </button>
            <button class=btn btn-default onclick='Stop()'>
             <img src='images/icons/stop-button.png' width='20' /> Stop
            </button>
            <button class=btn btn-default onclick='Pause()'>
            <img src='images/icons/pause-button.png' width='20' /> Pause
           </button>
           <button class=btn btn-default onclick='Resume()'>
           <img src='images/icons/play-button.png' width='20' /> Resume
          </button>
          
</div></div>
            
          </div>

          ";
        }

    ?>


</div>

</div> 

<footer class="footer pt-5 mt-5">
<div class="container">
      <div class=" row">
        <p class="text-center">SCP Foundation Copyright © 2022</p>
      </div>
</div>

</footer>
  <script src="speech.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html> 