<?php
session_start();
?>

<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
    <?php
        if(isset($_SESSION["name"])){
    ?>
  <a class="navbar-brand" href="#">Hi <?php echo $_SESSION["name"];?></a>
  <?php } else{ ?>
  <a class="navbar-brand" href="#">Welcome</a>
  <?php } ?>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse  justify-content-end" id="navbarSupportedContent" style="">
    <ul class="navbar-nav " >
      <li class="nav-item active" style="" >
        <a class="nav-link" href="main.php">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active" style="" >
        <a class="nav-link" href="cart.php">Cart  <img src="cart.png" width="30" height="30" alt="" loading="lazy"><span class="sr-only">(current)</span></a>
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