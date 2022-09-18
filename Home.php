<?php
require_once "vendor/autoload.php";

use App\Connection;
use App\User;
$db = new Connection();
$conn = $db->connect();
session_start();


$list=$conn->prepare("SELECT * FROM Image");
$list->execute();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Home</title>
    <link rel="stylesheet" href="HeaderStyle.css" />
    <link rel="stylesheet" href="CardStyle.css" />

    <link rel="icon" href="./Images/b.jpeg" />
    <a name="top"></a>
    <!-- fontawsone -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
      integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <div id="root">

    <?php include "header.php";?>

      <div class="HomeRoot" style="background-color: #292929">
        <iframe
          src="Slider.html"
          name="iframe"
          width="100%"
          height="600px"
          frameborder="0"
          scrolling="no"
        ></iframe>
      </div>
      <div class="title-1" style="background-color: #292929">
        <h1>Our Category</h1>
      </div>
      <div class="product-category" style="background-color: #292929">
        <div>
          <a href="/category?search=Pants">
            <div class="category-title">Pants</div>
            <img src="./Images/PantsImage.jpg" alt="Pants"
          /></a>
        </div>
        <div>
          <a href="/category?search=Pants">
            <div class="category-title">Shoes</div>
            <img src="./Images/ShoesImage.jpg" alt="Shoes"
          /></a>
        </div>
        <div>
          <a href="/category?search=Pants">
            <div class="category-title">Shirts</div>
            <img src="./Images/ShirtsImage.jpg" alt="Shirts"
          /></a>
        </div>
      </div>

      <div class="cards-wrapper" style="border: #fe8033 2px solid">
<?php while($lists =$list->fetch(PDO::FETCH_ASSOC)){?>
 
        <div class="card-grid-space">
          <a
            class="card"
            style="background-image: url(../Classes/<?php echo $lists['Path']?>)">
            <div>
              <h1 ><?php echo $lists['Title']?></h1>
              <h2><?php echo $lists['Brand']?></h2>
              <p><?php echo $lists['Description']?></p>
              <h2><?php echo $lists['Price']?>$</h2>
              
            </div>
          </a>
          <center><button style='color:red; background-color:white; border: 1px white solid;'  name="buy" >Add To Card</button></center>

        </div>      
      <?php

}?>
      </div>

      <?php include "footer.html";?>

    </div>
  </body>
</html>
