
<?php
session_start();
include_once("includes/db.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>SignIn-Form</title>
</head>

<body>
 
<div class="topnav" id="myTopnav">
        <a href="#Logout">Logout</a>
        <a href="#contact">Contact</a>
        <a href="#about">About</a>
        <a href="#home" class="active">Home</a>
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
        
        <?php
if (isset($_POST["submit"])) {
   $username1 = $_POST["username"];
   $email = $_POST["email"];
   $Password = $_POST["Password"];
   $passwordHash = base64_encode($Password);
   $passwordRepeat = $_POST["repeat_password"];
   
 
 

   $errors = array();
   
   if (empty($username1) OR empty($email) OR empty($Password) OR empty($passwordRepeat)) {
    array_push($errors,"All fields are required");
   }
   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    array_push($errors, "Email is not valid");
   }
   if (strlen($Password)<8) {
    array_push($errors,"Password must be at least 8 characters long");
   }
   if ($Password!==$passwordRepeat) {
    array_push($errors,"Password does not match");
   }
   
   $sql = "SELECT * FROM user WHERE email = '$email'";
   $result = mysqli_query($conn, $sql);
   $rowCount = mysqli_num_rows($result);
   if ($rowCount>0) {
    array_push($errors,"Email already exists!");
   }
   if (count($errors)>0) {
    foreach ($errors as  $error) {
        echo "<div class='alert alert-danger'>$error</div>";
    }
   }else{
    
    $sql = "INSERT INTO user (username, email, Password) VALUES ( '$username1', '$email', '$passwordHash ')";
    //$stmt = mysqli_stmt_init($conn);
    //$prepareStmt = mysqli_stmt_prepare($stmt,$sql);
    //if ($prepareStmt) {
      //  mysqli_stmt_bind_param($stmt,"sss",$username1, $email, $passwordHash);
      //  mysqli_stmt_execute($stmt);
     
      
      if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
      
      mysqli_close($conn);

       // echo "<div class='alert alert-success'>You are registered successfully.</div>";
        
    //}
    //else{
     //   die("Something went wrong");
    //}
   }
  

}
?>
        

    <div class="formBorder"  >
    <h1> SignUp</h1>
    <form  action="SignupPage.php" method="post" >
    <div class="input">
    <label for="username"> Name</label>
    <input type="text" id="username" name="username"required value="" > 
   <label for="email">emialId</label>
    <input type="email" id="email" name="email" required value="" >
    <label for="Password"> Password</label>
    <input type="Password" id="Password" name="Password" required value="" >
    <label for=" cpassword"> Confirm Password</label>
    <input type="Password" id="repeat_password" name="repeat_password" required value="">



<input type="submit" value="Signup"  name="submit"  ></div>
    
    </form>
    
<h3> Already have an account <a href="loginForm.php"> logIn<h3>
</div> 
</body>
<div class="footer">
    <footer>@copyright assignment - All Right Reserved. </footer>
    </div>
    
</html>