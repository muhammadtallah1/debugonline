
<?php
session_start();
include("../../db.php");

if(isset($_POST['profile'])){

    $id=$_POST['id'];
    $contact=$_POST['contact'];
    $uname=$_POST['uname'];
    $email=$_POST['email'];
    $location=$_POST['location'];

    $img= $_FILES['img']['name'];
    $img1 =$_FILES['img']["tmp_name"];
    $targetfile="uploads/".$img;
    move_uploaded_file($img1,$targetfile);

    $update = $con->query("UPDATE `user` SET `img`='$img',`contact`='$contact',`uname`='$uname',`location`='$location' WHERE `id` = '$id'");

    if($update){
        header("location:../../?profile=true");
    }else{
        echo "Error";
    }



}

?>