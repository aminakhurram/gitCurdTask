
<?php
require 'includes/db.php';
session_start();

$id=$_SESSION['id'];
$username=$_SESSION['username'];
if(!isset($id))
{
    header("location:loginForm.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Css.css"/>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script type="text/javascript" src="script/bootbox.min.js"></script>
<script type="text/javascript" src="script/deleteRecords.js"></script>

    <title>Order</title>
</head>

<body>
 
  
       <div class="topnav" id="myTopnav">
       <ul> 
        <a href="logout.php">Logout</a>
        <a href="#contact">Contact</a>
        <a href="#about">About</a>
        <a href="orderViewProducts.php" class="active">Oredr Detail</a>
        <a href="userViewProducts.php">Products</a>
        <a href="userhome.php" class="active">Home</a>
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
      
        <h1 class="text-white" > ORDER LIST </h1>



        <div class="container mt-3">     
            
  
        <hr style="border-top:1px dotted #ccc;"/>
	
    <br /><br />



  <table class="table table-bordered">
    <thead class="text-white bg-dark">  
     
      <tr>
        <th>Order Id</th>
        <th>Account Name</th>
        <th>Name</th>
        <th>Email</th>
        <th>Order</th>
        <th>Date/Time</th>
     
        <th></th>
      </tr>
    </thead>
    <tbody   class="p-3 mb-2 bg-white text-dark">


    <!-- populate table from mysql database -->
    <?php
					
					
          $query = mysqli_query($conn, "SELECT * FROM `order`  where id ='$id'") or die(mysqli_error());
					while($fetch = mysqli_fetch_array($query))
					{
            $query1 = mysqli_query($conn, "SELECT * FROM `user`where id ='$id'") or die(mysqli_error());
            while($fetch1 = mysqli_fetch_array($query1))
            {
              
          ?>
			

        
				<tr>

         

          <td><?php echo $fetch['oid']?></td>
          <td><?php echo $fetch1['username']?></td> 
					<td><?php echo $fetch['name']?></td>
					<td><?php echo $fetch['email']?></td>
          <td><?php echo $fetch['total_products']?></td>
          <td><?php echo $fetch['ctime']?></td>
          
					
                 
          <td>
       
       <a href="orderViewDetails.php?orderId=<?php echo $fetch['oid']; ?>" data-toggle="modal" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Feedback </a>
    </td>	
             </tr>
				<?php
					
            }
					
					}
				?>





 </tbody>
  </table>
</div>

<div class="modal fade" id="form_modal" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" action="save_user.php">
					<div class="modal-header">
						<h3 class="modal-title">Add User</h3>
					</div>
					<div class="modal-body">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="form-group">
								<label>Name</label>
								<input type="text" name="username" class="form-control" required="required"/>
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="text" name="Password" class="form-control" required="required" />
							</div>
							<div class="form-group">
								<label>email</label>
								<input type="text" name="email" class="form-control" required="required"/>
							</div>
              <div class="form-group">
								<label>role</label>
								
                <select name="role" id="role">
                <option value="user" <?php if($role=='user'){ echo "selected";}?> >user</option>
                    
						   <option value="admin" <?php if($role=='admin'){ echo "selected";}?> >admin</option>
                         
						   <option value="employee" <?php if($role=='employee'){ echo "selected";}?> >employee</option>
                          </select> 
							</div>
						</div>
					</div>
					<div style="clear:both;"></div>
					<div class="modal-footer">
						<button name="save" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Save</button>
						<button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
					</div>
					</div>
				</form>
			</div>
		</div>
	</div>	




</body>
<div class="footer">
    <footer>@copyright assignment - All Right Reserved. </footer>
    </div>
    
</html>