<?php
session_start();
include('db.php');
$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
    foreach($_SESSION["shopping_cart"] as $key => $value) {
      if($_POST["code"] == $key){
      unset($_SESSION["shopping_cart"][$key]);
      $status = "<div class='box' style='color:red;'>
      Product is removed from your cart!</div>";
      }
      if(empty($_SESSION["shopping_cart"]))
      unset($_SESSION["shopping_cart"]);
      } 
}
}
 
if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['code'] === $_POST["code"]){
        
        break; // Stop the loop after we've found the product
    }
}
   
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style1.css">
   <link rel="stylesheet" href="../css/pstyle.css">
  <title>Document</title>
</head>
<body>

<header class="header">
    <h1 id="logo">SKproperty</h1>
    <div class="container1">
      <div style="position: absolute; top: 1px; right: 20px;">
					<a href="#">
						<img src="../images/prf.jpg " class="profilepic " alt="Profile Image ">
					</a>
         <a href="../html/lgindex.html" margin-right="%4" class="nlinks">Logout</a>
		  <a href="#"><img class="cartst" margin-left="%2" src="../images/cart-icon.png" />
				</div>

        
    <nav class="toplink">
     <a href="../php/home.php" class="nlinks">Home</a>
      <a href="../html/Contactus.html" class="nlinks">Contactus</a>
       <a href="../html/aboutus.html" class="nlinks">Aboutus</a>
      <a href="../html/Propertyland.html" class="nlinks">Land</a>
      <a href="../html/houses.html" class="nlinks">Houses</a>
      <a href="../html/desings.html" class="nlinks">NewDesing</a>
     <a href="../html/Addpost.html" class="nlinks">Addyou post</a>
	 <?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
 Cart</a><span>
<?php echo $cart_count; ?></span>
<?php
}
?>
</nav>
<div class="topicons">
  <i class="far fa-user"></i>
   <i class="fa fa-search" aria-hidden="true"></i>
</div>  
  </header>


<div class="cart">
<?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
?> 
<br>
<table class="table">
<tbody>
<tr>
<td></td>
<td>Location</td>
<td>Description</td>
<td> PRICE</td>

</tr> 
<?php 
foreach ($_SESSION["shopping_cart"] as $product){
?>
<tr>
<td>
<img src='<?php echo $product["image"]; ?>' width="200" height="180" />
</td>
<td><?php echo $product["location"]; ?><br />
<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="remove" />
<button type='submit' class='remove'>Remove Item</button>
</form>
</td>

<td><?php echo $product["description"]; ?><br />

</td>

<td><?php echo "Rs ".$product["price"]; ?></td>
<tr>
<td align="left">
<button type="submit" value="Seller info">contact</button>
</td>
</tr>
<?php


}
?>

</tbody>
</table> 
  <?php
}else{
 echo "<h3 >Your cart is empty!</h3>";
 }
?>
</div>
 
<div style="clear:both;"></div>
 
<div class="message_box" style="margin:10px 0px; ">
<?php echo $status; ?>
</div>



<footer class="footer">
  	 <div class="main-wrap">
            <div class="footer-wrap">
                <div class="footer-wrap-1">
                    <div class="footer-section">
                        <h1>COMPANY</h1>
                        <a href="../php/home.php">Home</a>
                        <a href="../html/Propertyland">Land</a>
                        <a href="../html/desings.html">Contractor</a>
                        <a href="../html/desings.html">Architecture</a>
                    </div>
                    <div class="footer-section">
                        <h1>HELP&SUPPORT</h1>
                        <a href="../html/Contactus.html">Contact us</a>
                        <a href="../html/Pr.html">privacy policy</a>
                        <a href="../html/faq.html">FAQ</a>
                     
                    </div>
                    <div class="footer-section">
                        <h1>LEARN MORE</h1>
                        <a href="../html/aboutus.html">About us</a>
                         <a href="../html/propertylaw.html">Property low</a>
                        <a href="#">Blog</a>
                    </div>
                    <div class="footer-section">
                        <h1>Stay Connected</h1>
                      <div class="phone">
           <a href="#"><i class="fas fa-phone-volume"></i>+99 50605631</a>
         </div>
                 <p>Subscribe to our newsletterFor exclusive updates</p>
                        <form action="">
                            <input type="email" name="email" id="email" placeholder="Enter Email Address">
                            <button type="submit" class="btn">Subscribe</button>
                        </form>
                    </div>
                </div>
                <div class="footer-wrap-2">
                    <div class="line"></div>
                    <div class="social-link">
                        <a href="#">
                            <img src="../images/fb.png" alt="Facebook">
                        </a>
                        <a href="#">
                            <img src="../images/google.png" alt="Google">
                        </a>
                        <a href="#">
                            <img src="../images/inster.png" alt="inster">
                        </a>
                        <a href="#">
                            <img src="../images/youtube.png" alt="youtube">
                        </a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="first-box">
                    <a href="#">Terms & Conditions</a>
                   
                </div>
                <div class="last-box">
                    <a href="#">&copy; Copyright 2022 SKProperty powerd by ROCOGEN</a>
                </div>
            </div>
        </div>
  </footer>



    
    
        <script src="script.js"></script>
</body>

</html>

 
</body>
</html>