<?php
require_once "vendor/autoload.php";
use App\Connection;
use App\Update;
use App\Close;

$db = new Connection();
$conn = $db->connect();
    if(isset($_POST['save'])){
        $new=$_POST['id'];
        $Category=$_POST['category'];
        $Title=$_POST['title'];
        $Brand=$_POST['brand'];
        $Description=$_POST['description'];
        $Price=$_POST['price'];

        $update =new Update();
        $update->update($Title,$Category,$Brand,$Description,$Price,$new);
        header("location:admin.php");
    }
                $new=$_GET['eid'];
                $result1=$conn->prepare("SELECT * FROM Image WHERE id='$new'");
                $result1->execute();
                while($rows=$result1->fetch(PDO::FETCH_ASSOC)){;
                    ?>
                    <div  class="Show modal">
                        <button name="close" class="close"><a href="Close.php" style="text-decoration: none;color: red;">&times;</a> </button>
                        <form action="Update.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $rows['id']?>" />

                            <label for="title">title </label>
                            <input  id="title" name="title" rows="10" cols="30" value="<?php echo $rows['Title'] ;?>"></input>
                            <label for="brand">brand </label>
                            <input  id="brand" name="brand" rows="10" cols="30" value="<?php echo $rows['Brand']; ?>"></input>
                            <label for="category">category </label>
                            <input id="category" type="text" name="category"  value="<?php echo $rows['Category']; ?>" />
                            <label for="description">Description </label>
                            <input id="description" type="text" name="description" value="<?php echo $rows['Description'];?> "/>
                            <label for="price">Content </label>
                            <input  id="price" name="price" rows="10" cols="30" value="<?php echo $rows['Price'];?> "></input>
                            <button name="save" class="save">Save</button>
                        </form>
                    </div>
                <?php } ?>

