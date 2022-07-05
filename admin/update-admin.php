<?php
$page_title = "Update Admin";

include  "../share/navbar-admin.php";
ob_start();

if(isset($_GET['id'])){
  $id= $_GET['id'];
  $sql="select * from admins where id='$id'";
  $res=mysqli_query($conn, $sql);
  if($res && $res->num_rows>0){
          $admin=$res->fetch_assoc();
          $username=$admin['username']; 
          $fullname=$admin['fullname'];
  }else{
    header("location:manage-admin.php");
  }

}else{
 header("location:manage-admin.php");
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
            <div class="title"> Update Admin </div>
          <form action=" " method="POST" class="form" >
          <div class="inputfield">
            <label for="fullName">Full Name</label>
            <input id="fullName" type="text" name="fullName" class="input" value="<?php echo $fullname?>" required placeholder="Full Name " />
            <p id="error_fullName"></p>

          </div>

          <div class="inputfield">
            <label>Username</label>
            <input id="username" type="text" name="username" class="input"value="<?php echo $username?>" required placeholder="Username " />
            <p id="error_username"></p>

          </div>
          <div class="inputfield">
            <input type="submit" name="submit" required value="Update Admin" class="btn" />
          </div>
        </form>
            </div>
  
          </main>
        </div>

    
        <?php 
if (isset($_POST['submit'])) {
  $username=$_POST['username']; 
  $fullname=$_POST['fullName'];
    $sql="update admins set username='$username', fullname='$fullname' where id=$id";

  $res = mysqli_query($conn, $sql);
   $res=mysqli_query($conn,$sql);
   if($res){
       $_SESSION['admin']=" <div class='success'> admin is updated </div>";
       header("location:manage-admin.php");
    ob_end_flush();
  } else {
    $_SESSION['admin']=" <div class='error'> admin is not updated </div>";
    header("location:manage-admin.php");
    ob_end_flush();
  }
}
?>
    
<?php
# <!-- =========== Scripts =========  -->
include  "../share/script.php";

    ?>






