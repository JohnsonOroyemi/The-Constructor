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

    <!-- The form -->
  <form action="process.php" method="post" class="login-box"> 
  <h2>Sign Up</h2>
      <div class="textbox"> <i class="fa fa-fw fa-user"></i> <input type="text" placeholder="First Name" name="firstname" required></div>
      <div class="textbox"> <i class="fa fa-fw fa-user"></i> <input type="text" placeholder="Last Name" name="lastname" required></div>
      <div class="textbox"> <i class="fa fa-fw fa-lock"></i> <input type="text" placeholder="Email" name="email" required></div>
      <div class="textbox"> <i class="fa fa-fw fa-lock"></i> <input type="text" placeholder="Password" name="password" required></div>
      <input  class="btn" type="submit" name="create_user" value="Create User"> <br> <br>
      <div class="newuser">Already a user? <a href="signin.php" class="newuser" >Login</a> </div> 
    </form>

  <style>

body{
margin: 0;
padding: 0;
font-family: sans-serif;
background:url('asset/images/large-home-389271_1280.jpg') no-repeat;
background-size: cover;
}

.login-box {
width: 280px;
position: absolute;
top: 50%;
left: 50%;
transform: translate(-50%, -50%);
color: white;
border-radius: 10px;
background-color: #58595b;
padding: 25px;
}

.login-box h2{
float: left;
font-size: 15px;
border-bottom: 6px solid #3989C9;
margin-bottom: 50px;
padding: 13px 0;
}

.textbox {
width: 100%;
overflow: hidden;
font-size: 15px;
padding: 8px 0;
margin: 8px 0;
border-bottom: 1px solid #3989c9;
margin-bottom: 15px;
}

.textbox i{
width: 26px;
float: left;
text-align: center;
color: white;
}

.textbox input{
border: none;
outline: none;
background: none;
color: white;
font-size: 12px;
width: 80%;
float: left;
margin: 0 10px;

}

.btn{
width: 100%;
background: none;
border: 2px solid #3989C9;
color: white;
font-size: 18px;
cursor: pointer;
margin: 12px 0;
}

.newuser {
text-align: center;
text-decoration: none;
color: white;
font-size: 15px;
width: 100%;
}

.forgotpassword {
text-align: center;
text-decoration: none;
color: white;
font-size: 18px;
width: 100%;
padding-bottom: 25px;
}

  </style>
</body>
</body>
</html>