<?php 
include "layout/navbar.php";
$key_word=$_POST['search'];
?>
<main>
       <!-- start section search    -->

       <section id="intro">
        <div class="intro-detail">
          <h2>Posts on Your Search " <?php echo $key_word ?> "</h2>
          <p>
      
            A new era in the speed of news transmission with Avelon,
             the title of credibility at the level of all sports 
             Follow us on Spacetoon channel "Youth of the Future Channel"
          </p>
          <a href="index.php">Back to home</a>
        </div>
        <img src="./images/test.jpg" alt="image" />
      </section>
       <!-- end section search    -->

         
              <!-- end explore category   section    -->

                            <!-- start  explore post  section    -->

<div id="gray-background">
<h3 class="heading1">Result Search</h3>

      <section id="continer-post">
<?php 
$sql="select * from post where title LIKE '%$key_word%' or description LIKE '%$key_word%'" ;
$res=mysqli_query($conn,$sql);
 echo $res->num_rows;


if( $res->num_rows>0){
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
<a href="contentPost.php?id=<?php echo $id?>">
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
        }

?>

    </section>
    </div>








                            <!-- end explore post  section    -->

</main>


<?php 
include "layout/footer.php"
?>