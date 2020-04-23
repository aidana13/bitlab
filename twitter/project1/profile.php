<?php
   session_start();
  $conn = new PDO('mysql:host=localhost;dbname=bitlab','root','');
    $query = $conn->prepare("SELECT * FROM user_data WHERE user_id = :user_id");
    $query->execute(["user_id"=>$_SESSION['USER_DATA']['id']]);
    $result = $query->fetch();
    //print_r($result);

  if(isset($_SESSION['USER_DATA'])){
?>
<html>
<head>
  <title>Twitter</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
    <body>
      <?php
require_once "header.php";
?>
      <br><br><br>
      <div class="container" align="center">
      <h3>Profile page</h3>
      <h5><?php echo $result['name'].' '.$result['surname']?> </h5>
      <h5>Gender: <?php echo $result['gender']?></h5>
      <h5>Country: <?php echo $result['country']?></h5>
      <h5>City: <?php echo $result['city']?></h5>
      <br><br>
    
      <a  href="update.php">Edit your profile</a>
      <br>
      <a  href="delete.php">Delete</a>
<?php
    //session_start();

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
       if($tweet['user_name']==$_SESSION['USER_DATA']['email']){
    ?>

<div class="container">  
<div class="card" style="width: 40rem;">
  <div class="card-body">
    <input type="hidden" name="id" value="<?php echo $id;?>">
    <h5 class="card-title"><?php echo $tweet['user_name']?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php echo $tweet['post_date']?></h6>
    <p class="card-text"><?php echo $tweet['tweet']?></p>
    <a href="updtweet.php?id=<?php echo $id;?>" class="card-link">Update tweet</a>
    <a href="deltweet.php?id=<?php echo $id;?>" class="card-link">Delete tweet</a>
    <a href="comments.php?id=<?php echo $id;?>" class="card-link">Comments</a>
  </div>
</div>
</div>
<?php
}
}
  } catch(PDOException $e) {
    echo $e->getMessage() . '<br>';
  }

?>

</div>
    </body>
</html>
<?php
  }else{
    header("Location:update.php");
  }
?>