<?php
$page_title = "Add Post";
include "../share/navbar-admin.php";
ob_start();

?>
<main>
  <div class="main">
    <div class="topbar">
      <div class="toggle">
        <ion-icon name="menu-outline"></ion-icon>
      </div>
      <div class="user">
        <img src="../assets/imgs/customer01.jpg" alt="" />
      </div>
    </div>
    <div class="wrapper">
      <div class="title">Add Post</div>
      <form class="form" action=" " method="POST" enctype="multipart/form-data">

        <div class="inputfield">
          <label for="title">Title: </label>
          <input id="title" type="text" name="title" class="input" required placeholder=" Title  of the Post." />
        </div>
        <div class="inputfield">
          <label for="description">Description: </label>
          <textarea id="description" name="description" class="textarea" required placeholder="Description of the Post."></textarea>
        </div>

        <div class="inputfield">
          <label for="image">Select Image:</label>
          <input id="image" type="file" required name="image" class="input" />
        </div>

        <div class="inputfield">
          <label for="Category">Select Category: </label>
          <div class="custom_select">
            <select id="Category" name="category">
              <?php
              $res = mysqli_query($conn, "select id,title from category");
              if ($res && $res->num_rows > 0) {
                while ($row = $res->fetch_assoc()) {
                  echo "<option value= $row[id]>$row[title]</option>";
                }
              } else {
                echo "<option value= 0> No Category found</option>";
              }
              ?>
            </select>
          </div>
        </div>
        <div class="inputfield">
          <label> Featured: </label>
          <input id="Yes" type="radio" name="featured" value="Yes" checked />
          <label for="Yes" class="radio">Yes</label>
          <input id="No" type="radio" name="featured" value="No" />
          <label for="No" class="radio">No</label>
        </div>

        <div class="inputfield">
          <label>Active:</label>
          <input id="yep" type="radio" name="active" value="Yes" checked />
          <label for="yep" class="radio">Yes</label>
          <input id="Noo" type="radio" name="active" value="No" />
          <label for="Noo" class="radio">No</label>
        </div>

        <div class="inputfield">
          <input type="submit" name="submit" required value="Add Post" class="btn" />
        </div>
      </form>
    </div>
  </div>
</main>

<?php
include "../share/script.php";
?>

<?php

if (isset($_POST['submit'])) {
  $title   = $_POST['title'];
  $featured   = $_POST['featured'];
  $category   = $_POST['category'];
  $description   = $_POST['description'];
  $active   = $_POST['active'];

  if(isset($_FILES['image']['name']) &&$_FILES['image']['name'] !="" ){
    $name= $_FILES['image']['name']; // We take the name of file  To get the extension from his name
    $temp= $_FILES['image']['tmp_name'];
    $ext= explode('.',$name); // split into array and this the separator-> (.) because after it  we take the extension 
    $ext=end($ext); //last index in the array is the extension 
    $image_name="images/post/".$title.'.'.$ext;
    move_uploaded_file( $temp , "../".$image_name);
  } else {
    $image_name="images/loginLogo.svg";
}

  $sql  = "insert into post set title ='$title', featured = '$featured' , active='$active',image_name= '$image_name',description='$description',cat_id='$category'";
  $res = mysqli_query($conn, $sql);
  if ($res) {
    $_SESSION['post'] = "<p class = 'success'>post is added</p>";
    header("location:manage-post.php");
    ob_end_flush();
  } else {
    $_SESSION['post'] = "<p class = 'error'>post is not added</p>";
    header("location:manage-post.php");
    ob_end_flush();
  }
}
?>