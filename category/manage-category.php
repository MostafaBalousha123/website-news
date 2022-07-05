<?php
$page_title = "Manage Category";

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
                  <p>Manage Category </p>
                  <?php  
                  if(isset($_SESSION['category'])){
                    echo $_SESSION['category'];
                    unset($_SESSION['category']);
                  }
                  
                  ?>
                  <div id="btn-in-table-header">  <a   href="add-category.php?id=id" id="add-admin-btn">+Add Category</a> </div>
                </div>
      
              <div class="table_section">
                  <table>
                      <thead>
                          <tr>
                              <th>S No.</th>
                              <th>Title</th>
                              <th>Image</th>
                              <th>Featured</th>
                              <th>Active</th>
                              <th>Actions</th>
                          </tr>
                      </thead>
      
                      <tbody>
                      <?php 
                        $sql ="select * from category" ;
                        $res=mysqli_query($conn ,$sql);
                        if($res && $res-> num_rows>0){

                          while($category=$res-> fetch_assoc()){
                            $id=$category["id"];      
                            $title=$category["title"];      
                            $image_name=$category["image_name"];      
                            $featured=$category["featured"];      
                            $active=$category["active"];      
                          ?>
                          <tr>
                              <td> <?php echo $id ?></td>
                              <td> <?php echo $title ?></td>
  
                              <td> <img src="<?php echo"../".$image_name?>" width="50px"></td> 
                              <td> <?php echo $featured ?></td>
                              <td> <?php echo $active ?></td>
  
                                  <td> 
                                  <a  href="update-category.php?id=<?php echo $id ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                  <a href="delete-category.php?id=<?php echo $id ?>"><i class="fa-solid fa-trash"></i></a> 
                                  </td>             
                                  </tr>
  
                                  <?php
                          }
                      }else{
                          echo" <tr>
                                  <td> <p> No Category Yet ! </p> </td>
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






