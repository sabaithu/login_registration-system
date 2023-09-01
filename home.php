<?php 
    session_start();
    require "connnection.php";
    require "template/header.php";
    
    mysqli_close($db);
?>
<body>
  <div class="form-box">
        <div class="logo">
            <img src="seikoLogo.png" width="300px">
        </div>
        <hr>
        <h1 class="login-title">Welcome ! You are now signed in to your account.</h1>
        <div>
          <img src="seiko.jpeg" class="img-fluid rounded"  width="250"><a href="/"><span class="material-icons blue-color">home</span></a>
        </div>
          <h4 class="my-4">SEIKO ARCHITECTURAL WALL SYSTEMS </h4>
          <p>The brand office was converted to this Fully Owned Subsidiary as a profit center for design and engineering works.</p>
          <span><a href="./logout.php" class="btn btn-primary">Log Out</a></span>
        <?php require "template/footer.php"; ?> 
      </div>
           
  
</body>

</html>