<?php
$page_title = "Manage Admin";

    include  "../share/navbar-admin.php";
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
          <section class="table">
              <div class="table_header">
                  <p> Manage Admin </p>
                  <?php  
                  if(isset($_SESSION['admin'])){
                    echo $_SESSION['admin'];
                    unset($_SESSION['admin']);
                  }
                  
                  ?>
                  <div id="btn-in-table-header">  <a href="add-admin.php?id=id" id="add-admin-btn">+Add Admin</a> </div>
                </div>
      
              <div class="table_section">
                  <table>
                      <thead>
                          <tr>
                              <th>S No.</th>
                              <th>User Name</th>

                              <th>Full Name</th>
                              <th>Action</th>
                          </tr>
                      </thead>
      
                      <tbody>
                        <?php 
                        $sql ="select * from admins" ;
                        $res=mysqli_query($conn ,$sql);
                        if($res && $res-> num_rows>0){

                          while($admin=$res-> fetch_assoc()){
                            $id=$admin["id"];      
                            $username=$admin["username"];      
                            $fullname=$admin["fullname"];      


                          ?>
                          <tr>
                          <td> <?php echo $id ?></td>
                          <td><?php echo $username ?></td>
                          <td><?php echo $fullname ?> </td>
                          <td> 
                              <a  href="update-admin.php?id=<?php echo $id ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                              <a href="delete-admin.php?id=<?php echo $id ?>"><i class="fa-solid fa-trash"></i></a> 
                              <a href="update-password.php?id=<?php echo $id ?>"><i class="ri-lock-line"></i></i> </a>
                              </td>             
                             </tr>


                       <?php
                          }
                      }else{
                          echo" <tr>
                                  <td> <p> No Admin Yet ! </p> </td>
                                  </tr>" ;
                        }
                        ?>
            
        
          
                      </tbody>
                  </table>
              </div>
      
          </section>
      </main>
        </div>

      


    <!-- =========== Scripts =========  -->
    <?php
    include  "../share/script.php";
    ?>





