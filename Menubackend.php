<link href="Menu.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css2?family=Encode+Sans+Semi+Condensed:wght@100&family=Krona+One&display=swap" rel="stylesheet">

<body>

<?php
   if(!empty($_SESSION['accounts']) && $_SESSION['accounts']->role == "User") { 
    ?>   
            <div class="rectangle1"> </div>          

<a class="jogs">Jogs</a>
<a class="contactus" href="#">Contact Us</a>
<a class="aboutus" href="#">About Us</a>
<a class="signup" href="SignUp.php">Sign Up</a>  

<a href="#"><img src="search.jpeg"></a>
<a href="#"><img src="cart.jpeg" class="cart"></a>  
   <?php }else{?>
<div class="rectangle1"> </div>          
<a class="jogs">Jogs</a>
<a class="contactus" href="#">Contact Us</a>
<a class="aboutus" href="#">About Us</a>
<a class="signup" href="SignUp.php">Sign Up</a>  

<a href="#"><img src="search.jpeg"></a>
<a href="#"><img src="cart.jpeg" class="cart"></a>  
    <?php } ?>
</body>
