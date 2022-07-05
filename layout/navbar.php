<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
   <!--------- STYLE------>
   <link rel="stylesheet" href="css/navbar2.css">
   <link rel="stylesheet" href="css/userpage8.css">
   <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
      integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  </head>
  <body>
    <!-- <nav>
      <div class="logo">Brand</div>
      <input type="checkbox" id="click">
      <label for="click" class="menu-btn">
        <i class="fas fa-bars"></i>
      </label>
      <ul>
        <li><a class="active" href="index.php">Home</a></li>
        <li><a href="Categories.php">Categories</a></li>
        <li><a href="post.php">Post</a></li>
        <li><a href="search-post.php">Search Post</a></li>
        <li><a href="about-us.php">About</a></li>

      </ul>
    </nav>
 -->




    <header>
      <div>
        <div class="user">
          <!-- <i class="fa-solid fa-user"></i> -->
        </div>
        <h1>Avion</h1>
        <div class="header-icons">
          <i class="fa-solid fa-bars"></i>
        </div>
      </div>
      <hr />
      <nav>
        <ul>
          <li><a href="index.php" class="active"> Home </a></li>
          <li><a href="Categories.php"> Categories </a></li>
          <li><a href="post.php"> Post</a></li>
          <!-- <li><a href="search-post.php">Search</a></li> -->
          <li><a href="about-us.php"> About Us </a></li>
          <li><a href="#">Contact </a></li>

        </ul>
      </nav>
    </header>









    <?php

if(file_exists("../config/constants.php"))
    include "../config/constants.php";
else  {
include "config/constants.php";     
        }    
// throw some error message or do something else

?>

