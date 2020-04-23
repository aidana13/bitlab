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
    <br><br><br>
<div class="container" align="center">
<h3>Войти в Твиттер</h3>

<form method="POST" action="login1.php">
  <div class="form-group">
    <label >Адрес электронной почты</label>
    <div class="col-sm-5"><input type="email" class="form-control" name="email"></div>
  </div>
  <div class="form-group">
    <label >Пароль</label>
    <div class="col-sm-5"><input type="password" class="form-control" name="password"></div>
  </div>
  <div class="col-sm-3">
  <button type="submit" class="btn btn-primary">Войти</button>
</div>
  <a href="registr.php">Зарегистрироваться в Твиттере</a>
</form>
    </div>
</body>
</html>
