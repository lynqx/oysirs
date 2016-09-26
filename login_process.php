<?php
	session_start();
	$db = 'market';
	require_once 'init_connect.php';

	if(isset($_POST['btn-login']))
	{
		//$user_name = $_POST['user_name'];
		$user_email = trim($_POST['user_email']);
		$user_password = trim($_POST['password']);
		
		$password = md5($user_password);
		
		try
		{	
		
			//$stmt = $dbc->prepare("SELECT * FROM users WHERE email=:email");
			$q = "SELECT * FROM users WHERE email = '$user_email'";
			$r = $dbc->query($q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
			$row = $r->fetch_assoc();
			
			//$stmt->execute(array(":email"=>$user_email));
			//$row = $r->fetch(PDO::FETCH_ASSOC);
			//echo $count = $r->rowCount();
			
			if($row['password']==$password){
				
				// send a confirmation mail
				$body = "You logged into the OYSIRS portal at this time.\n\n";
				$body .= 'If you are not the one that logged in, \n\n';
				$body .= "Please contact the IT unit of the OYSIRS immediately.\n\n";
				$body .= "This could mean your account has been compromised.\n\n";
				$body .= "Thanks";
				 mail($user_email,
				'Login Confirmation', $body,
				'From: OYSIRS PORTAL');
				
				// update with the time of last login
				$now = time();
				$uq = "UPDATE users SET last_login='$now' WHERE email='$user_email'";
				$ur = $dbc->query($uq) or trigger_error("Query: $uq\n<br />MySQL Error: " . mysqli_error($dbc));
				
				echo "Login Authenticated"; // log in
				$_SESSION['start'] = time();
				session_regenerate_id();
				$_SESSION['user_session'] = $row['user_id']; //set session
				$_SESSION['user_active'] = $row['active'];
				$_SESSION['user_role'] = $row['role_id'];
				session_write_close();
			}
			else{
				
				echo "email or password does not exist."; // wrong details 
			}
				
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

?>