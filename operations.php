<?php
session_start();
include 'connection.php';
    if(isset($_POST["reg"])){
        $name=trim($_POST["name"]," ");
        $email=trim($_POST["email"]," ");
        $phone=trim($_POST["phone"]," ");
        $pass=md5(trim($_POST["pass"]," "));
        $address=trim($_POST["address"]," ");
        $insert_val="insert into ecom_users values('$name','$email','$phone','$address','$pass','customer')";
        mysqli_query($conn,"INSERT INTO ecom_cart (email, items) VALUES ('$email', '')");
        if(mysqli_query($conn,$insert_val)){
            $_SESSION["suc"]="YOUR ACCOUNT HAS BEEN CREATED YOU CAN LOGIN!";
            echo "inserted";
        }
        else echo "error";
    }
    if(isset($_POST["login"])){
        $login_email=trim($_POST["email"]," ");
        $login_pass=md5(trim($_POST["pass"]," "));
        $select_query="select * from ecom_users where email='$login_email' and pass='$login_pass'";
        if(mysqli_num_rows(mysqli_query($conn,$select_query))>0){
            $data=mysqli_fetch_array(mysqli_query($conn,$select_query));
            if($data["type"] == "admin"){
                $_SESSION['admin_email'] =$login_email;
                $_SESSION['name'] = $data["name"];
                echo"admin";
            }
            else{
                $cart_items=mysqli_fetch_array(mysqli_query($conn,"select items from ecom_cart where email='$login_email'"))[0];
                $cart_array=explode(":",$cart_items);
                if(empty($_SESSION["cart_elements"])) $_SESSION["cart_elements"]=array();
                foreach($cart_array as $cav)array_push($_SESSION["cart_elements"],$cav);
                $a=$_SESSION["cart_elements"];
                unset($_SESSION["cart_elements"]);
                $_SESSION["cart_elements"] = array_unique($a);    
                $_SESSION['email'] = $login_email;
                $_SESSION['name'] = $data["name"];
                $_SESSION['address'] = $data["address"];
                echo"custom";
            }
        }
        else echo "error";
    }
    if(isset($_POST["check_email"])){
        $c_email=trim($_POST["email"]," ");
        $select_email="select email from ecom_users where email='$c_email'";
        if(mysqli_num_rows(mysqli_query($conn,$select_email))>0){
            echo "exist";
        }
    }
    if(isset($_POST["cat"])){
     $cat_name=trim($_POST["cat_name"]," ");   
     $insert_cat="insert into ecom_category values('$cat_name')";
     if(mysqli_query($conn,$insert_cat)) echo "inserted";
     else echo "error";
    }
    if(isset($_POST["cat_remove"])){
        $cat_del_name=trim($_POST["cat_rmv"]," ");   
        $del_cat="delete from ecom_category where name='$cat_del_name'";
        if(mysqli_query($conn,$del_cat))echo "deleted";
        else echo "error";
    }
    if(isset($_POST["pro_up"])){
        $pro_name = trim($_POST["pro_name"]," ");
        $pro_cat = trim($_POST["pro_cat"]," ");
        $pro_price = trim($_POST["pro_price"]," ");
        $pro_description = trim($_POST["pro_description"]," ");
        $pro_pic = addslashes(file_get_contents($_FILES["new_pic"]["tmp_name"]));
        $insert_pro="insert into ecom_products(name,pic,category,description,cost) values('$pro_name','$pro_pic','$pro_cat','$pro_description','$pro_price')";
        if(mysqli_query($conn,$insert_pro))echo "pro_inserted";
        else "error";
    }
    if(isset($_POST["del_pro_val"])){
        $del_val=trim($_POST["del_val"]," ");
        $del_pro_query="delete from ecom_products where sno='$del_val'";
        if(mysqli_query($conn,$del_pro_query))echo "value_deleted";
        else echo "error";
    }
    if(isset($_POST["cart_pro"])){
        $cart_item=trim($_POST["cart_item"]," ");
        if(empty($_SESSION["cart_elements"])) $_SESSION["cart_elements"]=array();
        array_push($_SESSION["cart_elements"],$cart_item);
        $_SESSION["cart_elements"]=array_unique($_SESSION["cart_elements"]);
    }
    if(isset($_POST["del_cart_val"])){
        $val_remove=trim($_POST["remove_cart_item"]," ");
        $str="";
        foreach($_SESSION["cart_elements"] as $rm_val){
            if($rm_val != $val_remove)$str=$str." ".$rm_val;
        }
        unset($_SESSION["cart_elements"]);
        $_SESSION["cart_elements"]=explode(" ",trim($str," "));
    }
    if(isset($_SESSION['email'])){
    $str="";
    $update_email=$_SESSION['email'];
    foreach($_SESSION["cart_elements"] as $item)$str = $str.":".$item;
    $str=substr($str,1);
    mysqli_query($conn,"UPDATE ecom_cart SET items='$str' WHERE email='$update_email'");
    }
?>