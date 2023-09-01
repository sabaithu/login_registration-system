<?php 
    session_start(); 
    require "connnection.php";
    require "template/header.php";
    $nameError = '';
    $user_nameError ='';
    $passwordError = '';
?>

<body>
	<?php 
		if(isset($_GET['user_id'])){
			$user_id_to_update = $_GET['user_id'];
			$user_data = mysqli_query($db, "SELECT * FROM users where id=$user_id_to_update");
			if(mysqli_num_rows($user_data) == 1){
				foreach($user_data as $user) {
					$userid 	=	$user['id'];
					$name 		= 	$user['name'];
					$username 	= 	$user['user_name'];
					$password 	= 	$user['password'];
				}
			}
		}

		//Update User

		if(isset($_POST['update_user_button'])){
			$userid 	=  $_POST['user_id'];
			$name 		=  $_POST['name'];
			$username 	=  $_POST['user_name'];
			$password 	=  $_POST['password'];
		}
		if(empty($name)){
                $nameError = "Name Required";
            }
             if(empty($username)){
                $user_nameError = "User  Name Required";
            }
            if(empty($password)){
                $passwordError = "Password Required";
            }
		if(!empty($name) && !empty($username) && !empty($password)){

			$query = "UPDATE users SET name='$name', user_name='$username', password='$password' WHERE id=$userid";
			mysqli_query($db, $query);
			$_SESSION['successMsg'] = 'Your Name Update Successfully';

			//header('location:index.php');
		}
	?>
    <div class="user-create-box">
            <div class="logo">
                <img src="seikoLogo.png" width="300px">
            </div>
            <hr>
            <h1 class="login-title">User Edit</h1>
            <form id="login" action="user-edit.php"  method="POST" class="input-group">
                <input type="hidden" name="user_id" value="<?php echo $userid; ?>">
                <input type="text" class="input-field" placeholder="Name" name="name" value="<?php echo $name; ?>">
                    <span class="text-danger"> <?php echo  $nameError; ?></span>
                <input type="text" class="input-field" placeholder="User Name" name="user_name" value="<?php echo $username; ?>">
                    <span class="text-danger"><?php echo  $user_nameError; ?></span>
                <input type="password" class="input-field" placeholder="Password" name="password" value="<?php echo $password; ?>">
                    <span class="text-danger"><?php echo  $passwordError; ?></span>
                <button type="submit" name ="update_user_button"  class="submit-btn">Update</button>
            </form>
        </div>
    </div>
</body>
</html>
   
    
