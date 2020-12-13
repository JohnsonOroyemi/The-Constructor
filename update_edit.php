<?php
session_start();
include("connection.php");

if(!isset($_SESSION["user_id"])){
header("location:signin.php");
 }

 if(isset($_GET['id'])){
  $id = $_GET['id'];

  $sql="SELECT * from newpost where id = $id";

  $result=$con->query($sql);
}else{

}

?>
  

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>The Constructor</title>

   <!-- CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">

  <!-- Custom fonts for this template -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="asset/css/clean-blog.min.css" rel="stylesheet">
  <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
</head>

<body>

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
    <header class="masthead" style="background-image: url('asset/images/rotterdam-1598418_1920.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>New Development?</h1>
            <span class="subheading">Stroll down and Update</span>
          </div>
        </div>
      </div>
    </div>
  </header>

    <!-- Main Content -->
    <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
      <?php 
        if(isset($_GET['id'])){
        if(mysqli_num_rows($result) > 0){
          $row = mysqli_fetch_assoc($result);
          ?>
        <form method="post" action="process.php" name="sentMessage" id="contactForm" enctype="multipart/form-data" >
        <input name="id" type="hidden" value="<?php echo $row['ID'];?>" />
        <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Image</label>
              <input type="file" class="form-control" id="fileToUpload" name="file" value="">          

            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Heading</label>
              <input type="text" class="form-control" placeholder="Post Heading" id="name" name="postHeading" value="<?php echo $row ['PostHeading'];?>" >
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Sub-heading</label>
              <input type="text" class="form-control" placeholder="Sub-heading" id="email" name="subHeading" value="<?php echo $row ['SubHeading'];?>"  required data-validation-required-message="Please subheading">
              <p class="help-block text-danger"></p>
            </div>
          </div>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Content</label>
              <textarea rows="5" class="form-control" placeholder="Post Content" id="message" name="postContent" required data-validation-required-message="Please enter the post content"><?php echo $row ['PostContent'];?></textarea>
              <p class="help-block text-danger"></p>
            </div>
          </div>

          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Author</label>
              <input type="text" class="form-control" placeholder="Author" id="phone" name="author" value="<?php echo $row ['Author'];?>"  required data-validation-required-message="Please enter the author's name.">
              <p class="help-block text-danger"></p>
            </div>

            <div class="control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                <label>Date</label>
                <input type="date" class="form-control" placeholder="Date" id="phone" name="postDate" value="<?php echo $row['PostingDate'];?>"  required data-validation-required-message="Please choose the posting date.">
                <p class="help-block text-danger"></p>
              </div>
          </div>
          <?php
                  }else{
            echo "Not greater than zero";
          }
        }
          ?>
          <br>
          <div id="success"></div>
          <input type="submit" class="btn btn-primary" id="sendMessageButton" name="update" value="update" >
        </form>
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
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Contact Form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/clean-blog.min.js"></script>
  <script>
      CKEDITOR.replace( 'postContent' );
  </script>
</body>

</html>
