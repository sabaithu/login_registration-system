<?php
    require "connnection.php";
    require 'template/header.php';
    session_start();
    if(ISSET($_POST['login'])){
        $name = $_POST['name'];
        $password = $_POST['password'];
 
        $query = mysqli_query($db, "SELECT * FROM `users` WHERE `name` = '$name' AND `password` = '$password'") or die(mysqli_error());
        $fetch = mysqli_fetch_array($query);
        $row = mysqli_num_rows($query);
 
        if($row > 0){
            $_SESSION['user_id']=$fetch['user_id'];
            echo "<script>alert('Login Successfully!')</script>";
            echo "<script>window.location='home.php'</script>";
        }else{
            echo "<script>alert('Invalid username or password')</script>";
            echo "<script>window.location='login.php'</script>";
        }
    }
 
?>


    <div class="user-create-box">
        <div class="logo">
            <img src="seikoLogo.png" width="300px">
        </div>
        <hr>
        <h1 class="login-title">LogIn Here!</h1>
       
        <?php if(isset($_SESSION['error'])){ echo $_SESSION['error']; }?>
        <form id="login" ation="" class="input-group" method="POST">
            <input type="hidden" class="input-field" placeholder=" Id" required>
            <input type="text" class="input-field" name="name" placeholder="Name" required>
            <!-- <input type="text" class="input-field" name="user_name" placeholder="User Name" required> -->
            <input type="password" class="input-field" name="password" placeholder="Password" required>
           
            <button type="submit" name="login" class="submit-btn">Log in</button>
            <p class="link margin-top-10">Don't have an account? <a href="user-create.php">Registration Now</a></p>
        </form>
    </div>
</body>
</html>