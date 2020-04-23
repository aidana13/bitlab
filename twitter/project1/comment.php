<?php
	session_start();
	require_once "db.php";
	if(isset($_SESSION['USER_DATA'])){

		if(isset($_POST['id'])&&isset($_POST['comment'])){

			addComment($_POST['id'], $_SESSION['USER_DATA']['id'], $_POST['comment']);
			
            header("Location:comments.php?id=".$_GET['id']);

		}

	}
?>