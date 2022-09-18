<?php
require_once "vendor/autoload.php";
session_start();
use App\Connection;
use App\User;

$name_error =$password_error= $name_user =$user_password = $email_user="";
$All="";
$username=$Email=$Password=$_Error=$_Suc='';
$admin = "admin";
$passwordadmin = "123";
    if(isset($_POST["loginbtn"])){
            if(empty($_POST['name'])){
                $username="Enter username or email";
            }elseif (empty($_POST['password'])){
                $Password ="Enter Password";
            }else{
                try{
                  if($_POST['name']==$admin){
                    print($_POST['name']);
                    if($_POST['password']==$passwordadmin){
                      $_SESSION['admin']='admin';

                      header("location:admin.php"); 
                    }
                  }
                  else{
                    $db = new Connection();
                    $conn = $db->connect();
                    $select_stmt=$conn->prepare("SELECT Id,Username,Email,Password from Users WHERE Username=:uname OR Email=:uemail");
                    $select_stmt->execute(array('uname'=>$_POST['name'],'uemail'=>$_POST['name']));
                    $row=$select_stmt->fetch(PDO::FETCH_ASSOC);
                    if($select_stmt->rowCount()>0) {
                        if ($_POST['name'] == $row['Username'] OR $_POST['name'] == $row['Email']) {
                            if (password_verify(($_POST['password']),$row['Password'])){
                                $_SESSION['id']=$row['Id'];
                                $_SESSION['username']=$row['Username'];
                                header("location:Home.php");
                            }else{
                                $_Error="Username and Password not matching";
                                header("location:login.php");

                            }
                        }
                    }
                }}
              catch (PDOException $e){
                }
              
            }
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>SignIn</title>
    <link rel="stylesheet" href="HeaderStyle.css" />
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
    <?php
include "header.php";
    ?>
    
      <div class="Sign-back">
        <form class="signin-container"  action="login.php" method="post" autocomplete="off">>
          <div class="form sigin-subcontainer">
            <h1>Sign In</h1>
          </div>
          <div>
            <label for="Email"> Email address</label>
            <input
              type="name/email"
              name="name"
              id="email"
              placeholder="Enter email"
             
            />
          </div>
          <div>
            <label for="Password">Password</label>
            <input
              type="password"
              name="password"
              id="password"
              placeholder="Enter Password"
             
            />
          </div>
          <div>
            <label></label>
            <button class="primary" type="submit" name="loginbtn">Sign In</button>
          </div>
          <div style="width: 300px">
            <b style="color: #fff; padding: 0.5rem">New User?</b>
                               
            <a class="Newuser" href="index.php"
              ><b>Create new account</b></a
            >
          </div>
          <p style : 'color:#fe8033;'><?php echo "$_Error"?></p>

        </form>
      </div>

      <?php
include "footer.html";
    ?>
  </body>
</html>
