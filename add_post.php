<?php
session_start();
if(!isset($_SESSION["user_id"])){
header("location:signin.php");
 }
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

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('asset/images/panorama-2117310_1920.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>New Post?</h1>
            <span class="subheading">Stroll down and add</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <span><?php if(isset($_GET['r'])){echo $_GET['r'];} ?></span>
        <form method="post" action="process.php" name="sentMessage" id="contactForm" enctype="multipart/form-data">
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Image</label>
              <input type="file" class="form-control" id="fileToUpload" name="file" >
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Heading</label>
              <input type="text" class="form-control" placeholder="Post Heading" id="name" name="postHeading" required data-validation-required-message="Please enter the post heading.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Sub-heading</label>
              <input type="text" class="form-control" placeholder="Sub-heading" id="email" name="subHeading" required data-validation-required-message="Please subheading">
              <p class="help-block text-danger"></p>
            </div>
          </div>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Content</label><br><br>
              <textarea rows="5" class="form-control" placeholder="Post Content" id="message" name="postContent" required data-validation-required-message="Please enter the post content."></textarea>
              <!-- <textarea name="editor1"></textarea> -->
              <p class="help-block text-danger"></p>
            </div>
          </div>

          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Author</label>
              <input type="text" class="form-control" placeholder="Author" id="phone" name="author" required data-validation-required-message="Please enter the author's name.">
              <p class="help-block text-danger"></p>
            </div>

            <div class="control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                <label>Date</label>
                <input type="date" class="form-control" placeholder="Date" id="phone" name="postDate" required data-validation-required-message="Please choose the posting date.">
                <p class="help-block text-danger"></p>
              </div>
          </div>
        
          <br><br>
          <div id="success"></div>
          <input type="submit" class="btn btn-primary" id="sendMessageButton" name="addPost" value="Add" >
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
