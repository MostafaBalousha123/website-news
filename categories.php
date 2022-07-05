<?php 
include "layout/navbar.php"
?>
        <div class="main">
        <h3 class="heading">Explore categories</h3>
        <div class="container">

        <?php 
           $sql="select * from category where active='yes'" ;
           $res=mysqli_query($conn,$sql);
          //  echo $res->num_rows;

          while($row=$res->fetch_assoc()){
          $id=$row['id'];
          $title=$row['title'];
          $image_name=$row['image_name'];
            ?>
          <div class="card">
          <img src="<?php echo $image_name ?>" >
          <div class="details">
              <h3><?php echo $title?></h3>
              <div class="social-links">
                  <a href="category-post.php?id=<?php echo $id?>" >Explore</a>
              </div>
          </div>
          </div>

<?php
          }
?>
    </div>
    </div>


<?php 
include "layout/footer.php"
?>