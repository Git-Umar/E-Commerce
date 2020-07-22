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


    <title>Add Products</title>
  </head>
  <body onload="load_cat();">
     <?php include "Adminheader.php" ;?>
        <div class="container"  >
         
            <div class="row justify-content-center" > 

                  <div class="col text-center"> 

                        <h3 style="margin:40px;text-align:center;" >Add Products</h3>
                            <pre id="err"></pre>
                  </div>

            </div>
        
  
            <div class="row justify-content-center">
           
                <div class="col-12 col-md-6 justify-content-center" >
                    <div class="shadow p-3 mb-5 bg-white rounded">
                        <form >
                                            <div class="form-group"> 
                                               <div id="cat_list">
                                                </div>
                                          </div>
                                          <div class="form-group"> 
                                            <label for="product_name">Product Name</label>
                                            <input type="text" class="form-control" id="product_name" name="product_name" >

                                          </div>
                                        <div class="form-group"> 
                                            <label for="product_pic">Product Picture</label>
                                            <input type="file" class="form-control" id="new_pic" name="new_pic" >

                                          </div>
                                          <div class="form-group">
                                            <label for="price">Price</label>
                                            <input type="number" class="form-control" id="price" name="price">
                                          </div>
                                            <div class="form-group">
                                            <label for="desc">Description</label>
                                            <textarea name="desc" id="desc" class="form-control">
                                            </textarea>
                                            </div>
                                        <div class="text-center">
                                            <div id="btns"> 
                                                <button class="btn btn-outline-success " name="submit" id="submit" type="button" onclick="upload_product();">Add product</button>
                                            </div>
                                            
                                        </div>
                                       
                            
 
                        </form>
                    </div>
                </div>         
            </div>
      </div>
   
    <script>
    function isEmpty(str) {
        return (!str || 0 === str.length||str ==" ");
    }
    function err_msg(err_){
        var msg=' <div class="alert alert-danger text-center" role="alert"> '+err_+'</div>';
        if(!isEmpty(err_))$('#err').html(msg)
        else $('#err').html('')
    }
        function upload_product(){
            var upload_button='<button class="btn btn-outline-success " name="submit" id="submit" type="button" onclick="upload_product();">Add product</button>';
            var loading_button=' <button class="btn btn-outline-success" type="button" disabled> <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> Loading...</button>';
            var pro_name = document.getElementById("product_name").value;
            var pro_cat = document.getElementById("category").value;
            var pro_price = document.getElementById("price").value;
            var pro_description = document.getElementById("desc").value;
            var pro_img = document.getElementById("new_pic").value;
            if(!isEmpty(pro_name) && !isEmpty(pro_cat) && !isEmpty(pro_price) && !isEmpty(pro_description) && !isEmpty(pro_img)){
                err_msg("");
                $('#btns').html(loading_button)
                var data=new FormData();
                    $.each($('#new_pic')[0].files,function(i, file){
                        data.append('new_pic', file);
                        data.append('pro_name', pro_name);
                        data.append('pro_cat', pro_cat);
                        data.append('pro_up', "upload");
                        data.append('pro_price', pro_price);
                        data.append('pro_description', pro_description);
                    });
                $.ajax({
                    type: 'post',
                    url: 'operations.php',
                    enctype: 'multipart/form-data',
                    processData: false,
                    data: data,
                    contentType: false,
                    success: function(data_c) {
                        if(data_c=="pro_inserted"){
                            alert(data_c);
                            document.getElementById("product_name").value="";
                            document.getElementById("category").value="";
                            document.getElementById("price").value="";
                            document.getElementById("desc").value="";
                            document.getElementById("new_pic").value;
                            $('#btns').html(upload_button)
                        }
                      }
                    });
            }
            else err_msg("Empty Filed Found");
        }
    </script>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
     <script src="http://code.jquery.com/jquery-3.1.1.js"></script>
    <script type="text/javascript" src="functions.js"></script>
  </body>
</html>       
