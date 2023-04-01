<?php
session_start();

$id=$_SESSION['id'];
if(!isset($id))
{
    header("location:loginForm.php");
}
include 'includes/db.php';

if(isset($_POST['add_product'])){
   $p_name = $_POST['p_name'];
   $p_price = $_POST['p_price'];
   $p_image = $_FILES['p_image']['name'];
   $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
   $p_image_folder = 'uploaded_img/'.$p_image;

   $insert_query = mysqli_query($conn, "INSERT INTO `products`(name, price, image) VALUES('$p_name', '$p_price', '$p_image')") or die('query failed');

   if($insert_query){
      move_uploaded_file($p_image_tmp_name, $p_image_folder);
      $message[] = 'product add succesfully';
   }else{
      $message[] = 'could not add the product';
   }
};

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_query = mysqli_query($conn, "DELETE FROM `products` WHERE pid = $delete_id ") or die('query failed');
   if($delete_query){
      header('location:CURDItemadmin.php');
      $message[] = 'product has been deleted';
   }else{
      header('location:CURDItemadmin.php');
      $message[] = 'product could not be deleted';
   };
};

if(isset($_POST['update_product'])){
  $update_p_id = $_POST['update_p_id'];
  $update_p_name = $_POST['update_p_name'];
  $update_p_price = $_POST['update_p_price'];
  $update_p_image = $_FILES['update_p_image']['name'];
  $update_p_image_tmp_name = $_FILES['update_p_image']['tmp_name'];
  $update_p_image_folder = 'uploaded_img/'.$update_p_image;

  $update_query = mysqli_query($conn, "UPDATE `products` SET name = '$update_p_name', price = '$update_p_price', image = '$update_p_image' WHERE pid = '$update_p_id'");

  if($update_query){
     move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);
   
     header('location:CURDItemadmin.php');
  }else{
 
     header('location:CURDItemadmin.php');
  }

}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css.css"/>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <!-- custom css file link  -->
  <link rel="stylesheet" href="style.css">

  
<script type="text/javascript" src="script/bootbox.min.js"></script>
<script type="text/javascript" src="script/deleteRecords.js"></script>
   <!-- font awesome cdn link  -->
 
 
   <!-- custom css file link  -->
  
    <title>View Products </title>
</head>

<body>
 
  
       <div class="topnav" id="myTopnav">
       <ul> 
        <a href="logout.php">Logout</a>
        <a href="#contact">Contact</a>
        <a href="#about">About</a>
           <a href="CURDItemadmin.php">Products</a>
        <a href="CURDSearch.php" class="active">Home</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
          <i class="fa fa-bars"></i>
        </a>
</ul>
      </div>
      

   

      <script>
        function myFunction() {
          var x = document.getElementById("myTopnav");
          if (x.className === "topnav") {
            x.className += " responsive";
          } else {
            x.className = "topnav";
          }
        }
        </script>
        
        <?php echo $_SESSION["username"] ?>
      
        <h1 class="text-white" > ADMIN CURD TABLE </h1>



        <div class="container mt-3">     
            
  
        <hr style="border-top:1px dotted #ccc;"/>
		<button type="button" class="btn btn-success" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> Add user</button>
		<br /><br />



  <table class="table table-bordered">
    <thead class="text-white bg-dark">  
     
      <tr>
        <th>ID</th>
        <th>Image</th>
        <th>Name</th>
        <th>Price</th>
        <th>Action</th>
        
        <th></th>
      </tr>
    </thead>
    <tbody   class="p-3 mb-2 bg-white text-dark">


    <!-- populate table from mysql database -->
    <?php
				
					$query = mysqli_query($conn, "SELECT * FROM `products`") or die(mysqli_error());
					while($fetch = mysqli_fetch_array($query))
					{
            
				?>
				<tr>
                  <td><?php echo $fetch['pid']?></td>
                  <td><img src="images/<?php echo $fetch['image']; ?>" height="100" alt=""></td>
					       <td><?php echo $fetch['name']?></td>

                <td><?php echo $fetch['price']?></td>

                <td><a href="deleteItemRecord.php?delete=<?php echo $fetch['pid']; ?>" onclick="return confirm('are your sure you want to delete this?');" href="javascript:void(0)">
               <i class="glyphicon glyphicon-trash"></i>
             </a></td>
          
             <td>
       
               <a href="CURDItemadmin.php?edit=<?php echo $fetch['pid']; ?>" data-toggle="modal" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit </a>
            </td>	
                 


            

</tr>
				<?php
					
				
					
					}
				?>

 </tbody>
  </table>
</div>

<div class="modal fade" id="form_modal" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" action=""  enctype="multipart/form-data">
					<div class="modal-header">
						<h3 class="modal-title">Add User</h3>
					</div>
					<div class="modal-body">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="form-group">
								<label>Name</label>
								<input  type="text" name="p_name"name="username" class="form-control" required="required"/>
							</div>
							<div class="form-group">
								<label>Price</label>
								<input  type="number" name="p_price" min="0" class="form-control" required="required" />
							</div>
							<div class="form-group">
								<label>Image</label>
								<input type="file" name="p_image" accept="image/png, image/jpg, image/jpeg" class="form-control" required="required"/>
							</div>
              
						</div>
					</div>
					<div style="clear:both;"></div>
					<div class="modal-footer">
						<button type="submit" value="add the product" name="add_product" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Save</button>
						<button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
					
               
               </div>
					</div>
				</form>
			</div>
		</div>
	</div>	


  <section class="edit-form-container">
  <div>
		<div class="modal-content">
<?php

if(isset($_GET['edit'])){
   $edit_id = $_GET['edit'];
   $edit_query = mysqli_query($conn, "SELECT * FROM `products` WHERE pid = $edit_id");
   if(mysqli_num_rows($edit_query) > 0){
      while($fetch_edit = mysqli_fetch_assoc($edit_query)){
?>

<form action="" method="post" enctype="multipart/form-data">
<div class="modal-header">
					<h3 class="modal-title">Update Item</h3>
				</div>
   <div class="form-group">
					
	<label>Name</label>
   <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['pid']; ?>">
   <input type="text" class="form-control"required name="update_p_name" value="<?php echo $fetch_edit['name']; ?>">
    </div>

    <div class="form-group">
    <label>Price</label>
   <input type="number" min="0" class="form-control"required name="update_p_price" value="<?php echo $fetch_edit['price']; ?>">
      </div>
      <div class="form-group">
    <label>Image</label>
  <img src="uploaded_img/<?php echo $fetch_edit['image']; ?>" height="200" alt="">
   <input type="file"  class="form-control"required name="update_p_image" accept="image/png, image/jpg, image/jpeg">
      </div>

 


               <div style="clear:both;"></div>
				<div class="modal-footer">
				<button  name="update_product" type="submit"  class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Update</button>
            
					<button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
				</div>
				</div>
</form>

<?php
         };
      };
      echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
   };
?>
</div>
</div>
</section>



<div class="modal fade" id="update_modal<?php echo $fetch['id']?>" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		<?php

if(isset($_GET['edit'])){
   $edit_id = $_GET['edit'];
   $edit_query = mysqli_query($conn, "SELECT * FROM `products` WHERE pid = $edit_id");
   if(mysqli_num_rows($edit_query) > 0){
      while($fetch_edit = mysqli_fetch_assoc($edit_query)){
?>

    
    
    <form method="POST" action="update_item_query.php">
				<div class="modal-header">
					<h3 class="modal-title">Update Item</h3>
				</div>
				<div class="modal-body">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<div class="form-group">
						
							<label>Name</label>
							<input type="hidden" name="id" value="<?php echo $fetch['pid']?>"/>
							
							<input type="text" name="name" value="<?php echo $fetch['name']?>" class="form-control" required="required"/>
						</div>
						<div class="form-group">
							<label>Price</label>
							<input type="number" min="0" name="price" value="<?php echo $fetch['price']?>" class="form-control" required="required" />
						</div>

						<div class="form-group">
							<label>Image</label>
                     <img src="uploaded_img/<?php echo $fetch['image']; ?>" height="200" alt="">
                     <input type="file"  class="form-control"required name="update_p_image" accept="image/png, image/jpg, image/jpeg">
                      
						</div>
						
						
					</div>
				</div>
				<div style="clear:both;"></div>
				<div class="modal-footer">
					<button  name="update_product" type="submit"  class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Update</button>
					<button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
				</div>
				</div>
			</form>

      <?php
         };
      };
      echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
   };
?>


		</div>
	</div>
</div>  





</body>
<div class="footer">
    <footer>@copyright assignment - All Right Reserved. </footer>
    </div>
    
    
</html>