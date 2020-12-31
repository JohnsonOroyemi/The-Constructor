
<div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="add_post.php">Add New Post</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="view_post.php">View Post</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
        </li>
        <li class="nav-item">
            <?php
            
            if(isset($_SESSION["user_id"]))
            {?>
                <a class="nav-link" href="logout.php">Log out</a>
            <?php
            }
            else{
            ?>
                <a class="nav-link" href="signin.php">Sign in</a>
                <?php
                }

            ?>

        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa fa-fw fa-search"></i></a>
        </li>
    </ul>
</div>