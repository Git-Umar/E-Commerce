<?php
include 'connection.php';
if(isset($_GET["id"])){
    $id=$_GET["id"];
    $query="select * from ecom_products where sno='$id'";
    $pro_item=mysqli_fetch_array(mysqli_query($conn,$query));
}
else header("location:main.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
            *
        {
            font-family: 'Roboto Mono', monospace;
        }
    </style>
    <title>Product</title>
  </head>
  <body>
      <?php include "header.php";?>
      <div class="container-fluid" style="margin-top:4rem"  >
            <center><h2>Product Details</h2></center><br>
            <div class="row">
                <div class="col-sm-4">
                    <?php
                        echo'<img src="data:image/jpeg;base64,'.base64_encode($pro_item["pic"]).'" height="400" width="300" class="img-thumnail" />';
                     ?>
                </div>
                <div class="col-sm-7">
                <div class="card-body" style="font-size:.9em">
                    <h4 class="card-title"><?php echo $pro_item["name"];?></h4>
                    <p>Rs.<?php echo $pro_item["cost"];?></p>
                    <p>Ensure your efficiency levels are on point with the Lenovo 39.6 cm (15.6 inch) S145 Laptop which blends together 
                    functionality with style packing in a sleek look with efficient performance. The Windows 10 operating system and powerful
                    Processor helps you perform your regular activities along with fun games. It has powerful storage capacity and efficient 
                    RAM which lets you store a huge amount of important data and enjoy lag-free operation respectively. 
                    The 15.6-inch FHD display allows you to enjoy watching videos and playing games a more enjoyable experience. 
                    It has 256 GB plus 1 TB storage to make it all the more efficient and productive which lets you store your important official data and 
                    videos, songs and photos for your leisure while you are on the go. It has Dual speakers.</p>
                </div>
                </div>
            </div>
            <div class="row">
            <div class="col-md-4">
                <button class="btn btn-outline-success " name="submit" id="submit" type="button" onclick="add_to_cart(<?php echo $pro_item["sno"];?>)" style="font-size:1em" >Add To Cart</button>
            </div>
            </div>
        <div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-3.1.1.js"></script>
    <script type="text/javascript" src="functions.js"></script>
  </body>
</html>