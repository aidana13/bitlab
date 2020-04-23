<?php
	session_start();
	require_once "db.php";

	if($_SERVER['REQUEST_METHOD']=='POST'){

		if(isset($_POST['email'])&&isset($_POST['password'])){

			$user = getUser($_POST['email']);

			if($user!=null&&$user['password']===$_POST['password']){
                  session_start();
				$_SESSION['USER_DATA'] = $user;
				header("Location:join.php");
			
			}
			else
			{
				header("Location:login.php");
			}

		}

	}
?>
