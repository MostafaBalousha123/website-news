<?php include "../config/constants.php"; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="../css/loginPageAndAddadmin.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
  </head>
  <body>
    <main>
      <section id="welcome-back">
        <figure><img src="../images/loginLogo.svg" alt="pic">
      </figure>
        <h1>welcome Back!</h1>
        <p>To keep connected with us plese login with your personal info</p>
       </section>

<!-- ***************************************************************** -->
<?php
            if(isset($_SESSION['login-faild'])){
                echo $_SESSION['login-faild'];
                unset($_SESSION['login-faild']);
            }
            ?>

       <section id="login">
        <h1>Login Now</h1>
        <!-- <p>Please make sure that the data is entered correctly</p> -->
        <form action="" method="POST">
          <label for="userName">User Name</label>
          <input type="text" name="username" required placeholder="user name "/>
          <label for="password">password</label>
          <input type="password" name="password" required placeholder="***********"/>
          <input type="submit" name="submit" required value="Login" />
        </form>
      </section>

    </main>
  </body>
</html>


<?php
if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    $res=mysqli_query($conn," select * from admins where username='$username' and password='$password'");
    echo $res->num_rows;
    if($res && $res->num_rows>0){
        $_SESSION['login']=$username;
        $_SESSION['timestamp']=time();
        header("location:index.php");
    }else{
        $_SESSION['login-faild']=" username or password is incorrect";
        header("location:login.php");

    }
}
?>