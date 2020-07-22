<?php
session_start();
include "connection.php";
if(!isset($_SESSION["name"]))header("location:login.php");
$email=$_SESSION["email"];
$query="select * from ecom_users where email='$email'";
$values=mysqli_fetch_array(mysqli_query($conn,$query));
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
    <title>Update Details</title>
  </head>
  <body>
      <?php include"header.php";?>
    <div class="container">
        <div class="row" style="margin-top:10px;margin-bottom:30px">
                <h3>Update my details</h3>
         <div class="col-md-6" style="margin-top:40px;margin-bottom:20px">
                             <div class="shadow p-3 mb-5 bg-white rounded">
                           
                    <input type="hidden" value="register" name="mode" >
                        <div class="form-group">
                            <label class="control-label" for="uname"><span class="required"></span>Your name: </label>
                            <div class="">
                                <input  type="text" class="form-control" name="uname" id="uname" autocomplete="off" placeholder="Your name" maxlength="100" value="<?php echo $values[0];?>">
                            </div>
                        </div>
                      
                      
                        
                        <div class="form-group">
                            <label class=" control-label" for="uphone"><span class="required"></span>Mobile: </label>
                            <div class="">
                                <input  type="number" class="form-control" name="uphone" id="uphone" autocomplete="off" placeholder="Mobile Number" maxlength="10" value="<?php echo $values[2];?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label" for="uemail"><span class="required"></span>Email Address: </label>
                            <div class="">
                                <input  type="email" class="form-control" name="uemail"  id="uemail"autocomplete="off" placeholder="Email Address" maxlength="100" value="<?php echo $values[1];?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label" for="address"><span class="required"></span>Address: </label>
                            <div class="">
                                <textarea class="form-control" name="address" id="address" autocomplete="off" placeholder="Address" ><?php echo $values[3];?></textarea>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class=" control-label" for="pass"><span class="required">*</span> Current Password:</label>
                            <div class="">
                                <input  type="password" class="form-control" name="ppass" id="ppass" autocomplete="off" placeholder="Current Password" maxlength="100" >
                            </div>
                        </div>
                           <div class="form-group">
                            <label class=" control-label" for="pass"><span class="required"></span> New Password:</label>
                            <div class="">
                                <input  type="password" class="form-control" name="pass" id="pass" autocomplete="off" placeholder="New Password" maxlength="100" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="cpass"><span class="required"></span>Confirm Password: </label>
                            <div class="">
                                <input  type="password" class="form-control" name="cpass" id="cpass" autocomplete="off" placeholder="Confirm Password" maxlength="100" >
                            </div>
                        </div>
                    
                        <div class="form-group">
                            <div class="">
                              <center>  <button class="btn btn-outline-success" onclick="auth_update();" >Submit </button></center>
                            </div>
                        </div>
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