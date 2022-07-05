<?php

ob_start();
$page_title = "Update Password";
    include  "../share/navbar-admin.php";
    if(isset($_GET['id'])){
      $id= $_GET['id'];
      $sql="select password from admins where id='$id' ";
      $res=mysqli_query($conn, $sql);
      if($res && $res->num_rows>0) {
          $admin = $res->fetch_assoc();
          $old_password = $admin['password'];
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
              <div class="title"> Update Passowrd</div>
              <form class="form" method="POST" action =" ">
    
                <div class="inputfield">
                  <label >Current Password</label>
                  <input type="password" name="currentPassword" class="input" required placeholder="Current Password " />
              </div>  
    
              <div class="inputfield">
                <label >New Password</label>
                <input type="password" name="newPassword" class="input" required placeholder="New Password "/>
            </div>  
    
            <div class="inputfield">
              <label >Confirm Password</label>
              <input type="password" name="confirmPassword"  class="input" required placeholder="Confirm Password"/>
           </div>  
    
           <div class="inputfield">
            <input type="submit" name="submit" required value="Change Password"   class="btn"/>
    
              </div>
</form>
              </div>
          </main>
        </div>


<?php 
if(isset($_POST['submit'])) {
  $current_password = md5($_POST['currentPassword']);
  $new_password = $_POST['newPassword'];
  $confirm_password = $_POST['confirmPassword'];
  if($old_password===$current_password){
      if($new_password==$confirm_password){
          $new_password=md5($new_password);
          $sql="update admins set password='$new_password' where id='$id' ";
          $res=mysqli_query($conn,$sql);
          if($res){
              $_SESSION['admin']=" <div class='success'> password is updated </div>";
              header("location:manage-admin.php");
ob_end_flush();
          } else{
              $_SESSION['admin']=" <div class='error'> password is not updated </div>";
              header("location:manage-admin.php");
          }   
      }else{
          echo "passwords are not matched ";
      }

  }else{
      echo " current password is incorrect ";
  }
}
?>

    <!-- =========== Scripts =========  -->
    <?php
    include  "../share/script.php";
    ?>






