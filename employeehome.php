<?php
session_start();

$id=$_SESSION['id'];
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

    <title>CURD</title>
</head>

<body>
 
  
<?php  require_once "includes/navbar1.php"; ?>
      

   

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
      
        <h1 class="text-white" > USER TABLE FOR  EMPLOYEE VIEW</h1>



        <div class="container mt-3">     
            
  
    



  <table class="table table-bordered">
    <thead class="text-white bg-dark">  
     
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <!-- <th>Password</th> -->
        <th>Role</th> 
         
       
      </tr>
    </thead>
    <tbody   class="p-3 mb-2 bg-white text-dark">


    <!-- populate table from mysql database -->
    <?php
					require 'db.php';
					$query = mysqli_query($conn, "SELECT * FROM `user` where role ='user'") or die(mysqli_error());
					while($fetch = mysqli_fetch_array($query))
					{
				?>
				<tr>
                  <td><?php echo $fetch['id']?></td>
					<td><?php echo $fetch['username']?></td>
					<td><?php echo $fetch['email']?></td>
					<!-- <td></td> -->
          <td><?php echo $fetch['role']?></td>
          
					
      <!-- <td><button class="btn btn-warning" data-toggle="modal" type="button" data-target="#update_modal"><span class="glyphicon glyphicon-edit"></span> Edit</button></td> -->
                </tr>
				<?php
					
					include 'user_profile_update.php';
					
					}
				?>

 </tbody>
  </table>
</div>



</body>
<div class="footer">
    <footer>@copyright assignment - All Right Reserved. </footer>
    </div>
    
</html>