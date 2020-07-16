<?php
session_start();
if(isset($_SESSION["admin_email"]))header("location:admin_pro.php");
if(isset($_SESSION["email"]))header("location:main.php");
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
             color: gray;
             
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

        a:hover {
          text-decoration: underline;
            color: black;
        }

        a:active {
          text-decoration: underline;
        }
    </style> 
     

    <title>Login</title>
  </head>
  <body>
     <?php include "header.php" ;
        session_start();
     ?>
        <div class="container" style="margin-top:4rem"  >
         
            <div class="row justify-content-center" > 

                  <div class="col text-center"> 
                  <h3 style="margin:40px;text-align:center;" >Login</h3>
                        <pre id="err">
                                <?php
                                  if(isset($_SESSION["suc"])){
                                  ?>
                                  <div class="alert alert-success" role="alert">
                                       <center> <?php echo $_SESSION["suc"]; unset($_SESSION["suc"]); ?></center>
                                </div>
                                <?php } ?>
                        </pre>
                  </div>

            </div>
        
  
            <div class="row justify-content-center">
           
                <div class=" col-12 col-md-6 justify-content-center" >
                    <div class="shadow p-3 mb-5 bg-white rounded">
                        <form >
                                          <div class="form-group"> 
                                            <label for="id">Email Id</label>
                                            <input type="email" class="form-control" id="id" name="id" >

                                          </div>
                                          <div class="form-group">
                                            <label for="pass">Password</label>
                                            <input type="password" class="form-control" id="pass" name="pass">
                                          </div>
                                        <div class="text-center">
                                             <button class="btn btn-outline-success " name="submit" id="submit" type="button" onclick="auth();">Log On</button>
                                              <a href="register.php"><p>Create an Account !</p></a>
                                        </div>
                                       
                            
 
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
