<?php
    session_start(); 
    $conn = new PDO('mysql:host=localhost;dbname=bitlab','root','');
    $query = $conn->prepare("SELECT * FROM tweets WHERE id = :id");
    $query->execute(["id"=>$_GET['id']]);
    $result = $query->fetch();
    $id=$result['id'];
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
<div class="container" align="center">  

        <form action="updtweet1.php" method="POST">
          <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <textarea class="form-control" name="tweet" rows="10" style="width: 50%; height:10%"><?php echo $result['tweet'];?></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Update</button>
        </form>

   
    </div>
</body>
</html>
