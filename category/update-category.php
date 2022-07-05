<?php
$page_title = "Update Category";

// include  "../config/constants.php";
include  "../share/navbar-admin.php";

ob_start();

if(isset($_GET['id'])){
  $id= $_GET['id'];
  $sql="select * from category where id='$id'";
  $res=mysqli_query($conn, $sql);
  if($res && $res->num_rows>0){
    $category=$res->fetch_assoc();
    $id=$category["id"];      
    $title=$category["title"];      
    $oldImageName=$category["image_name"];      
    $featured=$category["featured"];      
    $active=$category["active"];      
  }else{
    header("location:manage-category.php");
  }

}else{
 header("location:manage-category.php");
}

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
          <div class="title">Update Category </div>
          <form class="form" method="POST">

             <div class="inputfield">
                <label>Title:</label>
                <input type="text" name="title" class="input"  placeholder="Category Title" value="<?php echo $title?>">
             </div>  

             <div class="inputfield">
              <label>Current Image:</label>
              <img src="<?php echo $oldImageName?>" alt="pic" width="60px">
         </div>  

              <div class="inputfield">
                  <label>New Image:</label>
                  <input type="file" name="image" class="input"  />
             </div>  

             <div class="inputfield">
              <label for="featured">Featured:</label>
              <input type="radio" name="featured" value="Yes" <?php echo ($featured=="Yes")? "checked" : " "?>/>
              <label for="Yes" class="radio">Yes</label>
              <input type="radio" name="featured" value="No"  <?php echo ($featured=="No")? "checked" : " "?> />
              <label for="No" class="radio">No</label>
             </div>  

            <div class="inputfield">
              <label for="active">Active:</label>
              <input type="radio" name="active" value="Yes" <?php echo ($active=="Yes")? "checked" : " "?> />
              <label for="Yes" class="radio">Yes</label>
              <input type="radio" name="active" value="No" <?php echo ($active=="No")? "checked" : " "?>/>
              <label for="No" class="radio" >No</label>
             </div> 

            <div class="inputfield">
              <input type="submit" name="submit" required value="Update Category" class="btn" />
            </div>
          </form>
      </div>	
        </main>
        </div>

      




    <!-- =========== Scripts =========  -->
    <?php
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
      $imageName="../images/category/".$title.'.'.$ext;
      move_uploaded_file( $temp , $imageName);
  }else{
    $imageName=$oldImageName ;
  }
  $sql="update category set title='$title', image_name='$imageName', featured='$featured', active='$active' where id =$id";
  $res=mysqli_query($conn, $sql);
  if($res){
      $_SESSION['category']="<p class='success'> category is updated </p> ";
      header("location:manage-category.php");
      ob_end_flush();

  }else{
      $_SESSION['category']="<p class='error'> category is not updated </p>";
      header("location:manage-category.php");
      ob_end_flush();

  }
}
    ?>







