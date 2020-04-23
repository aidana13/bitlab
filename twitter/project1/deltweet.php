<?php
    session_start();
        $conn = new PDO('mysql:host=localhost;dbname=bitlab', 'root', '');

        $sql = "
               DELETE FROM tweets
               WHERE id = :id
        ";
        $query = $conn->prepare($sql);
        $query->execute(["id"=>$_GET['id'] ]);

    header("Location:join.php");
?>