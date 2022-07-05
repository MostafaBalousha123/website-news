<?php
$page_title = "Manage Post";

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
                    <p>Manage Post </p>
                    <?php  
                  if(isset($_SESSION['post'])){
                    echo $_SESSION['post'];
                    unset($_SESSION['post']);
                  }
                  
                  ?>
                    <div id="btn-in-table-header">  <a  href="add-post.php?id=id" id="add-admin-btn">+Add Post</a> </div>
                  </div>
        
                <div class="table_section">
                    <table>
                        <thead>
                            <tr>
                                <th>S No.</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>category</th>
                                <th>Image</th>
                                <th>Featured</th>
                                <th>Active</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
        
                        <tbody>
                        <?php 
                        $sql ="select * from post" ;
                        $res=mysqli_query($conn ,$sql);
                        if($res && $res-> num_rows>0){

                            while($post=$res-> fetch_assoc()){
                            $id=$post["id"];      
                            $title=$post["title"];     
                            $description=$post["description"];      
                            $imageName=$post["image_name"];   

                            $category=$post['cat_id'];
                            $sqlCategory= "select title from category where id='$category' ";      
                            $result=mysqli_query($conn,$sqlCategory);    
                            if($result && $result-> num_rows>0){
                                $category=$result-> fetch_assoc();
                                $titleCategory=$category["title"];     

                            }

                            $featured=$post["featured"];      
                            $active=$post["active"];      
                
                        ?>

                            <tr>
                                <td>  <?php echo $id ?></td>
                                <td>  <?php echo $title ?></td>
                                <td>  <?php echo $description ?></td>
                                <td>  <?php echo $titleCategory ?></td>
                                <td> <img src=" <?php echo "../".$imageName ?> " width="50px"></td> 
                                <td> <?php echo $featured ?></td>
                                <td> <?php echo $active ?></td>
    
                                    <td> 
                                    <a  href="update-post.php?id=<?php echo $id ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="delete-post.php?id=<?php echo $id ?>"><i class="fa-solid fa-trash"></i></a> 
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





