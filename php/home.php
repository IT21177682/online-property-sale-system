<?php
session_start();
include('db.php');
$status="";
if (isset($_POST['code']) && $_POST['code']!=""){
$code = $_POST['code'];
$result = mysqli_query(
$con,
"SELECT * FROM `house` WHERE `code`='$code'"
);
$row = mysqli_fetch_assoc($result);
$location = $row['location'];
$code = $row['code'];
$description  = $row['description'];
$price = $row['price'];
$image = $row['image'];
 
$cartArray = array(
 $code=>array(
 'location'=>$location,
 'code'=>$code,
 'description'=>$description,
 'price'=>$price,
 'image'=>$image)
);
 
if(empty($_SESSION["shopping_cart"])) {
    $_SESSION["shopping_cart"] = $cartArray;
    $status = "<div class='box'>Product is added to your cart!</div>";
}else{
    $array_keys = array_keys($_SESSION["shopping_cart"]);
    if(in_array($code,$array_keys)) {
 $status = "<div class='box' style='color:red;'>
 Product is already added to your cart!</div>"; 
    } else {
    $_SESSION["shopping_cart"] = array_merge(
    $_SESSION["shopping_cart"],
    $cartArray
    );
    $status = "<div class='box'>Product is added to your cart!</div>";
 }
 
 }
}
?>
<!DOCTYPE html>
<html>

  
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>HOME</title>
  <link href="../css/pstyle.css" rel="stylesheet" type="text/css" />

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
		 <a href="./cart.php"><img class="cartst" margin-left="%2" src="../images/cart-icon.png" />
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
<main class="main">
    <section class="top">
      
      <img src="../images/banner.jpg" alt="banner" class="banner">
       <div class="hero-text">
    <h1>WELCOME TO SKPROPERTY</h1>
    <p>WELCOME TO THE NUMBER ONE REAL ESTATE COMPANY IN SRILANKA 
      FIND YOUR DREAM HOUSE IN ONE PLACE </p>
    
  </div>
      <div class="search">
        <input type="text" placeholder= "Search city here">
     <i class="fa fa-search" aria-hidden="true"></i>
       <a href="#">  <button class="hbutton">Search</button></a>
      </div>
      
    </section>
    <h2 id="divider">Latest Properties for Sale in Sri Lanka</h2>


<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>
<br>
    

<h2 class="property">Houses & Land</h2>
<?php
$result = mysqli_query($con,"SELECT * FROM `house` ");
while($row = mysqli_fetch_assoc($result)){
    
    echo "<div class='product_wrapper'>
    <form method='post' action=''>
    <input type='hidden' name='code' value=".$row['code']." />
    <div class='image'><img src='".$row['image']."'></div>
	<div class='location'>".$row['location']."</div>
    <div class='description'>".$row['description']."</div>
    <div class='price'>Rs ".$row['price']."</div>
    <button type='submit' class='buy'>Add to Cart</button>
    </form>
    </div>";
        }
    

    
	mysqli_close($con);
?>



 
<div style="clear:both;"></div>
 
<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>



 </main>

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