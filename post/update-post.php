
<?php
$page_title = "Updated Post";
include "../share/navbar-admin.php";
if (isset($_GET['id'])) {
  $id =  $_GET['id'];
  $sql = "select * from post where id = '$id'";
  $res = mysqli_query($conn, $sql);
  if ($res && $res->num_rows > 0) {
    $post = $res->fetch_assoc();
    $title = $post['title'];
    $description = $post['description'];
    $featured =  $post['featured'];
    $active = $post['active'];
    $old_image_name = $post['image_name'];
    $category = $post['cat_id'];
  } else {
    header("location:manage-post.php");
  }
} else {
  header("location:manage-post.php");
}
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
      <div class="title">Update Post</div>
      <form class="form" action="" method="POST" enctype="multipart/form-data">

        <div class="inputfield">
          <label for="title">Title: </label>
          <input id="title" type="text" name="title" value="<?php echo $title ?>" class="input" required placeholder=" Title  of the Post." />
        </div>
        <div class="inputfield">
          <label for="description">Description:</label>
          <textarea id="description" name="description"  class="textarea" required placeholder="Description of the Food."><?php echo "$description" ?></textarea>
        </div>

        <div class="inputfield">
          <label>Current Image:<img src="<?php echo "../".$old_image_name ?>" width="50px"></label>
        </div>

        <div class="inputfield">
          <label for="image">Select New Image:</label>
          <input id="image" type="file" name="image" class="input" />
        </div>


        <div class="inputfield">
          <label for="category">Select Category:</label>
          <div class="custom_select">
            <select id="category" name="category">
              <?php
              $res = mysqli_query($conn, "select id,title from category");
              if ($res && $res->num_rows > 0) {
                while ($row = $res->fetch_assoc()) {
                  echo "<option value='$row[id]' ";
                  echo ($row['id'] == "$category") ? "selected" : "";
                  echo ">  $row[title]</option>";
                }
              } else {
                echo "<option value= '0'> 'No Category found'</option>";
              }
              ?>
            </select>
          </div>
        </div>


        <div class="inputfield">
          <label>Featured:</label>
          <input type="radio" name="featured" value="Yes" <?php echo ($featured == "Yes") ? "checked" : "" ?> />
          <label for="Yes" class="radio">Yes</label>
          <input type="radio" name="featured" value="No" <?php echo ($featured == "No") ? "checked" : "" ?> />
          <label for="No" class="radio">No</label>
        </div>


        <div class="inputfield">
          <label>Active:</label>
          <input type="radio" name="active" value="Yes" <?php echo ($active == "Yes") ? "checked" : "" ?> />
          <label for="Yes" class="radio">Yes</label>
          <input type="radio" name="active" value="No" <?php echo ($active == "No") ? "checked" : "" ?> />
          <label for="No" class="radio">No</label>
        </div>

        <div class="inputfield">
          <input type="submit" name="submit" required value="Update Food" class="btn" />
        </div>

      </form>
    </div>
  </main>
</div>








      

    <!-- =========== Scripts =========  -->
    <?php
    include  "../share/script.php";
    ?>





<?php
if (isset($_POST['submit'])) {
  $title   = $_POST['title'];
  $featured   = $_POST['featured'];
  $description = $_POST['description'];
  $active   = $_POST['active'];
  $category = $_POST['category'];
  if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != "") {
    $name = $_FILES['image']['name']; // We take the name of file  To get the extension from his name
    $temp = $_FILES['image']['tmp_name'];
    $ext = explode(".", $name); // split into array and this the separator-> (.) because after it  we take the extension 
    $ext = end($ext); //last index in the array is the extension 
    $image_name="images/post/".$title.'.'.$ext;
    move_uploaded_file( $temp , "../".$image_name);
  } else {
    $image_name = $old_image_name;
  }
  $sql  = "update  post set title ='$title', featured = '$featured' , active='$active',image_name= '$image_name',description='$description',cat_id='$category' where id='$id'";
  $res = mysqli_query($conn, $sql);
  if ($res) {
    $_SESSION['post'] = "<p class = 'success'>Post is updated</p>";
    header("location:manage-post.php");
    ob_end_flush();
  } else {
    $_SESSION['post'] = "<p class = 'error'>Post is not updated</p>";
    header("location:manage-post.php");
    ob_end_flush();
  }
}
?>










