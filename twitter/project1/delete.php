<?php
    session_start();
        $conn = new PDO('mysql:host=localhost;dbname=bitlab', 'root', '');

        $sql = "
               DELETE FROM users
               WHERE id = :id
        ";
        $query = $conn->prepare($sql);
        $query->execute(["id"=>$_SESSION['USER_DATA']['id']]);

        $sql2 = "
               DELETE FROM user_data
               WHERE user_id = :user_id
        ";

        $query = $conn->prepare($sql2);
        $query->execute(["user_id"=>$_SESSION['USER_DATA']['id']]);

    header("Location:login.php");
?>