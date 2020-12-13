<?php
session_start();
include("connection.php");
$name = "The Constructor";

  $sql="select * from newpost order by id desc limit 2";
  $result=$con->query($sql);
  

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
        //inserting nava bar file
          include("nav_bar.php");
        ?>
        </div>
    </nav>
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('asset/images/frankfurt-1804481_1920.jpg')">
        <div class="overlay"></div>
        <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
                <h1><?php echo $name; ?></h1> <br>
                <span class="subheading">A Platform developed for Knowledge Management in Construction Industry</span>
            </div>
            </div>
        </div>
        </div>
    </header>

    <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
      <?php while($row=$result->fetch_array()) 
          {?>
        <div class="post-preview">
          <a href="post.php?id=<?php echo $row['ID']; ?>">
            <h2 class="post-title">
            <?php 
              echo ucwords(strtolower($row["PostHeading"]));
            ?>
              <!--Man must explore, and this is exploration at its greatest-->
            </h2>
            <h3 class="post-subtitle">
            <?php 
              echo ucwords(strtolower($row["SubHeading"]));
            ?>
              <!--Problems look mighty small from 150 miles up
              PostContent-->
            </h3>
          </a>
          <p class="post-meta">Posted by
            <a href="#"><?php 
              echo ucwords(strtolower($row["Author"]));
            ?></a>
            on <?php 
              echo ucwords(strtolower($row["PostingDate"]));
            ?></p>
        </div>
        <hr>
        <?php
          }
          ?>
        
        <!-- Pager -->
        <div class="clearfix">
          <a class="btn btn-primary float-right" href="all_post.php">Older Posts &rarr;</a>
        </div>
      </div>
    </div>
  </div>

  <hr>


  <!-- Footer -->
  
<?php
//inserting footer file
  include("footer.php");
?>
  

  