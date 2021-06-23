<?php
#include('includes/head.php');
session_start();
if (empty($_SESSION["cart"])) {
  $subtotal = 0;
  $tax = 0;
  $total = 0;
}
if (isset($_GET["action"])) {
  if ($_GET["action"] == "delete") {
    foreach ($_SESSION["cart"] as $keys => $values) {
      if ($values["hike_id"] == $_GET["id"]) {
        unset($_SESSION["cart"][$keys]);
        $cartid = DB::query('SELECT id FROM cart WHERE user_id=:user_id AND hike_id=:hike_id', array(':user_id' => $userid, ':hike_id' => $_GET['id']))[0]['id'];
        DB::query('DELETE FROM cart WHERE id=:id AND user_id=:user_id AND hike_id=:hike_id', array(':id' => $cartid, ':hike_id' => $_GET['id'], ':user_id' => $userid));
        echo '<script>alert("Item Removed")</script>';
        echo '<script>window.location="cart.php"</script>';
      }
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <!-- Product Sans Font -->
  <link rel="stylesheet" href="layout/css/productsans.css">
  <!-- Main CSS File -->
  <link rel="stylesheet" href="css/master.css">
  <!-- Favicon  -->
  <link href="layout/svg/logo-mark.svg" rel="shortcut icon" type="image/png">
  <!-- Link To Icons File -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <title>Jogs</title>
</head>

<body id="review">
  <!-- Header START -->
  <!-- <?php include('includes/header.php'); ?> -->
  <!-- Header END -->
  <!-- Top Banner START -->
  <div class="top-banner">
    <div class="overlay"></div>
    <div class="content">
      <h1>Your Cart</h1>
    </div>
  </div>
  <!-- Top Banner END -->
  <!-- Cart Body START -->
  <div class="cart-body">
    <div class="flex-container">
      <div class="right">
        <?php
        if (!empty($_SESSION["cart"])) {
          $total_price = 0;
          foreach ($_SESSION["cart"] as $keys => $values) {
            // $hikeid = $values['hike_id'];
			$price = $values['price'];
			$product_name = $values['product_name'];
      $hikeImage = $values['image'];
            // $hike_info = DB::query('SELECT * FROM hikes WHERE id=:id', array(':id' => $hikeid))[0];
        ?>
            <div class=" cart-container ">
              <div class="cartimg"> <img src="<?php echo $hikeImage; ?>"> </div>
              <table>
                <tr>
                  <td>
                    <div class="title"><?php echo $product_name; ?></div>
                  </td>
                </tr>
                <tr>

                </tr>
                <tr>
                  <td>
                    <?php echo $price; ?>
                  </td>
                </tr>
              </table>
              <table class="fl-1 ta-r">
                <tr>
                  <td>
                    <p class="fl-2 ta-r cart-details-text1">Start Date</p>
                  </td>
                  <td>
                    <p class="fl-1 ta-r cart-details-text2"></p>
                  </td>
                  <td>
                    <a href="cart.php?action=delete&id="> <i class="fas fa-times remove-cart"></i> </a>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p class="fl-2 ta-r cart-details-text1">End Date</p>
                  </td>
                  <td>
                    <p class="fl-1 ta-r cart-details-text2"></p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p class="fl-2 ta-r cart-details-text1">Persons</p>
                  </td>
                  <td>
                    <p class="fl-1 ta-r cart-details-text2"></p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p class="fl-2 ta-r cart-details-text1">Booking Cost</p>
                  </td>
                  <td>
                    <p class="fl-1 ta-r cart-details-text3"></p>
                  </td>
                </tr>
              </table>

            </div>
          <?php
            // $total_price = $values["total_price"];
          }
          ?>
        <?php
        }
        ?>
        <!-- Card 1 END-->
        <!-- Card 2 END-->
      </div>
      <!-- Cart Details START -->
      <div class="left">
        <div class=" cart-container ">
          <h1 class="ta-c">Cart Details</h1>
          <hr>
          <?php
          if (!empty($_SESSION["cart"])) {
            $total = 0;
            $subtotal = 0;
            $tax = 0;
            foreach ($_SESSION["cart"] as $keys => $values) {
				$price = $values['price'];
				$product_name = $values['product_name'];
              
              
              
              
          ?>
              <div class="payment-details">
                <div class="flex mb-10"> <b class="fl-1"></b>
                  <p class="fl-1 ta-r"></p>
                </div>
              </div>
            <?php

            //   $subtotal += $values["total_price"];
            }
            ?>
          <?php
            // $tax = $subtotal * 0.14;
            // $total = $tax + $subtotal;
          }
          ?>

          
          <div class="payment-details">
            
            <div class="flex mb-10"> <b class="fl-1">Total Price</b>
              <p class="fl-1 ta-r"></p>
            </div>
            <br>
            <a href="checkout.php"> <button class="mb-a xbutton mb-20 "> Proceed to checkout </button> </a>
            <a href="index.php">
              <div class="mb-a xbutton grey  "> Continue exploring </div>
            </a>
          </div>
        </div>
      </div>
      <!-- Cart Details END -->
    </div>


  </div>
  </div>
  <!-- Cart Body END -->
  <!-- Places you might like START -->
  <!-- <?php include('includes/places-might-like.php'); ?> -->
  <!-- Places you might like END -->
  <!-- Footer START -->
  <!-- <?php include('includes/footer.php'); ?> -->
  <!-- Footer END -->
</body>

</html>
