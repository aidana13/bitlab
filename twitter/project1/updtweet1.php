<?php
    session_start(); 
 require_once "db.php";

    if($_SERVER['REQUEST_METHOD']=='POST'){
      if(isset($_POST['tweet'])&&!empty($_POST['tweet'])){

        updateTweet($_POST['id'], $_POST['tweet']);
        
      header("Location:join.php");
    }
}
?>