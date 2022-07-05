<?php
include '../config/constants.php';
include "share/checklogin.php";

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql="delete from post where id='$id'";
    $res=mysqli_query($conn,$sql);
    if($res){ 
        $_SESSION['post']=" <div class='success'> post is deleted </div>";
        header("location:manage-post.php");
    }else{
        $_SESSION['post']=" <div class='error'> post is not deleted </div>";
        header("location:manage-post.php");
    }


}else{
    header("location:manage-post.php");

}
?>