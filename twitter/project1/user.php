<?php
   session_start();
  $conn = new PDO('mysql:host=localhost;dbname=bitlab','root','');
    $query = $conn->prepare("SELECT * FROM user_data WHERE user_id = :user_id");
    $query->execute(array('user_id'=>$_GET['id']));
    $result = $query->fetch();
    print_r($result);
    $id=$result['user_id'];
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
      <div class="container">
      <form method="GET" action="follow.php">
        <input type="hidden" name="id" value="<?php echo $id;?>">
      <h3>Profile</h3>
      <h5><?php echo $result['name'].' '.$result['surname']?> </h5>
      <h5>Gender: <?php echo $result['gender']?></h5>
      <h5>Country: <?php echo $result['country']?></h5>
      <h5>City: <?php echo $result['city']?></h5>
      <br><br>
    <?php
      if($_SESSION['USER_DATA']['id']!=$_GET['id']){
    ?>
    <button class="btn btn-primary" >Follow</button>
    <br>CLICK TWICE TO UNFOLLOW
<?php  
}
?>
      </form>
      </div>
      </body>
</html>