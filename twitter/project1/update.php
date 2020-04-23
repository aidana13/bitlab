<?php
    session_start(); 
    $conn = new PDO('mysql:host=localhost;dbname=bitlab','root','');
    $query = $conn->prepare("SELECT * FROM user_data WHERE user_id = :user_id");
    $query->execute(["user_id"=>$_SESSION['USER_DATA']['id']]);
    $result = $query->fetch();
    //print_r($result);
?>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body><?php
require_once "header.php";
?>
    <br>
<div class="container">
<h4>Редактирование данных</h4>
<form method="post" action="update1.php">
  
  <div class="form-group">
    <label >Имя</label>
    <div class="col-sm-5"><input type="text" class="form-control" name="name" value="<?php echo $result['name'];?>"></div>
  </div>
  <div class="form-group">
    <label >Фамилия</label>
    <div class="col-sm-5"><input type="text" class="form-control" name="surname" value="<?php echo $result['surname'];?>"></div>
  </div>
  <div class="form-group">
    <label >Пол</label>
    <div class="col-sm-5"><input type="text" class="form-control" name="gender" value="<?php echo $result['gender'];?>"></div>
  </div>
  <div class="form-group">
    <label >Страна</label>
    <div class="col-sm-5"><input type="text" class="form-control" name="country" value="<?php echo $result['country'];?>"></div>
  </div>
  <div class="form-group">
    <label >Город</label>
    <div class="col-sm-5"><input type="text" class="form-control" name="city" value="<?php echo $result['city'];?>"></div>
  </div>
 
  <div class="col-sm-3">
  <button type="submit" class="btn btn-primary">Сохранить</button>
</div>
</form>
    </div>
</body>
</html>
