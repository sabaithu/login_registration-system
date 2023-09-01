<?php 
    session_start(); 
    require "connnection.php";
    require 'template/header.php';
    $nameError = '';
    $user_nameError ='';
    $passwordError = '';
        if(isset($_POST['create_user_button'])){
            $name = $_POST['name'];
            $username = $_POST['user_name'];
            $password = $_POST['password'];
            
            $date = date('d-m-y h:i:s');

            if(empty($name)){
                $nameError = "Name Required";
            }
            if(empty($password)){
                $passwordError = "Name Password";
            }
            # Validate password
            // if (empty(trim($_POST["password"]))) {
            //     $passwordError = "Please enter a password.";
            // } else {
            //     $password = trim($_POST["password"]);
            //     if (strlen($password) < 8) {
            //       $passwordError = "Password must contain at least 8 or more characters.";
            //     }
            // }
            //  $password = password_hash($password, PASSWORD_DEFAULT);


            if(!empty($name) && !empty($username) && !empty($password)){
                
                mysqli_query($db,"INSERT INTO users(name,user_name, password,created_date) VALUES('$name','$username','$password','$date')");

                //$_SESSION['successMsg'] = 'Your Name Created Successfully';

                header('location:index.php');

            }
    }
?>

    <div class="user-create-box">
        <div class="logo">
            <img src="seikoLogo.png" width="300px">
        </div>
        <hr>
    
            <h1 class="login-title">Registration</h1>
            <form id="login" action="user-create.php"  method="POST" class="input-group">
                <input type="text" class="input-field" placeholder="Name" name="name" value="<?php echo $name; ?>">
                    <span class="text-danger"> <?php echo  $nameError; ?></span>
                <input type="text" class="input-field" placeholder="User Name" name="user_name" value="<?php echo $username; ?>">
                    <span class="text-danger"><?php echo  $user_nameError; ?></span>
                <input type="password" class="input-field" placeholder="Password" name="password" value="<?php echo $password; ?>">
                    <span class="text-danger"><?php echo  $passwordError; ?></span>
                <button type="submit" name ="create_user_button"  class="submit-btn">Save</button>
                <p class="link margin-top-10">Already have an account?  <a href="login.php">Login here</a></p>
            </form>
            <?php mysqli_close($db);?>
         </div>
    </div>
    <?php require "template/footer.php"; ?>
</body>
</html>
   
    
