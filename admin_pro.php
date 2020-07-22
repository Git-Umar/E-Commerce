<?php
include 'connection.php';
session_start();
if(!isset($_SESSION['admin_email']))header("location:login.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@100;400&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
          <style>
                 *
        {
            font-family: 'Roboto Mono', monospace;
        }
         .zoom:hover {
          -ms-transform: scale(1.1);
          -webkit-transform: scale(1.1);
          transform: scale(1.1); 
        }      
      </style>
    <title>Admin Products</title>
  </head>
  <body onload="all_elements();">
     <?php include "Adminheader.php" ;?>
        <div class="container-fluid"  >
            <div class="row justify-content-center" > 
                  <div class="col text-center"> 
                        <h1 style="margin:40px;text-align:center;" > Products</h1>
                  </div>
            </div>
             <div class="row justify-content-between">
                <div class="col-12 col-lg-5" style="padding:2em">
                     <form action="" method="post" enctype="multipart/form-data">
                         <div class="row">
                         <div class="col">
                              <div id="cat_list">
                              </div>
                         </div>
                             <div class=" col text-center" style="margin-top:2em">
                                                 <button class="btn btn-outline-success " name="submit" id="submit" type="button" onclick="pass_value('admin');">Filter By Category</button>
                                            </div>
                         </div>
                        </form>
                </div>
                 <div class="col-12 col-lg-5" style="padding:2em">
                     <form action="" method="post" enctype="multipart/form-data">
                         <div class="row">
                         <div class="col">
                             <div class="form-group"> 
                                 <label for="product">Product Name</label>
                                             <input name="product_val" id="product_val" class="form-control" placeholder="search by name">
                             </div>
                         </div>
                             <div class=" col text-center" style="margin-top:2em">
                                                 <button class="btn btn-outline-success " name="submit" id="submit" type="button" onclick="search_item('admin');">Search</button>
                                            </div>
                                  </div>          
                        </form>
            </div>
            </div>
        <div id="products">
            </div>
        <div id="cnf_del">
            </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
     <script src="http://code.jquery.com/jquery-3.1.1.js"></script>
    <script type="text/javascript" src="functions.js"></script>
  </body>
</html>       
