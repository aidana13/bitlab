<html>
<head>
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <br><br><br>
<div class="container" align="center">
    <?php
    session_start();
    require_once "db.php";

    if($_SERVER['REQUEST_METHOD']=='POST'){

        if(isset($_POST['email'])&&!empty($_POST['email'])&&isset($_POST['password'])&&!empty($_POST['password'])&&isset($_POST['name'])&&isset($_POST['surname'])&&isset($_POST['gender'])&&isset($_POST['country'])&&isset($_POST['city'])){

                $found = getUser($_POST['email']);

                if($found==null){

                    addUser($_POST['email'], $_POST['password'], $_POST['name'],$_POST['surname'],$_POST['gender'],$_POST['country'],$_POST['city']);
                    ?>
                    <h5>Регистрация выполнена успешно!</h5>
                    <a href="login.php">Войти</a>
            <?php
                }
                else{
            ?>
                    <h5>У вас уже имеется аккаунт!</h5>
                    <a href="login.php">Войти</a>
            <?php
                }
        }
        else{
                header('Location:registr.php');
            }
    }
?>
</div>
</body>
</html>