<?php
$page_title = "Add Category";

    include  "../share/navbar-admin.php";
    ob_start();

    ?>

      <!-- ========================= Main ==================== -->
      <div class="main">
        <div class="topbar">
            <div class="toggle">
              <ion-icon name="menu-outline"></ion-icon>
            </div>
            <div class="user">
            <img src="../assets/imgs/customer01.jpg" alt="" />
            </div>
          </div>
        <main>
         
            <div class="wrapper">
                <div class="title">Add Category </div>
                <form class="form" method="POST" enctype="multipart/form-data">
    
                   <div class="inputfield">
                      <label>Title:</label>
                      <input type="text"  name="title"class="input" required placeholder="Category Title">
                   </div>  
    
    
    
                    <div class="inputfield">
                        <label for="image">Select Image:</label>
                        <input type="file" name="image"   required />
                   </div>  
    
    
    
                   <div class="inputfield">
                    <label for="featured">Featured:</label>
                    <input type="radio" name="featured" value="Yes" checked />
                    <label for="Yes" class="radio">Yes</label>
                    <input type="radio" name="featured" value="No" />
                    <label for="No" class="radio">No</label>
                   </div>  
    
    
                  <div class="inputfield">
                    <label for="active">Active:</label>
                    <input type="radio" name="active" value="Yes" checked />
                    <label for="Yes" class="radio">Yes</label>
                    <input type="radio" name="active" value="No" />
                    <label for="No" class="radio" >No</label>
                   </div> 
                  <div class="inputfield">
                    <input type="submit" name="submit" required value="Add Category" class="btn" />
                  </div>
                  </form>
            </div>	

          </main>
        </div>



   <?php 
 //           <!-- =========== Scripts =========  -->
include  "../share/script.php";

if(isset($_POST['submit'])){
  $title=$_POST['title'];
  $featured=$_POST['featured'];
  $active=$_POST['active'];

  if(isset($_FILES['image']['name']) &&$_FILES['image']['name'] !="" ){
      $name= $_FILES['image']['name'];
      $temp= $_FILES['image']['tmp_name'];
      $ext= explode('.',$name);
      $ext=end($ext);
      $image_name="images/category/".$title.'.'.$ext;
      move_uploaded_file( $temp , "../".$image_name);
  }else{
      $image_name="images/loginLogo.svg";
  }
  $sql="insert into category set title='$title', image_name='$image_name', featured='$featured', active='$active'";
  $res=mysqli_query($conn, $sql);
  if($res){
      $_SESSION['category']="<p class='success'> category is added </p> ";
      header("location:manage-category.php");
      ob_end_flush();

  }else{
      $_SESSION['category']="<p class='error'> category is not added </p>";
      header("location:manage-category.php");
      ob_end_flush();

  }
}

    ?>



