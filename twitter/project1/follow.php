<?php
  session_start();
    require_once "db.php";

    if(isset($_GET['id'])){
        $found = getFollow($_GET['id']);
        if($found==null){
        //session_start();
        $conn = new PDO('mysql:host=localhost;dbname=bitlab','root','');
        $sql = "
            INSERT INTO follows (user_id, follow_id)
            VALUES (:user_id, :follow_id)
        ";
        
        $query = $conn->prepare($sql);
        $query->execute([
            'user_id'=>$_SESSION['USER_DATA']['id'],
            'follow_id'=>$_GET['id'],
        ]);
        $result = $query->fetch();
        
        $sql1 = "
            INSERT INTO followers (user_id, follower_id)
            VALUES (:user_id, :follower_id)
        ";
        
        $query = $conn->prepare($sql1);
        $query->execute([
            'user_id'=>$_GET['id'],
            'follower_id'=>$_SESSION['USER_DATA']['id'],
        ]);
        $result = $query->fetch();
        header("Location:user.php?id=".$_GET['id']);
        }
        
        else{
        $conn = new PDO('mysql:host=localhost;dbname=bitlab', 'root', '');

        $sql = "
               DELETE FROM follows
               WHERE follow_id = :follow_id
        ";
        $query = $conn->prepare($sql);
        $query->execute(["follow_id"=>$_GET['id']]);
        $sql1 = "
               DELETE FROM followers
               WHERE user_id = :user_id
        ";
        $query = $conn->prepare($sql1);
        $query->execute(["user_id"=>$_GET['id']]);
        }
    header("Location:user.php?id=".$_GET['id']);
    }
?>