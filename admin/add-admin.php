
    <?php
    $page_title = "Add Admin";

    include  "../share/navbar-admin.php";
    // print_r( $conn);
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
              <div class="title"> Add Admin</div>
              <form class="form" action="" method="POST">
               
              
              <div class="inputfield">
                  <label >Full Name</label>
                  <input type="text"  name="full_name" class="input" required placeholder="Full Name " />
              </div>  

              <div class="inputfield">
                <label>User Name</label>
                <input type="text"  name="username" class="input" required placeholder="User Name " />
            </div>  
    
            <div class="inputfield">
              <label>Password</label>
              <input type="password" name="password" class="input" required placeholder="***********"  />
           </div>  
    
            <div class="inputfield">
            <input type="submit" name="submit" required value="Add Admin"   class="btn"/>
            </div>

             </form>
              </div>
        </main>
        </div>

            <!-- =========== Scripts =========  -->
            <?php


if(isset($_POST['submit'])){
  $fullName = $_POST['full_name'] ;
  $userName = $_POST['username'] ;
  $password =md5( $_POST['password'] );
  $sql ="insert into admins set username='$userName' ,  fullName='$fullName', password='$password' " ;
  $res =mysqli_query($conn ,$sql); 
  


  if ($res) {
    $_SESSION['admin'] = "<p class='success'>Admin is added</p>";
    header("location:manage-admin.php");
    ob_end_flush();

  } else {
    $_SESSION['admin'] = "<p class='error'>Admin is not added</p>";
    header("location:manage-admin.php");
    ob_end_flush();
  }
} 


        include  "../share/script.php";
            ?>





