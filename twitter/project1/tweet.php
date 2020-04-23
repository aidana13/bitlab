<?php
    session_start();   
     require_once "db.php";

    if($_SERVER['REQUEST_METHOD']=='POST'){
      if(isset($_POST['tweet'])&&!empty($_POST['tweet'])){

        addTweet($_SESSION['USER_DATA']['id'], $_POST['tweet']);
        
      header("Location:join.php");
    }
}
?>