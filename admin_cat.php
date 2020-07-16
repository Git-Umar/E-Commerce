<?php
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

      </style>


    <title>Add Category</title>
  </head>
  <body onload="load_cat();">
     <?php include "Adminheader.php";
     ?>
        <div class="container"  >
         
            <div class="row justify-content-center" > 

                  <div class="col text-center"> 

                        <h3 style="margin:40px;text-align:center;" >Add and Remove Category</h3>
                            <pre id="err"></pre> 
                  </div>

            </div>
        
  
            <div class="row justify-content-center">
           
                <div class="col-12 col-md-6 justify-content-center" style="padding:1em;" >
                    <div class="shadow p-3 mb-5 bg-white rounded">
                        <form>
                            <fieldset class="form-group">
                                <legend>Add Category</legend>
                                <div class="row">
                                
                               
                                        <div class="col"> 
                                                    <label for="cat">Category</label>
                                                    <input type="text" class="form-control" id="cat" name="cat" >

                                         </div>
                                         <div class=" col text-center" style="margin-top:2em" >
                                                     <button class="btn btn-outline-success " name="add_cat" id="add_cat" type="button" onclick="check_and_add();">Add </button>

                                         </div>
                                </div>
                            </fieldset>
                             <fieldset class="form-group" style="margin-top:2em">
                                <legend>Remove Category</legend>
                                 <div class="row">
                                 <div class="col">
                                        <div id="cat_list">
                                        </div>
                                     </div>
                                        <div class=" col text-center" style="margin-top:2em">
                                             <button class="btn btn-outline-success " name="submit" id="submit" type="button" onclick="del_cat();">Remove </button>
                                             
                                 </div>
                                 </div>
                            </fieldset>
                                          
                        </form>
                    </div>
                </div>         
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
