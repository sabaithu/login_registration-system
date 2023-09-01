<?php 
	session_start(); // for success message
	require "connnection.php"; 
	require "template/header.php";
?>
<!-- To delete  -->
<?php if(isset($_GET['user_id_to_delete'])){
		$user_id_to_update = $_GET['user_id_to_delete'];
		//echo $user_id_to_update;
		$query = "DELETE FROM users  where id=$user_id_to_update";
		mysqli_query($db, $query);
	}
 ?>

	<div class="form-box">
            <div class="logo">
                <img src="seikoLogo.png" width="300px">
            </div>
            <hr>
            <h1 class="login-title">User List</h1>
            
			<?php  
				// echo "<font color='green'><h5>".$_SESSION['successMsg']."</h5></font>";
				// unset($_SESSION['successMsg']); 
			?>
			<table class="table table-bordered"> 
		    	<thead>
		    		<tr class="btn-tr"><th colspan="4"><a href="/"><span class="material-icons blue-color">home</span></a></th>
	                  	<th>
	                  		<a href="user-create.php" class="btn btn-add"> + Add </i></a>
	                  		</a>
	                  		<a href="login.php" class="btn btn-login"> <span class="material-icons blue-color"> manage_accounts</span> LogIn</i></a>
	                  	</th>
	                </tr>
			        <tr>
			          <th>ID</th>
			          <th>Created Date</th>
			          <th>Name</th>
			          <th>User Name</th>
			          <th>Action</th>
			        </tr>
		    	</thead>
		    	<tbody>
		    		<?php 
		    			$query = "SELECT * FROM users ORDER BY created_date DESC";
		    			$users = mysqli_query($db,$query);
		    			foreach($users as $user){ 
		    		?>
		    			<tr>
		    				<td><?php echo $user['id']; ?></td>
		    				<td><?php echo $user['created_date']; ?></td>
	    					<td><?php echo $user['name'];  ?></td>
	    					<td><?php echo $user['user_name'] ;?></td>
	    					<td><a href="user-edit.php?user_id=<?php echo $user['id']; ?>"><i class="material-icons">edit</i> </a> &nbsp;  &nbsp;
	    					 <a href="index.php?user_id_to_delete=<?php  echo $user['id']; ?>"><i class="material-icons">delete</i></a> </td>
	    				</tr>
		    		<?php 
		    			} 
		    		?>
		    	</tbody>
		    	<tfoot>
				    <tr class="footer">
				      <td colspan="5"><?php require "template/footer.php"; ?></td>
				      
				    </tr>
				</tfoot>
		    </table>
		</div>
		
    </body>
</html>