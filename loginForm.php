<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <link rel="stylesheet" href="Css.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>LogIn-Form</title>
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
        


   <div class="formBorder" >
    <h1> LogIn</h1>
    <form   action="login.php" method="post">
    <?php if (isset($_GET['error'])) { ?>

    <p class="error"><?php echo $_GET['error']; ?></p>

    <?php } ?>

       <div class="input">  <label>User Name</label>
     <input name="username" type="username" placeholder="">
     <label> Password</label>
     <input name="Password" type="Password" placeholder="">
     <input type="submit" value="Submit">
    </div>
    </form>
    
    <h3> Already have an account <a href="SignupPage.php">SignIn</h3>

</form>
</div>   
    
    
</body>
<div class="footer">
    <footer>@copyright assignment - All Right Reserved. </footer>
    </div>
    
</html>

