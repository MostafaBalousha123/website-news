<?php 
include "layout/navbar.php"
?>

<div id="gray-background" >
<h3 class="heading1">All News</h3>

      <section id="continer-post">
<?php 
$sql="select * from post where active='yes'" ;
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
?>

    </section>
    </div>

<?php 
include "layout/footer.php"
?>