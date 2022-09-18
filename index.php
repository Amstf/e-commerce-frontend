<?php
require_once "vendor/autoload.php";
session_start();
use App\Connection;
use App\User;
// $pdo = new PDO('mysql:host=localhost;dbname=test', $user, $pass);
$name_error =$password_error= $name_user =$user_password = $email_user="";
$All="";
$username=$Email=$Password=$_Error=$_Suc='';
    
if(isset($_POST["btn"])){
  if(empty($_POST["Name"])){
      $name_error = "please filled the full Name";
      $All= "Some fields are empty";
  }
  if(empty($_POST["Email"])){
      $email_user ="please fill the email filled";
      $All=$All ." and Email fields";
  }
  if(empty($_POST["Password"])){
      $password_error="please filled the full Password";
      $All=$All ." and the password";
  }
  if(!empty($_POST["Name"]) && !empty($_POST["Email"]) && !empty($_POST["Password"])){
      $password = $_POST['Password'];
      $number = preg_match('@[0-9]@', $password);
      $uppercase = preg_match('@[A-Z]@', $password);
      $lowercase = preg_match('@[a-z]@', $password);
      if(strlen($password) < 8 || !$number || !$uppercase || !$lowercase) {
          $msg = "Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.";
      } else {
          $msg = "Your password is strong.";
          $user =new User();
          $user->store($_POST['Name'],$_POST['Email'],$_POST['Password']);
          header("location:login.php");
      }

  }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="HeaderStyle.css" />
    <link rel="icon" href="./Images/b.jpeg" />
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
    <title>Registration</title>
  </head>
  <body>
    <div class="header-all-container">
      <header class="row">
        <div class="brand">
          <a href="index.html">
            <img src="./Images/logo2.jpg" />
          </a>
        </div>
        <div class="search">
          <input
            type="text"
            class="input-search"
            placeholder="Search for products"
          />
          <div class="icon-search">
            <button class="icon-search" disabled="">
              <svg
                class="MuiSvgIcon-root"
                focusable="false"
                viewBox="0 0 24 24"
                aria-hidden="true"
              >
                <path
                  d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"
                ></path>
              </svg>
            </button>
          </div>
        </div>
        <div class="testIconz">
          <div>
            <a href="/cart">
              <svg
                class="MuiSvgIcon-root cartIcon"
                focusable="false"
                viewBox="0 0 24 24"
                aria-hidden="true"
              >
                <path
                  d="M11 9h2V6h3V4h-3V1h-2v3H8v2h3v3zm-4 9c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zm10 0c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2zm-8.9-5h7.45c.75 0 1.41-.41 1.75-1.03l3.86-7.01L19.41 4l-3.86 7H8.53L4.27 2H1v2h2l3.6 7.59-1.35 2.44C4.52 15.37 5.48 17 7 17h12v-2H7l1.1-2z"
                ></path>
              </svg>
            </a>
          </div>
          <div class="username-box">
            <div>
              <a href="index.html">
                <p class="name-signout">Sign in</p>
              </a>
            </div>
          </div>
        </div>
      </header>
    </div>
    <div style="background-color: #292929">
      <div class="navibar-com">
        <div class="nav-leftbox"></div>
        <div style="display: flex; flex-direction: column">
          <div style="height: 30px"></div>
          <div class="navvv-constainerz">
            <a class="nav-home" href="Home.html" style="color: #fff"> Home </a>
            <a class="nav-About" href="AboutUs.html" style="color: #fff">
              About us
            </a>
            <a class="nav-Contact" href="formpage.html" style="color: #fff">
              Contact us
            </a>
          </div>
        </div>
        <div class="nav-rightbox"></div>
      </div>
    </div>
    <div class="register-back">
      <form class="register-container" style="background-color: #292929" form action="index.php" method="post" autocomplete="off">
        <div class="form registration-subcontainer">
          <div>
            <h1>Register</h1>
          </div>
          <div>
          <?php echo  "$name_error"; ?>
            <label for="name"> Name </label>
            <input
              type="text"
              name="Name"
              id="name"
              placeholder="Enter name"
     
            />
          </div>
          <div>
          <?php echo  "$email_user"; ?>

            <label for="email"> Email address </label>
            <input
              type="email"
              name="Email"
              id="email"
              placeholder="Enter email"
          
            />
          </div>
          <div>

            <label for="password"> Password </label>
            <input
              type="Password"
              name="Password"
              id="password"
              placeholder="Enter password"
      
            />
          <?php echo  "$password_error"; ?>

          </div>
          <!-- <div>
            <label for="confirmPassword"> Confirm password </label>
            <input
              type="password"
              name="confirmPassword"
              id="confirmPassword"
              placeholder="Confirm password"
              required=""
            />
          </div> -->
          <div>
       
            <button class="primary" name="btn" type="submit">Register</button>
          </div>
          <div>
            <label> </label>
            <div class="Newusers">
              <b style="color: #fff; padding: 0.5rem"
                >Already have an acount?</b
                
              >
              <a class="Newuser" name="signin" href="login.php"> Sign In  </a>
            </div>
          </div>
        </div>
      </form>
      <div class="footer">
        <div class="footer-location">
          <h3>Location</h3>
          <div style="text-align: center">
            <div>
              <div>Beirut Lebanon</div>
              <div>Mreijeh</div>
            </div>
          </div>
        </div>
        <div class="footer-around-web">
          <h3>We're Always Here To Help</h3>
          <h3 style="color: azure">
            Reach out to us through any of these support channels
          </h3>

          <div class="footer-icon">
            <div>
              <i class="fab fa-whatsapp"></i>
            </div>
            <div>
              <i class="fab fa-facebook"></i>
            </div>
            <div>
              <i class="fab fa-linkedin"></i>
            </div>
          </div>
          <div>
            <a title="Top" href="#top"
              ><img
                style="width: 100%"
                href="#top"
                src="./Images/logo.jpg"
                alt="alternatetext"
            /></a>
          </div>
        </div>
        <div class="footer-about" id="about">
          <h3>About Us</h3>
          <div>
            Buyify is an e-commerce website that allows you to buy tangible
            goods and clothes.And this brings out the need for demand and supply
            of goods and services.
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
