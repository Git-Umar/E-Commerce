<?php
session_start();
?>
<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
    <?php
        if(isset($_SESSION["name"])){
    ?>
  <a class="navbar-brand" >Hi <?php echo $_SESSION["name"];?></a>
  <?php } else{ ?>
  <a class="navbar-brand" >Welcome</a>
  <?php } ?>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse  justify-content-end" id="navbarSupportedContent" style="">
    <ul class="navbar-nav " >
        <li class="nav-item active" style="" >
        <div class="btn-group">
                     <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       Your Options
                      </button>
                      <div class="dropdown-menu dropdown-menu-right">
                      <a class="nav-link" href="main.php">Home<span class="sr-only">(current)</span></a>
                      <?php
                            if(isset($_SESSION["name"])){
                        ?>
                      <a class="nav-link" href="update_details.php">Profile</a>
                      <?php } ?>
                      <a class="nav-link" href="cart.php">Cart  <img src="cart.png" width="30" height="30" alt="" loading="lazy"><span class="sr-only">(current)</span></a>
                    </div>
            </div>
        </li>
        <li class="nav-item active" style="" >
            
            <?php
                session_start();
                if(!isset($_SESSION['email'])){
            ?>
        <a class="nav-link" href="login.php">Login <span class="sr-only">(current)</span></a>
            <?php
                }
                else {
            ?>
            <a class="nav-link" href="logout.php">Logout  <span class="sr-only">(current)</span></a>
            <?php
                }
            ?>
      </li>
    </ul>
    
  </div>
</nav>