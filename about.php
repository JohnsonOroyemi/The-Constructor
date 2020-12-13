<?php
$name = "The Constructor";
?>

<?php
  include("header.php");
?>


  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="index.php">The Constructor</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <?php
          include("nav_bar.php");
        ?>
    </div>
  </nav>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('asset/images/skyline-3581739_1920.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>The Constructor</h1>
            <h4 class="subheading">Borne out of passion to protect the integrity of Construction Industry by educating both the professionals as well as the populace. The constructor set out to bring an end to misinformation by providing proven and evidence based information as far as construction is concerned.</h4>
          </div>
        </div>
      </div>
    </div>
  </header>

  <hr>

    <!-- Footer -->
  <?php
//inserting footer file
  include("footer.php");
?>




  