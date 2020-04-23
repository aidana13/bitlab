
<html>
<head>
   <title>Twitter</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
  <?php
require_once "header.php";
?>
<br><br>
  <div class="container">
</div>
<?php

    session_start();
    try {
    $conn = new PDO('mysql:host=localhost;dbname=bitlab', 'root', '');
    
    $sql = "
    SELECT followers.id,followers.user_id, user_data.name as follower_name  
    FROM followers
    LEFT OUTER JOIN user_data ON user_data.user_id =followers.follower_id 
    WHERE followers.user_id = :user_id  
    ";

    $query = $conn->prepare($sql);
    $query->execute([
        'user_id'=>$_SESSION['USER_DATA']['id']
    ]);
    $result = $query->fetchAll();
    // print_r($result); 
  
    foreach($result as $follower){   
       $id = $follower['follower_name'];
  ?>
<div class="container">
<form method="GET" action="user.php">
<div class="row">
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">
          <input type="hidden" name="id" value="<?php echo $id;?>">
          <?php echo $follower['follower_name'].'<br>';?></h5>
        <button class="btn btn-primary">button</button>
      </div>
    </div>
  </div>
</div>
</form>
</div>
</body>
</html>
<?php
}
  } catch(PDOException $e) {
    echo $e->getMessage() . '<br>';
  }
?>