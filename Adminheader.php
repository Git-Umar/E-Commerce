<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Dashboard</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="admin_pro.php">Products <span class="sr-only">(current)</span></a>
      </li>
        <li class="nav-item active">
        <a class="nav-link" href="admin_cat.php">Add Category </a>
      </li>
        <li class="nav-item active">
        <a class="nav-link" href="admin_add_products.php">Add Products </a>
      </li>
        <li class="nav-item active" style="" >
            <?php
                session_start();
                if(!isset($_SESSION['admin_email'])){
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