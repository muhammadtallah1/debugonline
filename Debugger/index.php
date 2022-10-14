<?php
session_start();

if(isset($_SESSION['id']))
{
   
?>

<h2>Hello hi  <?php echo $_SESSION['name'] ?></h2>
<br>
<a href="logout.php">Logout</a>


<?php
}else{
    header("location:login.php");
}

?>



