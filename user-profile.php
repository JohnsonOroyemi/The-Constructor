<?php
$name = "ConsT Herit";
?>

<?php
  include("header.php");
?>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="index.php"><?php echo $name;  ?></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <?php
          include("nav_bar.php");
        ?>
    </div>
  </nav>

  <section id="container">
 <!-- Page Header -->
 <header class="masthead" style="background-image: url('')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1></h1>
            <h4 class="subheading"></h4>
          </div>
        </div>
      </div>
    </div>
  </header>
<aside>
  <div id="sidebar" class="nav-collapse ">
  <ul class="sidebar-menu" id="nav-accordion">
              <li><a href="general.html">General</a></li>
              <li><a href="buttons.html">Buttons</a></li>
              <li><a href="panels.html">Panels</a></li>
              <li><a href="font_awesome.html">Font Awesome</a></li>
            </ul>
</div>
  </aside>

  <section id="main-content">
      <section class="wrapper site-min-height">

    </section>
</section>
  </section>
   

  

  <hr>

<!-- Footer -->
          <?php
        //inserting footer file
          include("footer.php");
        ?>