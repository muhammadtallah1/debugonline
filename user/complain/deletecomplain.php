<?php 

include("db.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $delete = $con->query("DELETE FROM `complain` WHERE `id`='$id'");

    if($delete){
        ?>
        <script>
            window.location.href="?addacomplain=true";
        </script>
        <?php
        // header("location:?addacomplain=true");
    }
}
?>