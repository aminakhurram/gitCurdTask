<?php 

session_start(); 

include "db.php";

if (isset($_POST['username']) && isset($_POST['Password'])) {
    $Password = $_POST["Password"];
    $passwordHash = base64_encode($Password);
    echo  $passwordHash;
    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $username = validate($_POST['username']);

    $Password = validate($_POST['Password']);

    if (empty($username)) {

        header("Location: loginForm.php?error= User Name is required");

        exit();

    }else if(empty($Password)){

        header("Location: loginForm.php?error=Password is required");

        exit();

    }else {

     
        $sql = "SELECT * FROM user WHERE username='$username' AND Password='$Password'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['username'] === $username && $row['Password'] === $Password) {

                echo "Logged in!";

               

                header("Location:CURDsearch.php");

                exit();

            }else{

                header("Location: loginForm.php?error=Incorect User name or password");

                exit();

            }

        }else{

            header("Location: loginForm.php?error=Incorrect User name or password");
          
            exit();

        }

    }

}else{

    header("Location: loginForm.php");

    exit();

}
?>