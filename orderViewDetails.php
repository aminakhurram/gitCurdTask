<?php

require 'includes/db.php';
session_start();

$id=$_SESSION['id'];
$username=$_SESSION['username'];
if(!isset($id))
{
    header("location:loginForm.php");
}


if (isset($_POST['submit'])){



$Name = $conn->real_escape_string($_POST['name']);
$Email_Id = $conn->real_escape_string($_POST['email']);
$Subject = $conn->real_escape_string($_POST['subject']);
$Message = $conn->real_escape_string($_POST['message']);

$query = "INSERT into contact(name,email,subject,message,id) VALUES('$Name','$Email_Id','$Subject','$Message',$id)";
$success = $conn->query($query);

if (!$success){
  die("Couldnt enter data: ".$conn->error);
}

$conn->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <link rel="stylesheet" href="css/Css.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
    <title>Feedback Form</title>
</head>
<body>

<div class="topnav" id="myTopnav">
        <a href="logout.php">logout</a>
        <a href="#contact">Contact</a>
        <a href="#about">About</a>
        <a href="orderViewProducts.php" class="active">Oredr Detail</a>
        <a href="userViewProducts.php">Products</a>
        <a href="userhome.php" class="active">Home</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
          <i class="fa fa-bars"></i>
        </a>
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
        

   <div class="formBorder" >
    <h1> FeedBack Form </h1>
    <form    action="#" method="post">
    <?php if (isset($_GET['error'])) { ?>

    <p class="error"><?php echo $_GET['error']; ?></p>

    <?php } 
    ?>

    <?php
					
                  
                    $query2 = mysqli_query($conn, "SELECT * FROM `user`  where id ='$id'") or die(mysqli_error());
					$fetch2 = mysqli_fetch_array($query2)
					
                          ?>
                          
     
			
          
            <td>Account Name : <?php echo $fetch2['username']?></td> <br>
           
            
            
         
        
    
       
        


               
       <div class="input">  <label>Name</label>
     <input name="name" type="name" placeholder="Type Here" required>
     <label> Email</label>
     <input name="email" type="email" placeholder="Type Here" required>
     <label> Subjects</label>
     <input name="subject" type="subject" placeholder="Type Here" required>
     <label>Message</label>
    <textarea name="message" placeholder="Type Here"></textarea>

  
     <input type="submit" value="Submit" id="submit" name="submit" >

 
            
    </div>
    </form>
    
    <h3><a href="SignupPage.php"></h3>

</form>





</div>   
    
    
</body>
<div class="footer">
    <footer>@copyright assignment - All Right Reserved. </footer>
    </div>
    
</html>


