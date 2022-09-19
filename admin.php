

<?php
session_start();

require_once "vendor/autoload.php";
use App\Connection;
$db = new Connection();
$conn = $db->connect();
$page=1;
$page=$_GET['page'];
if($page == "" || $page == "1"){
    $page1=0;
}else{
    $page1 =($page*5)-5;
}
if(isset($_SESSION['admin'])){
    $welcome= "{$_SESSION['admin']}";
}else{
    header("location:login.php");
}
$list=$conn->prepare("SELECT * FROM Image  LIMIT $page1,5");
$list->execute();


?>
<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
<link href="/fontawesome-free-5.15.3-web/css/all.css" rel="stylesheet">

<link href="Classes/CSS/Addfiles.css" rel="stylesheet">
<link href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">

<div class="col-md-6 well">
    <hr style="border-top:1px dotted #ccc;">

    <div  style="width: 50%;margin: 1%  auto 2% auto; border: 0.5px solid gray;box-shadow:10px 10px 50px 10px grey;border-radius: 12px">
    <form method="POST" enctype="multipart/form-data" action ="/Classes/AddBlogs.php" style="display: flex;flex-direction: column">
    <div class="form-group" >
    <label style="display: flex;justify-content: center">Upload here</label>
    <input name="file" type="file"  required="required" class="form-control" style="display: block;width: 30%;margin: auto"/>
    

<div style=" display:flex; flex-direction:column; padding:50px; justify-content:center; "> 


    
            <label for="title" style='width:400px; margin:;border:none ;border:none' >title </label>
             <input style='width:400px; margin:;border:none'  id="title" name="title" rows="10" cols="30" placeholder="Enter title" ></input>

            <label for="brand" style='width:400px; margin:;border:none'>brand </label>
             <input  id="brand" style='width:400px; margin:;border:none' name="brand" rows="10" cols="30" placeholder="Enter brand" ></input>
            <label for="category" style='width:400px; margin:;border:none'>category </label>
             <input id="category" style='width:400px; margin:;border:none' type="text" name="category" placeholder="Enter category" />
            <label for="description" style='width:400px; margin:;border:none'>Description </label>
             <input id="description" type="text" name="description" style='width:400px; margin:;border:none' placeholder="Enter description" />
            <label for="price" style='width:400px; margin:;border:none'>Price </label>
             <input  id="price" name="price" rows="10" cols="30" style='width:400px; margin:;border:none' placeholder="Enter price" ></input>

             </div>
  
</div>
            <center><button class="btn btn-primary" name="upload" >Upload</button></center>
            


        </form>

        <center><button   class="btn btn-warning" ><a href="logout.php">Log out</a></button></center>

    </div>
    <div class="container" >
        <div>
            <table>
                <tr>
                    <th>id</th>
                    <th> Name</th>
                    <th> PAth</th>
                    <th>Category</th>
                    <th>TItle</th>
                    <th>Brand </th>
                    <th>description</th>
                    <th> price</th>
                    <th>Date</th>

                    <th style="text-align: center">Action</th>
                </tr>

                <?php
                // require_once "vendor/autoload.php";
                // session_start();
              
                // $sql = "SELECT * FROM `Image` ";
                // $query = $conn->prepare($sql);
                // $query->execute();
                while($lists  = $list->fetch()){
                    ?>
                    <tr>
                    <td><?php echo $lists['id']?></td>

                        <td><?php echo $lists['Name']?></td>
                        <td><?php echo $lists['Path']?></td>
                        <td><?php echo $lists['Category']?></td>
                        <td><?php echo $lists['Title']?></td>
                        <td><?php echo $lists['Brand']?></td>
                        <td><?php echo $lists['Description']?></td>
                        <td><?php echo $lists['Price']?></td>
                        <td><?php echo $lists['Date']?></td>
                        <td style="display: flex;
                         justify-content: space-around">
                        <button class="edit" name="edit"><a href="Update.php?eid=<?php echo $lists['id'] ?>"><i class="fas fa-edit"></i></a></button>
                        <button name="delete" class="delete"><a href="Delete.php?did=<?php echo $lists['id'] ?>"><i class="fas fa-trash "></i></a></button>
                    </td>



                      
                    </tr>

                    <?php
                }
                ?>

            </table>
            <div class="pagination">
                <div class="inner">
                    <?php
                    $result=$conn->prepare("select * from Image");
                    $result->execute();
                    $results= $result->rowCount();
                    $a=$results/5;
                    $a=ceil($a);
                    if($page > 1 ){
                        echo '<a  href="admin.php?page='.($page - 1).'">Previous</a>';
                    }
                    for($b=1;$b<=$a;$b++){
                        if($b == $page){
                            $active ="active";
                        }else{
                            $active="";
                        }
                        echo '<a class="page-link '.$active.'" href="admin.php?page='.$b.'">'.$b.'</a>';
                    }
                    if($a > $page){
                        echo '<a href="admin.php?page='.($page + 1).'">Next</a>';
                    }
                    ?>
                </div>
            </div>
      
</div>
</div>

</div>