<?php
include 'connection.php';
session_start();
if(!isset($_POST["checkout"]))header("location:main.php");
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
            a
         {
             color: black;
             
         }
         p
         {
             padding: 1em;
         }
      a:link {
          text-decoration: none;
        }

        a:visited {
          text-decoration: none;
        }

        div > a:hover {
         
            
            background-color:black;
            color:white;
        }

        a:active {
          text-decoration: underline;
        }
      </style>

      


    <title>Check Out</title>
  </head>
  <body>
     <?php include "header.php" ;?>
        <div class="container-fluid  "  style="margin-top:4rem;" >
            <div class="row justify-content-center" > 

                  <div class="col text-center"> 

                        <h1 style="margin:40px;text-align:center;" >Check Out</h1>
                  </div>
            </div>
             <div class="shadow p-1 mb-5 bg-white rounded mx-auto" style="width:80%">
            <div class="row mx-auto  text-center p-2" style="">
                <div class="col ">
                    <h5><b>Items List</b></h5>
                    <div class="row   justify-content-center ">
                      <div class="col text-left p-1">
                         <ol>
                             <?php
                                foreach($_SESSION["cart_elements"] as $items){
                                    if($items != ""){
                                    $db_val=mysqli_fetch_array(mysqli_query($conn,"select name,cost from ecom_products where sno='$items'"));
                             ?>
                          <li>
                             <b><?php echo $db_val["name"];?></b> <span>Rs.<?php echo $db_val["cost"];?></span>
                           </li>
                           <?php
                                }
                                }
                           ?>
                          </ol>
                        </div>
                    </div>
                      <div class="row   justify-content-center ">
                    </div>
                    <div class="row   justify-content-center ">
                    </div>
                </div>
            </div>
                <div class="row align-items-center mx-auto p-4 " >
                    <div class="col-12 col-md-6" >
                     <address>
                         <dt>
                         Shipping Address
                         </dt>
                         <dl>
                              <?php echo $_SESSION["address"];?>
                         </dl>
                     </address>
                    </div>
                    <div class="col-12 col-md-6 ">
                    <div class="row text-right">
                         <div class="col-12  ">
                         <dt>
                          Total
                         </dt>
                         <dl>
                          Rs.<?php echo $_POST["total"];?>
                         </dl>
                    </div>                      
                    </div>
                    </div>    
                </div>
            </div>
            <div class="row mx-auto text-center rounded"   >
                <div class="col-12 col-md-6 p-1 mx-auto" style="font-size:1em;background-color:green;color:white" >
                    <p>Successfully Shipped .Thank you for Shopping..!!</p>
                </div>
            </div>
             <div class="row mx-auto text-center mt-4 "  style="" >
                <div class="col col-md-4 p-4 mx-auto" >
                    <a href="main.php"  style="font-size:1em;border-radius:2em;border:1px solid black;padding:1em">Shop again..!</a>
                </div>           
            </div>
        </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>       
