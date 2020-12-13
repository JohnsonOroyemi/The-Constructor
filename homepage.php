<?php
session_start();
include("connection.php");
$name = "The Constructor";

  $sql="select * from newpost order by id desc limit 2";
  $result=$con->query($sql);
  

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?php echo $name;  ?></title>

  <!-- Bootstrap core CSS -->
  <!-- CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">

  <!-- Custom fonts for this template -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="asset/css/clean-blog.min.css" rel="stylesheet">

</head>

<body>
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
            <img src="<?php 
              echo 'asset/uploads/'.$row["PostImage"];
            ?>" alt="<?php 
              echo $row["PostHeading"];
            ?>" style="width:100%;height:300px">
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
          <a class="btn btn-primary float-right" href="view_post.php">Older Posts &rarr;</a>
        </div>
      </div>
    </div>
  </div>

  <hr>


  <!-- Footer -->
  <footer>
              <?php
            //inserting footer file
              include("footer.php");
            ?>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <!-- jQuery and JS bundle w/ Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <!-- Custom scripts for this template -->
  <script src="asset/js/clean-blog.min.js"></script>
</body>

</html>