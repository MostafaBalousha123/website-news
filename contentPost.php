<?php 
include "layout/navbar.php"
?>


<section id="container-single">

<?php 

$id=$_GET['id'];
$sql="select * from post where id='$id'" ;
$res=mysqli_query($conn,$sql);
//  echo $res->num_rows;
while($row=$res->fetch_assoc()){
$id=$row['id'];
$title=$row['title'];
$image_name=$row['image_name'];
$description=$row['description']
?>
<h1 class="title-single"  ><?php echo $title ?></h1>
<img class="img-single"  src="<?php echo $image_name ?>" alt="">
<p  class="content-single" > 
<?php echo $description ?>
</p>


      <?php
          }
?>







</section>











<?php 
include "layout/footer.php"
?>