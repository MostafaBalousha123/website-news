<?php
if (isset($_SESSION['login'])) {

} else {
    $_SESSION['login-faild'] = " please sign in first ";
    header("location:login.php");
}



// if(   time()-$_SESSION['timestamp']>5){
//     $_SESSION['login-faild']=" SESSION EXPIRED";
//     header("location:login.php");
//   }else{
//     $_SESSION['timestamp']=time();
//   }
  