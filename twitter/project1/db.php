<?php
	
	$conn = new PDO('mysql:host=localhost;dbname=bitlab','root','');
	function getUser($email)
	{
		global $conn;
		$query = $conn->prepare("SELECT * FROM users WHERE email = :email");
		$query->execute(array("email"=>$email));
		$result = $query->fetch();
		return $result;
	}

	function addUser($email, $password, $name, $surname, 
		$gender, $country, $city)
	{
		global $conn;
		$sql = "
            INSERT INTO users (email, password)
            VALUES (:email, :password)
        ";
        
        $query = $conn->prepare($sql);
        $query->execute([
            'email'=>$_POST['email'],
            'password'=>$_POST['password'],
        ]);
         
        $sql1 = "
            INSERT INTO user_data (user_id, name,surname,gender,country,city)
            VALUES (:user_id, :name,:surname,:gender,:country,:city)
        ";
        $query = $conn->prepare($sql1);
        $query->execute([
        'user_id'=>$conn->lastInsertId(),
        'name'=>$_POST['name'],
        'surname'=>$_POST['surname'],
        'gender'=>$_POST['gender'],
        'country'=>$_POST['country'],
        'city'=>$_POST['city'],
        ]);
	}
	function getFollow($id)
	{
		global $conn;
		$query = $conn->prepare("SELECT * FROM follows WHERE follow_id = :follow_id");
		$query->execute(array(
			"follow_id"=>$id));
		$result = $query->fetch();
		return $result;
	}

	function addTweet($id, $tweet)
	{
		global $conn;
		$query = $conn->prepare("
			INSERT INTO tweets (id, user_id, tweet, post_date, like_count) 
			VALUES (NULL, :user_id, :tweet, NOW(), 0)
		");
        
		$query->execute(
			array(
				"user_id"=>$id, 
				"tweet"=>$tweet,
			)
		);	
	}

    function updateTweet($id, $tweet)
	{
		global $conn;
		$sql = "
           UPDATE tweets SET tweet=:tweet, post_date = NOW() WHERE id = :id
        ";

        $query = $conn->prepare($sql);
        $query->execute(array(
            'id'=>$id,
            'tweet' => $tweet,
        ));
		
	}

	function addComment($tweet_id, $user_id, $answer)
	{
		global $conn;
		$query = $conn->prepare("
			INSERT INTO tweet_answers (id, tweet_id, user_id, answer, post_date)
			VALUES (NULL, :tweet_id, :user_id, :answer, NOW())
		");

		$query->execute(
			array(
				"tweet_id"=>$tweet_id,
				"user_id"=>$user_id, 
				"answer"=>$answer,
			)
		);
		
	}
