# E-Commerce
This application is live on sumshodhini.com.
This sample application contains two operations
*1)Admin Dashboard.
*2)Customer pages.
Admin Dashboard contains three operations
  *1)Products.
  *2)Add Categories.
  *3)Add Products.
Customer Page contains two options
  *1)Products.
  *2)Cart.
Pages Used: main.php,admin_add_products.php,admin_cat.php,admin_pro.php,Adminheader.php,cart.php,check.php,connection.php,elements.php,functions.js,header.php,index.php,login.php,logout.php,main.php,operations.php,register.php
About pages:
    *1) index.php: Application execution starts from index page,i have redirected index page to main.php.
    *2) main.php: It is the first page shown to the user when ever the site is visited and it contains product list and has a option "ADD TO CART" from which user can add the             products into the cart all the items that appears on. all the pictures that appears on main page are fetched from data base so that there i a bit safty to our data.
    *3) cart.php: cart page contains all the products that the user wishes to buy. and below we have a option to check out,"CHECK OUT" option is visible when the user is logged in.
      login.php: login page is common for admin and customer if the admin enters there credentials then the page is redirected to admin_pro, and when a user is logged in it             redirects to main.php, and if the user does not have a account below the login button we have a option to"CREATE ACCOUNT".
    *4)register.php: This page is only for the user to create there account and can login and can check out the items which were added will stay as it is in cart untill and unless       user himself removes the item from the cart.
    *5)check.php: This page is visible when user checks out and the final order is visible to them.
    6)admin_pro.php: This page is for admin and it is visble when admin logs in not only this page all the pages related to admin are visible when admin logs in. This page             contains product list which admin has already entered and can remove the item from this page.
    7)admin_add_products.php: This page helps admin to add a product which later can be used by the cutomers.
    8)admin_cat.php: This page is used to add or remove a category of the product that admin wishes to produce them on this site.
    9)Adminheader.php: this is the header which contains admin navigation bar, and this visible on admin pages.
    10)connection.php: It is the connection file which throws the data base connection string "$conn". if we want to change any thing regarding database connection we dont need      to visit every page simple change in this page will reflect on to every page.
    11)functions.js: This is a javascript file which contains all the function that are used in entire project so that if there is any need to use the same function again we           dont need to redefine it again and again we can use the requred function from this file.
    12)elements.php: This page hold some common elents that are used in admin page as well in customer page. this page i written in order to avoid redeclation of elements. i am      passing the account type as a parameter to this elements so that it can react accordingly.Like wheather to display an element on to admin page or customer page.
    13)operations.php: All the operations that are been performed in entier project are handled over here.
Common pages used and there usage:
    elements.php:This page holds products,Category list,Search product These three elemnets are common for admin and customer. it takes a seperate value acc_type which is           account type and depends on the value its prepares the elements and passes to the calling function this function then places the element on that page. 
    functions.js: This page contains all the funtions that are used by other pages and some functions takes the parameter and according to that parameter performs operation.
    operations.php: This page takes all the values which are being posted and helps to update our data base based on the values recived.
    
