<?php
session_start();

$id=$_SESSION['id'];
if(!isset($id))
{
    header("location:loginForm.php");
}
@include 'includes/db.php';

if(isset($_POST['update_update_btn'])){
   $update_value = $_POST['update_quantity'];
   $update_id = $_POST['update_quantity_id'];
   $update_quantity_query = mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_value' WHERE cid = '$update_id'");
   if($update_quantity_query){
      header('location:cart.php');
   };
};

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE cid = '$remove_id'");
   header('location:cart.php');
};

if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart`");
   header('location:cart.php');
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

    <title>Cart</title>
</head>

<body>
 
  
       <div class="topnav" id="myTopnav">
       <ul> 
        <a href="logout.php">Logout</a>
        <a href="#contact">Contact</a>
        <a href="#about">About</a>
        <a href="userViewProducts.php">Products</a>
        <a href="#home" class="active">Home</a>
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
      
        <h1 class="text-white" > cart </h1>



        <div class="container mt-3">     
            
  
        <hr style="border-top:1px dotted #ccc;"/>
	



  <table class="table table-bordered">
    <thead class="text-white bg-dark">  
     

         <th>image</th>
         <th>name</th>
         <th>price</th>
         <th>quantity</th>
         <th>total price</th>
         <th>action</th>
   
    </thead>
    <tbody   class="p-3 mb-2 bg-white text-dark">


 

<?php 

$select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
$grand_total = 0;
if(mysqli_num_rows($select_cart) > 0){
   while($fetch_cart = mysqli_fetch_assoc($select_cart)){
?>

<tr>
   <td><img src="images/<?php echo $fetch_cart['image']; ?>" height="100" alt=""></td>
   <td><?php echo $fetch_cart['name']; ?></td>
   <td>$<?php echo number_format($fetch_cart['price']); ?>/-</td>
   <td>
      <form action="" method="post">
         <input type="hidden" name="update_quantity_id"  value="<?php echo $fetch_cart['cid']; ?>" >
         <input type="number" name="update_quantity" min="1"  value="<?php echo $fetch_cart['quantity']; ?>" >
         <input type="submit" value="update" name="update_update_btn">
      </form>   
   </td>
   <td>$<?php echo $sub_total = number_format($fetch_cart['price'] * $fetch_cart['quantity']); ?>/-</td>
   <td><a href="cart.php?remove=<?php echo $fetch_cart['cid']; ?>"  class="btn btn-warning" onclick="return confirm('remove item from cart?')"  class="btn btn-success"> <i class="glyphicon glyphicon-trash"></i> remove</a></td>
  

</tr>
<?php
  $grand_total += $sub_total;  
   };
};
?>
<tr class="table-bottom">
   <td><a href="userViewProducts.php"   class="btn btn-success"style="margin-top: 0;">continue shopping</a></td>
   <td colspan="3">grand total</td>
   <td>$<?php echo $grand_total; ?>/-</td>
   <td><a href="cart.php?delete_all" onclick="return confirm('are you sure you want to delete all?');"  class="btn btn-warning"> <i class="glyphicon glyphicon-trash"></i> delete all </a></td>
   <tr> 

   </tr>

</tr>


    
 </tbody>


  </table>
  <hr style="border-top:1px dotted #ccc;"/>

      <a href="checkout.php" class="btn btn-success<?= ($grand_total > 1)?'':'disabled'; ?>">procced to checkout</a>
      <br /><br />
 
</div>





</body>
<div class="footer">
    <footer>@copyright assignment - All Right Reserved. </footer>
    </div>
    
</html>