   var email_exist=false;
   var pass_match=true;
   var del_="";
   function del_element(){
       remove_pro(del_,'admin');
       del_="";
       hide_div('cnf_del');
       show_div('products');
   }
   function show_div(id_val){
       hide_div("cnf_del");
       var con="#"+id_val;
       $(con).show();
   }
   function redirect_to_product(pro_s_val){
       var dataString="id=id &pro_id="+pro_s_val;
        $.ajax({
              url:'product.php',
              type:'POST',
              data:dataString,
        });
        window.location.href="product.php";
   }
   function hide_div(id_val){
       var con="#"+id_val;
       $(con).hide();
   }
   function if_ok(){
       if(!email_exist && pass_match)
            post_values();
   }
   function forgot_pass(){
       $('#login_form').hide();
       $('#forgot_pass').show();
       
   }
   function reset_pass(){
        var email=document.getElementById("email").value;
        if(isEmpty(email))alert("Email Required");
        else{
        var dataString="send=send &email="+email;
        $.ajax({
              url:'operations.php',
              type:'POST',
              data:dataString,
              success:function(data_c){
                  if(data_c !="mail_sent")$('#err_').html(' <div class="alert alert-danger text-center" role="alert"> '+data_c+'</div>');
                  else window.location.href="login.php";
              } 
            
        });
        }
   }
   function post_values(){
        var name=document.getElementById("name").value;
        var email=document.getElementById("email_id").value;
        var phone=document.getElementById("mob").value;
        var pass=document.getElementById("pass").value;
        var c_pass=document.getElementById("c_pass").value;
        var address=document.getElementById("address").value;
        if(!isEmpty(name) && !isEmpty(email) && !isEmpty(phone) && !isEmpty(pass) && !isEmpty(address)){
        var dataString="reg=reg &name="+name+" &email="+email+" &phone="+phone+" &pass="+pass+" &address="+address;
         var err=' <div class="alert alert-danger text-center" role="alert"> ERROR IN SUBMITION </div>';
        $.ajax({
             url:'operations.php',
              type:'POST',
              data:dataString,
              success:function(data_c){
                  if(data_c == "inserted")location.href = "index.php";
                  else $('#err').html(err);
        }
        });
    }
    else err_msg("Please Fill All The Details");
    }
    
    
    function loading_anim(){
        var dataString="loading=loading";
            $.ajax({
                url:'elements.php',
                type:'GET',
                data:dataString,
                success:function(data_c){
                    $('#products').html(data_c);
                  }
            });
    }
    
    function custom_elements(){
            loading_anim();
            load_cat();
            put_products("all","custom");
    }
    function all_elements(){
            loading_anim();
            load_cat();
            put_products("all","admin");
        }
        function remove_pro(val,acc_type){
            var dataString="del_pro_val=del_pro_val &del_val="+val;
            $.ajax({
                url:'operations.php',
                  type:'POST',
                  data:dataString,
                  success:function(data_c){
                    pass_value(acc_type);
                  }
            });
        }
        function put_products(cat_options,acc_type){
            var cat_="all";
            if(!isEmpty(cat_options))cat_=cat_options;
            var dataString="show_pro=show_pro &cat_="+cat_+" &acc_type="+acc_type;
            $.ajax({
                url:'elements.php',
                  type:'GET',
                  data:dataString,
                  success:function(data_c){
                    $('#products').html(data_c);
                  }
            });
        }
        function ask_conformation(del_conf){
            del_ = del_conf;
            hide_div("products");
            show_div("cnf_del");
            var dataString="conformation=conformation";
            $.ajax({
                url:'elements.php',
                  type:'GET',
                  data:dataString,
                  success:function(data_c){
                        $('#cnf_del').html(data_c);
                  }
            });
        }
        function pass_value(acc_type) {
            loading_anim();
            var element_val=document.getElementById("category").value;
            put_products(element_val,acc_type);
        }
        function search_item(acc_type){
            loading_anim();
            var search_item_value=document.getElementById("product_val").value;
            var dataString="search_pro=search_pro &item_name="+search_item_value+" &acc_type="+acc_type;
            if(!isEmpty(search_item_value)){
                $.ajax({
                url:'elements.php',
                  type:'GET',
                  data:dataString,
                  success:function(data_c){
                    $('#products').html(data_c);
                  }
            });
            }
            else put_products("all",acc_type);
        }
        function deduct(id_val,amount){
            var qunant_value=parseInt(document.getElementById(id_val).value);
            if(qunant_value !=1 && qunant_value >1){
                    amount=parseInt(amount);
                    var total_amount=document.getElementById("total_hf").value;
                    qunant_value -=1;
                    var total=total_amount-amount;
                    document.getElementById(id_val).value=qunant_value;
                    document.getElementById("total_hf").value=total;
                    document.getElementById("total").value=total;
                    $('#total_pro_amount').html("Rs."+total);
            }
        }
        function increment(id_val,amount){
            var qunant_value=parseInt(document.getElementById(id_val).value);
            amount=parseInt(amount);
            var present_amount=qunant_value*amount;
            var total_amount=document.getElementById("total_hf").value;
            var cal_inc=total_amount-present_amount;
            qunant_value +=1;
            var total=cal_inc+(qunant_value*amount);
            document.getElementById(id_val).value=qunant_value;
            document.getElementById("total_hf").value=total;
            document.getElementById("total").value=total;
            $('#total_pro_amount').html("Rs."+total);
        }
        function add_to_cart(cart_item){
            var dataString="cart_pro=cart_pro &cart_item="+cart_item;
            $.ajax({
                url:'operations.php',
                  type:'POST',
                  data:dataString,
                  success:function(data_c){
                    alert("Item Added To Cart");
                  }
            });
        }
        function load_cart(){
            loading_anim();
            var dataString='get_cart=get_cart';
            $.ajax({
                url:'elements.php',
                  type:'GET',
                  data:dataString,
                  success:function(data_c){
                    $('#cart').html(data_c);
                  }
            });
        }
        function remove_element_from_cart(remove_cart_item){
             var dataString="del_cart_val=del_cart_val &remove_cart_item="+remove_cart_item;
            $.ajax({
                url:'operations.php',
                  type:'POST',
                  data:dataString,
                  success:function(data_c){
                    load_cart();
                  }
            });
        }
        
        function auth(){
           var email=document.getElementById("id").value;
           var pass=document.getElementById("pass").value;
           var dataString="login=login &email="+email+" &pass="+pass;
           var error='<div class="alert alert-danger text-center" role="alert"> ERROR INVALID ID/PASSWORD </div>';
        $.ajax({
             url:'operations.php',
              type:'POST',
              data:dataString,
              success:function(data_c){
                  if(data_c == "error"){
                      $('#err').html(error);
                  }
                  else if(data_c == "admin"){
                      window.location.href="admin_pro.php";
                  }
                  else if(data_c == "custom"){
                      window.location.href="main.php";
                  }
        }
        });
       }
       
    function email_check(){
        var email=document.getElementById("email_id").value;
        var dataString="check_email=check &email="+email;
        var err=' <div class="alert alert-danger text-center" role="alert"> EMAIL ALREADY EXIST </div>';
        $.ajax({
             url:'operations.php',
              type:'POST',
              data:dataString,
              success:function(data_c){
                  if(data_c == "exist"){
                       $('#email_error').html("Email Already Exist!");
                       email_exist=true;
                  }
                  else{
                      $('#email_error').html('');
                      email_exist=false;
                  }
        }
        })   
    }
    function pass_check(){
        var pass=document.getElementById("pass").value;
        var c_pass=document.getElementById("c_pass").value;
        var err=' <div class="alert alert-danger text-center" role="alert"> PASS AND CPASS DOES NOT MATCH </div>';
        if(pass != c_pass){
               pass_match = false;
                $('#pass_error').html("Password & Conform Password Does Not Match!")
        }
        else{
                pass_match = true;
                $('#pass_error').html('')
        }
    }
        function check_and_add(){
            var cat_name = document.getElementById("cat").value;   
            var dataString="cat=cat &cat_name="+cat_name;
            var err='<div class="alert alert-danger text-center" role="alert"> Category Already Exist </div>';
            $.ajax({
                  url:'operations.php',
                  type:'POST',
                  data:dataString,
                  success:function(data_c){
                     if(data_c=="inserted"){
                         document.getElementById("cat").value="";   
                         $('#err').html('')
                         load_cat();
                     }
                     else $('#err').html(err)
                  }
            });
        }
        function load_cat(){
            var dataString='cat_show=cat_show';
             $.ajax({
                  url:'elements.php',
                  type:'GET',
                  data:dataString,
                  success:function(data_c){
                      $('#cat_list').html(data_c)
                  }
            });
        }
        function del_cat(){
            var cat_rmv = document.getElementById("category").value;
            var dataString='cat_remove=cat_remove &cat_rmv='+cat_rmv;
             $.ajax({
                  url:'operations.php',
                  type:'POST',
                  data:dataString,
                  success:function(data_c){
                      if(data_c == "deleted")load_cat();
                      else alert("error");
                  }
            });
        }
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
                            document.getElementById("new_pic").value="";
                            $('#btns').html(upload_button)
                        }
                      }
                    });
            }
            else err_msg("Empty Filed Found");
        }
        function auth_update(){
        var ok=true;
        var name=document.getElementById("uname").value;
        var mobile=document.getElementById("uphone").value;
        var email=document.getElementById("uemail").value;
        var address=document.getElementById("address").value;
        var cpass=document.getElementById("ppass").value;
        var npass=document.getElementById("pass").value;
        var cnf_pass=document.getElementById("cpass").value;
            if(isEmpty(name) || isEmpty(mobile)|| isEmpty(email)|| isEmpty(address)){
                ok=false;
                alert("Please Fill The Requiered Fields");
            }
            else if(isEmpty(cpass)){
                alert("Current Password Can Not Be Empty");
                ok=false;
            }
            else if(!isEmpty(npass) && isEmpty(cnf_pass)){
                ok=false;
                alert("Please Conform Your Password");
            }
            else if(isEmpty(npass) && !isEmpty(cnf_pass)){
                ok=false;
                alert("Please Enter Your New Password");
            }
            else if(!isEmpty(npass) && !isEmpty(cnf_pass) && cnf_pass != npass){
                ok=false;
                alert("Conform Password And New Password Does Not Match");
            }
            if(ok){
                var dataString="update_profile=update_profile &uname="+name+" &uphone="+mobile+" &uemail="+email+" &uaddress="+address+" &upass="+cpass+" &unpass="+npass;
                $.ajax({
                  url:'operations.php',
                  type:'POST',
                  data:dataString,
                  success:function(data_c){
                      if(data_c == "pass_missmatch")alert("Current Password Error");
                      else if(data_c == "updated"){alert("Updated! Please Login Again");
                          window.location.href='logout.php';
                      }
                    
                  } 
            });
            }
    }
        