<?php
    session_start(); 
       try {
        $conn = new PDO('mysql:host=localhost;dbname=bitlab','root','');
        $sql = "
           UPDATE user_data SET name = :name, surname = :surname, gender=:gender,country=:country,city=:city 
           WHERE user_id = :user_id
        ";

        $query = $conn->prepare($sql);
        $query->execute(array(
            'user_id'=>$_SESSION['USER_DATA']['id'],
            'name' => $_POST['name'],
            'surname' => $_POST['surname'],
            'gender' => $_POST['gender'],
            'country' => $_POST['country'],
            'city' => $_POST['city'],
        ));

    }catch (PDOException $e){
        echo "Error!: " . $e->getMessage() . "<br/>";
    }
    header("Location:profile.php");
?>