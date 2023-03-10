
<?php
session_start(); 

if($_SERVER["REQUEST_METHOD"] == "POST") {
      
    include 'db.php';
   $username = $_POST["username"]; 
   $email = $_POST["email"]; 
   $password= $_POST["Password"]; 
   $cpassword= $_POST["cpassword"]; 
 
$sql = "INSERT INTO user (username, email,Password,cpassword)
VALUES ('$username', '$email', '$password','$cpassword')";


if (mysqli_query($conn, $sql)) {

   echo "Database created successfully";

 } else {
   echo "Error creating database: " . mysqli_error($conn);
 }
 
 mysqli_close($conn);

}

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
        <a href="#Logout">logout</a>
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
        




   <script type="text/javascript">
    function Validate() {
        var Password = document.getElementById("Password").value;
        var cpassword = document.getElementById("cpassword").value;
        if (Password != cpassword) {
            alert("Passwords do not match.");
            return false;
        }
        return true;
    }
</script>

        

    <div class="formBorder"  >
    <h1> SignUp</h1>
    <form  action="SignupPage.php" method="post" >
    <div class="input">
    <label for="username"> Name</label>
    <input type="text" id="username" name="username" > 
   <label for="email">emialId</label>
    <input type="email" id="email" name="email"  >
    <label for="Password"> Password</label>
    <input type="Password" id="Password" name="Password"  >
    <label for=" cpassword"> Confirm Password</label>
    <input type="Password" id="cpassword" name="cpassword">



<input type="submit" value="Signup"   onclick="return Validate();"  ></div>
    
    </form>
    
<h3> Already have an account <a href="loginForm.php"> logIn<h3>
</div> 
</body>
<div class="footer">
    <footer>@copyright assignment - All Right Reserved. </footer>
    </div>
    
</html>