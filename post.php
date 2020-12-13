<?php
session_start();
include("connection.php");
$name = "The Constructor";

if(isset($_GET['id'])){
  $id = $_GET['id'];

  $sql="select * from newpost where id = $id";

  $result=$con->query($sql);
}else{

}


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

  <?php 
        if(isset($_GET['id'])){
        if(mysqli_num_rows($result) > 0){
          $row = mysqli_fetch_assoc($result);
  ?>
  <!-- Page Header -->
  <header class="masthead" style="background-image: url('asset/images/rotterdam-1598418_1920.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
        
          <div class="post-heading">
            <h1>
            <?php 
              echo ucwords(strtolower($row["PostHeading"]));
            ?>
            </h1>
            <h2 class="subheading">
            <?php 
              echo ucwords(strtolower($row["SubHeading"]));
            ?>
            </h2>
        
            <span class="meta">Posted by
              <a href="#"><?php 
              echo ucwords(strtolower($row["Author"]));
            ?></a>
              on <?php 
              echo ucwords(strtolower($row["PostingDate"]));
            ?></span>

          </div>
          
        </div>
      </div>
    </div>
  </header>

  <!-- Post Content -->
  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <p>
          <img src="<?php 
              echo 'asset/uploads/'.$row["PostImage"];
            ?>" alt="<?php 
              echo $row["PostHeading"];
            ?>" style="width:100%">
          <?php 
              echo $row["PostContent"];
            ?>
          </p>
          
        </div>
      </div>
    </div>
  </article>
  <?php
    }else{
    echo "Not greater than zero";
  }
}
  ?>
 
  <hr>

  
  <?php
  //inserting footer file
    include("footer.php");
  ?>
  
  