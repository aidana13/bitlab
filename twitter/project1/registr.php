<?php
  session_start();
  require_once "db.php";
?>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <br><br>
<div class="container" align="center">
<h3>Регистрация в Твиттере</h3>
<form method="post" action="registr1.php">
  <input type="hidden" name="id" value="<?php echo $result['id'];?>">
  <div class="form-group">
    <label >Адрес электронной почты</label>
    <div class="col-sm-5"><input type="email" class="form-control" name="email"></div>
  </div>
  <div class="form-group">
    <label >Пароль</label>
    <div class="col-sm-5"><input type="password" class="form-control" name="password"></div>
  </div>
  <div class="form-group">
    <label >Имя</label>
    <div class="col-sm-5"><input type="text" class="form-control" name="name"></div>
  </div>
  <div class="form-group">
    <label >Фамилия</label>
    <div class="col-sm-5"><input type="text" class="form-control" name="surname"></div>
  </div>
  <div class="form-group">
    <label >Пол</label>
    <div class="col-sm-5"><input type="text" class="form-control" name="gender"></div>
  </div>
  <div class="form-group">
    <label >Страна</label>
    <div class="col-sm-5"><input type="text" class="form-control" name="country"></div>
  </div>
  <div class="form-group">
    <label >Город</label>
    <div class="col-sm-5"><input type="text" class="form-control" name="city"></div>
  </div>
  <div class="col-sm-3">
  <button type="submit" class="btn btn-primary">Войти</button>
</div>
</form>
    </div>
</body>
</html>
