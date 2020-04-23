<?php
    session_start(); 
    try{
    $conn = new PDO('mysql:host=localhost;dbname=bitlab','root','');
    $query = $conn->prepare("SELECT * FROM tweets WHERE id = :id");
    $query->execute(array("id"=>$_GET['id']));
    $result = $query->fetch();
    //$id=$result['id'];
  print_r($result);
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
<div class="container">  

  
 

        <form action="comment.php" method="POST">
          <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <input type="text" class="form-control" name="comment" placeholder="leave a comment">
          </div>
          <button type="submit" class="btn btn-primary">Send</button>
        </form>

<?php
    $conn = new PDO('mysql:host=localhost;dbname=bitlab', 'root', '');
    $query = $conn->prepare("
      SELECT tweet_answers.id, tweet_answers.tweet_id, tweet_answers.answer, tweet_answers.post_date, 
      users.email as user_email
      FROM tweet_answers
      LEFT OUTER JOIN users ON users.id = tweet_answers.user_id 
      WHERE tweet_answers.tweet_id = :tweet_id 
      ORDER BY tweet_answers.post_date DESC 
      ");
    $query->execute(array(
       'tweet_id'=>$_GET['id']
    ));
    $result = $query->fetchAll();
    //print_r($result);
    foreach($result as $answer){
       echo '<h5>'.$answer['user_email'].':'.'   '.$answer['answer'].'</h5>';
 }
    ?>
   
    </div>
</body>
</html>
<?php
 } catch(PDOException $e) {
    echo $e->getMessage() . '<br>';
  }
?>