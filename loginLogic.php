<?php 
	session_start();
	include_once './dbCon.php';

	if(isset($_POST['submit'])){
		$email = $_POST['email'];
		$password = $_POST['password'];

		if(empty($email)||empty($password)){
			echo "<script>alert('please fill out the fields'); </script>";
		}
		else{
			// Check for admin
			$sql = "SELECT * FROM admindb WHERE email=:email AND password=:password";
			
			$query = $databaseconn->connDB()->prepare($sql);
			$query -> execute(
				array(
					'email' => $email,
					'password' => $password
				)
			);
			$count = $query -> rowCount();
        
			if($count>0){
				$loggeduser = $query->fetch();
				$_SESSION["type"] = "admin";
				$_SESSION["ID"] = $loggeduser["ID"];
				$_SESSION["email"] = $loggeduser["email"];
				$_SESSION["fullname"] = $loggeduser["name"]." ".$loggeduser["surname"];
                echo "<script>alert('sukses admin');</script>";
			}
			else{
				// Check for user
					$sql = "SELECT * FROM customers WHERE email=:email AND password=:password";
			
					$query = $databaseconn->connDB()->prepare($sql);
					$query -> execute(
						array(
							'email' => $email,
							'password' => $password
						)
					);
					$count = $query -> rowCount();
				
					if($count>0){
						$loggeduser = $query->fetch();
						$_SESSION['ID'] = $loggeduser['ID'];
						$_SESSION['type'] = "user";
						$_SESSION['fullname'] = $loggeduser['name']." ".$loggeduser["surname"];
						header("Location:./dashboard/profileInterface.php");
					}
					else{
						echo "<script>alert('Wrong credentials');</script>";
    					echo "<script>window.location.href = './login.php';</script>";
					}
			}
		}
	}
?>