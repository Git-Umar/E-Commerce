<?php
include 'connection.php';
session_start();
if(isset($_GET["cat_show"])){
    $cat_val="SELECT * FROM ecom_category";
                    $cat_result= mysqli_query($conn, $cat_val) or die(mysqli_error($conn));
                    
?>
        <div class="form-group"> 
                <label for="category">Category</label>
            <select name="category" class="form-control" id="category">
                <option value="<?php echo "";?>"><?php echo "Select Category";?></option>
                <?php
                while($num = mysqli_fetch_array($cat_result)){  
                ?>                                   
                <option value="<?php echo $num[0];?>"><?php echo $num[0];?></option>
                <?php
                }
                ?>                                   
            </select>
          </div>
<?php
}
if(isset($_GET["show_pro"])){
                $s_v=trim($_GET["cat_"]," ");
                $acc_type=trim($_GET["acc_type"]," ");
                if($s_v=="all")$list_cat="select * from ecom_category";
                else $list_cat="select * from ecom_category where name='$s_v'";
                $cat_result=mysqli_query($conn,$list_cat);
                while($cat=mysqli_fetch_array($cat_result)){
?>
                
            <div class="row">
                <div class="col" style="padding:0.5em;margin-left:2em">
                    
                    <h3><?php echo $cat["name"];?></h3>
                
                </div>
            
            </div>
            <div class="row" style="margin-top:10px;margin-bottom:30px">
                <?php
                    $search_val=$cat["name"];
                    $get_products="select * from ecom_products where category='$search_val'";
                    $get_products_result=mysqli_query($conn,$get_products);
                        while($pro_item=mysqli_fetch_array($get_products_result)){
                ?>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3" style="margin-top:20px;margin-bottom:20px">
                        <div  style="padding:1em">
                                    <div class="shadow p-3 mb-5 bg-white rounded">
                                 <div style="text-align:center">
                                        <?php
                                        echo'<img src="data:image/jpeg;base64,'.base64_encode($pro_item["pic"]).'" height="200" width="200" class="img-thumnail" />';
                                         ?>
                                        </div>
                                <div class="card-body" style="font-size:.7em">
                                        <h6 class="card-title"><?php echo $pro_item["name"];?></h6>
                                        <p>Rs.<?php echo $pro_item["cost"];?></p>
                                        <p><?php echo $pro_item["description"];?></p>
 <?php if($acc_type=="admin"){ ?> <button class="btn btn-outline-success " name="submit" id="submit" type="button" onclick="remove_pro(<?php echo $pro_item["sno"];?>,'admin')" style="font-size:1em" >Remove product</button> <?php
                                            }
          else if($acc_type=="custom"){ ?> <button class="btn btn-outline-success " name="submit" id="submit" type="button" onclick="add_to_cart(<?php echo $pro_item["sno"];?>)" style="font-size:1em" >Add To Cart</button>
                                        <?php
                                            }
                                        ?>
                                </div>
                        </div>
                       </div>
                </div>     
                   <?php
                        }
                   ?>
                
            </div>
            <?php
                    }
            ?>
<?php
}
if(isset($_GET["search_pro"])){
    $item_name=trim($_GET["item_name"]," ");
    $acc_type=trim($_GET["acc_type"]," ");
?>
    <div class="row" style="margin-top:10px;margin-bottom:30px">
                <?php
                    $get_products_="select * from ecom_products where name  LIKE '%$item_name%'";
                    $get_products_result_=mysqli_query($conn,$get_products_);
                    if(mysqli_num_rows($get_products_result_)>0){
                        while($pro_item=mysqli_fetch_array($get_products_result_)){
                ?>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3" style="margin-top:20px;margin-bottom:20px">
                        <div  style="padding:1em">
                                    <div class="shadow p-3 mb-5 bg-white rounded">
                                 <div style="text-align:center">
                                        <?php
                                        echo'<img src="data:image/jpeg;base64,'.base64_encode($pro_item["pic"]).'" height="200" width="200" class="img-thumnail" />';
                                         ?>
                                        </div>
                                <div class="card-body" style="font-size:.7em">
                                        <h6 class="card-title"><?php echo $pro_item["name"];?></h6>
                                        <p>Rs.<?php echo $pro_item["cost"];?></p>
                                        <p><?php echo $pro_item["description"];?></p>
    <?php if($acc_type=="admin"){ ?> <button class="btn btn-outline-success " name="submit" id="submit" type="button" onclick="remove_pro(<?php echo $pro_item["sno"];?>,'admin')" style="font-size:1em" >Remove product</button> <?php
                                            }
          else if($acc_type=="custom"){ ?> <button class="btn btn-outline-success " name="submit" id="submit" type="button" onclick="add_to_cart(<?php echo $pro_item["sno"];?>)" style="font-size:1em" >Add To Cart</button>
                                        <?php
                                            }
                                        ?>
                                </div>
                        </div>
                       </div>
                </div>     
                   <?php
                        }
                    }else{
                   ?>
                <div class="container">
                  <div class="row mx-auto ">
                        <div class="col  text-center ">
                            <img width="400px" height="300px" class="rounded mx-auto  " src="prono1.png">
                        </div>
                </div>
                <div class="row mx-auto ">
                        <div class="col text-center">
                            <h2>Sorry, product not found..!!</h2>
                        </div> 
                </div>
            </div>
            </div>
<?php } } ?>

<?php
if(isset($_GET["get_cart"])){
    $total=0;
            foreach($_SESSION["cart_elements"] as $item){
                if($item !=""){
                $cart_query="select * from ecom_products where sno='$item'";
                $cart_item_data=mysqli_fetch_array(mysqli_query($conn,$cart_query));
            ?>
          <div class="shadow p-1 mb-5 bg-white rounded mx-auto" style="width:80%">
            <div class="row align-items-center justify-content-around mx-auto" style="margin-top:10px;margin-bottom:30px;">
                <div class="col-12 col-sm-6 col-md-4 col-lg-3" style="margin:.5em;">
                                 <div style="text-align:center" >
                                        <?php
                                        echo'<img src="data:image/jpeg;base64,'.base64_encode($cart_item_data["pic"]).'" height="150" width="150" class="img-thumnail" />';
                                         ?>
                                        </div>
                </div>     
                    <div class="col-12 col-sm-6 col-md-4 col-lg-4" style="margin:.5em;">
                        <div class="row">
                            <div class="col">
                               <h4><?php echo $cart_item_data["name"];?></h4>
                            </div>
                        </div>
                        <div class="row">
                             <div class="col" style="font-size:.8em">
                                  <p>Rs.<?php echo $cart_item_data["cost"]; $total +=$cart_item_data["cost"];?></p>
                            </div>
                            </div>
                          <div class="row">
                             <div class="col" style="font-size:.7em">
                                  <p><?php echo $cart_item_data["description"];?></p>
                            </div>
                            </div>
                </div>   
                 <div class="col-12 col-sm-6 col-md-4 col-lg-3" style="margin:.5em; text-align:center">
                     <button class="btn btn-outline-success " name="submit" id="submit" type="button" onclick="remove_element_from_cart(<?php echo $cart_item_data["sno"];?>);" style="font-size:1em" >Remove product</button>
                </div>
            </div>
            </div>
            <?php
            }
}
if($total !=0 && isset($_SESSION["address"])){
?>
            <div class="shadow p-1 mb-5 bg-white rounded mx-auto" style="width:80%">
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
                      Rs.<?php echo $total; ?>
                     </dl>
                </div>
                   <div class="col-12">
                       <form action="check.php" method="post">
                        <button class="btn btn-outline-success " name="checkout" id="checkout" type="submit" style="font-size:1em" >Check out</button>
                        <input type="hidden" name="total" id="total" value="<?php echo $total;?>"/>
                        </form>
                </div>
                </div>
                </div>
                </div>
            </div>
<?php
}
else if($total==0){
?>   
<div class="container">
                  <div class="row mx-auto ">
                        <div class="col  text-center ">
                            <img width="400px" height="300px" class="rounded mx-auto  " src="prono1.png">
                        </div>
                </div>
                <div class="row mx-auto ">
                        <div class="col text-center">
                            <h2>Sorry, Cart Is Empty..!!</h2>
                        </div> 
                </div>
            </div>
<?php   
}
if($total !=0 && !isset($_SESSION["address"])){
?>
<form action="login.php" method="post">
   <center>Please <button class="btn btn-outline-success " name="checkout" id="checkout" type="submit" style="font-size:1em" >Login!</button> To Continue.</center>
</form>
  <?php  
}
}
            ?>