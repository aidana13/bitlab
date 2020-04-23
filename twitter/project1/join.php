<?php
   session_start();
  require_once "db.php";
?>
<html>
<head>
    <title>Twitter</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body >
<?php
require_once "header.php";
?>
      <br><br><br>
<div class="container" align="center">

<h3 style="color:skyblue">Добро пожаловать в Твиттер</h3>
     <?php 
     if(isset($_SESSION['USER_DATA']))
     {
      ?>
    <h2><?php echo $_SESSION['USER_DATA']['email']?></h2>
     <?php
     }
     ?>   

        <form action="tweet.php" method="POST">
          <div class="form-group">
            
            <textarea class="form-control" name="tweet" rows="10" style="width: 50%; height:10%" placeholder="new tweet"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Post</button>
        </form>

    <?php

    try {
    $conn = new PDO('mysql:host=localhost;dbname=bitlab', 'root', '');
    $sql = "SELECT tweets.id,tweets.tweet, tweets.post_date, tweets.like_count, users.email as user_name  
    FROM tweets 
    LEFT OUTER JOIN users ON users.id=tweets.user_id

    ";
    
    $query = $conn->prepare($sql);
    $query->execute();
    $result = $query->fetchAll();
    //print_r($result);

    foreach($result as $tweet){   
       //$tweet=reverse($tweet);
       $id = $tweet['id'];
    ?>
<div class="container">  
<div class="card" style="width: 30rem;">
  <div class="card-header">
   <h5 class="card-title"><?php echo $tweet['user_name']?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php echo $tweet['post_date']?></h6>
  </div>
  <div class="card-body">
      <input type="hidden" name="id" value="<?php echo $id;?>">
    <p class="card-text"><?php echo $tweet['tweet']?></p>
  </div>
    <div class="card-footer text-muted">

    <?php 
    if($tweet['user_name']==$_SESSION['USER_DATA']['email']){
      ?>

    <a href="updtweet.php?id=<?php echo $id;?>" class="card-link">Update tweet</a>
    <a href="deltweet.php?id=<?php echo $id;?>" class="card-link">Delete tweet</a>
  <?php
    }
  ?>

    <a href="comments.php?id=<?php echo $id;?>" class="card-link">Comments</a>

</div>
</div>
</div>
<br>
<?php
}
  } catch(PDOException $e) {
    echo $e->getMessage() . '<br>';
  }

?>
    </div>
</body>
</html>
