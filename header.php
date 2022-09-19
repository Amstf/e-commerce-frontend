<?php
require_once "vendor/autoload.php";

use App\Connection;
use App\User;
$db = new Connection();
$conn = $db->connect();
session_start();
$welcome="Sign In";
if(isset($_SESSION['username'])){
    $welcome= "{$_SESSION['username']}";
 }
//  else{
//   header("location:login.php");
//  }



?>

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
        
          </div>
          <div class="username-box">
            <div>
              <a href="login.php">
                <p class="name-signout"><?php echo $welcome ?></p>

              </a>

              <?php 
              if(isset($_SESSION['username'])){
                ?>
                <p tabindex="0" class="icon-sign-out"><a href="logout.php">Log out</a></p> 
                 <?php
                 ;}?>
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
            <a class="nav-home" href="Home.php" style="color: #fff"> Home </a>
            <a class="nav-About" href="AboutUs.php" style="color: #fff">
              About us
            </a>
            <a class="nav-Contact" href="formpage.php" style="color: #fff">
              Contact us
            </a>
          </div>
        </div>
        <div class="nav-rightbox"></div>
      </div>
    </div>
