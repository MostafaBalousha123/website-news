<?php 
include "layout/navbar.php"
?>

<main>
       <!-- start section search    -->

    <div id="continar-search">
      <h1>Looking for any news</h1>
    <video autoplay muted loop >
      <source src="video/test1.mp4" type="video/mp4" >
    </video>  
			<form id="search-box" action="search-post.php" method="POST">
				<input type="text" id="search" placeholder="search..."  name="search">
				<input id="search-btn" value="Search" type="submit" name="submit"> </input>
        </form>
      </div>
       <!-- end section search    -->

              <!-- start explore category  section    -->
        <div class="main">
        <h3 class="heading">Explore categories</h3>
        <div class="container">

        <?php 
           $sql="select * from category where featured='yes' and active='yes' limit 3" ;
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
                  <a href="categories.php?id=<?php echo $id?>"  target="_blank">Learn More</a>
              </div>
          </div>
          </div>

<?php
          }
?>
    </div>
    </div>
              <!-- end explore category   section    -->

                            <!-- start  explore post  section    -->

<div id="gray-background">
<h3 class="heading1">Explore News</h3>

      <section id="continer-post">
<?php 
$sql="select * from post where featured='yes' and active='yes' limit 6" ;
$res=mysqli_query($conn,$sql);
//  echo $res->num_rows;
while($row=$res->fetch_assoc()){
$id=$row['id'];
$title=$row['title'];
$image_name=$row['image_name'];
$category=$row['cat_id'];
$sqlCategory="select title from category where id ='$category'" ;
$result=mysqli_query($conn,$sqlCategory);
if($result&&$result->num_rows>0){
  $category=$result-> fetch_assoc();
  $titleCategory=$category["title"];
}

?>
<a href="post.php?id=<?php echo $id?>">
      <div class="post-item"><svg><rect></rect></svg>
        <img class="img-post" src="<?php echo $image_name ?>" alt="pic" />
        <div>
          <p class="category-name"><?php echo $titleCategory ?></p>
          <h2 class="title-post"><?php echo $title?></h2>
        </div>
      </div>

      </a>
      <?php
          }
?>

    </section>
    </div>








                            <!-- end explore post  section    -->

</main>



<?php 
include "layout/footer.php"
?>