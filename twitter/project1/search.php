<html>
<head>
	 <title>Twitter</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
	<?php
require_once "header.php";
?>
<br><br>
	<div class="container">
		<form method="GET" action="search.php">
<input type="text" name="name">
<button type="submit">search</button>
</form>
</div>
<?php
    session_start();

    if(isset($_GET['name'])&& !empty($_GET['name']))
{
    try {
		$conn = new PDO('mysql:host=localhost;dbname=bitlab', 'root', '');
		$sql = "SELECT * FROM user_data 
		WHERE name LIKE :name ";
		
		$query = $conn->prepare($sql);
		$query->execute([
        'name'=>'%'.$_GET['name'].'%'
    ]);
		$result = $query->fetchAll();
    //print_r($result);
    foreach($result as $user){   
       $id = $user['user_id'];
	?>

<div class="container">
<form method="GET" action="user.php">
<div class="row">
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">
        	<input type="hidden" name="id" value="<?php echo $id;?>">
        	<?php echo $user['name'].' '.$user['surname'].'<br>';?></h5>
        <button class="btn btn-primary">button</button>
      </div>
    </div>
  </div>
</div>
</form>
</div>

</body>
</html>
<?php
}
	} catch(PDOException $e) {
		echo $e->getMessage() . '<br>';
	}
}
?>