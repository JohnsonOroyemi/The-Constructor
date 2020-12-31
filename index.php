<?php
session_start();
include("connection.php");
$name = "ConsT Herit";

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
        
        <br>
        
        <!-- Pager -->
        <div class="clearfix">
          <a class="btn btn-primary float-right" href="all_post.php">Older Posts &rarr;</a>
        </div>
      </div>
    </div>
  </div>

  <br>
  <hr>

<script src="asset/lib/jquery/jquery.min.js"></script>
<script src="asset/lib/bootstrap/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="asset/lib/jquery.dcjqaccordion.2.7.js"></script>
<script src="asset/lib/jquery.scrollTo.min.js"></script>
<script src="asset/lib/jquery.nicescroll.js" type="text/javascript"></script>
<script src="asset/lib/jquery.sparkline.js"></script>
<!--common script for all pages-->
<script src="asset/lib/common-scripts.js"></script>
<script type="text/javascript" src="asset/lib/gritter/js/jquery.gritter.js"></script>
<script type="text/javascript" src="asset/lib/gritter-conf.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    var unique_id = $.gritter.add({
      // (string | mandatory) the heading of the notification
      title: 'Welcome to Const Herit!',
      // (string | mandatory) the text inside the notification
      text: 'A Platform developed for Knowledge Management in Construction Industry',
      // (string | optional) the image to display on the left
      image: 'asset/images/IMG-20200121-WA0030.jpg',
      // (bool | optional) if you want it to fade out on its own or just sit there
      sticky: false,
      // (int | optional) the time you want it to be alive for before fading out
      time: 3000,
      // (string | optional) the class name you want to apply to that specific message
      class_name: 'my-sticky-class'
    });

    return false;
  });
</script>
<script type="application/javascript">
  $(document).ready(function() {
    $("#date-popover").popover({
      html: true,
      trigger: "manual"
    });
    $("#date-popover").hide();
    $("#date-popover").click(function(e) {
      $(this).hide();
    });

    $("#my-calendar").zabuto_calendar({
      action: function() {
        return myDateFunction(this.id, false);
      },
      action_nav: function() {
        return myNavFunction(this.id);
      },
      ajax: {
        url: "show_data.php?action=1",
        modal: true
      },
      legend: [{
          type: "text",
          label: "Special event",
          badge: "00"
        },
        {
          type: "block",
          label: "Regular event",
        }
      ]
    });
  });

  function myNavFunction(id) {
    $("#date-popover").hide();
    var nav = $("#" + id).data("navigation");
    var to = $("#" + id).data("to");
    console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
  }
</script>
  <!-- Footer -->
<?php
//inserting footer file
  include("footer.php");
?>
  

  