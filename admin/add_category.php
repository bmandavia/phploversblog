<?php  include 'includes/header.php';?>
<?php

	$db = new Database();

	if(isset($_POST['submit']))
	{
		//Assign variables
		$name = mysqli_real_escape_string($db->link,$_POST['name']);
		
		//Simple Validation
		if($name == '')
		{
			$error = 'Please fill out the required fields';
		}else{
			$query = "INSERT INTO categories(name)	 
			          VALUES ('$name')";
					  
			$update_row = $db->update($query);
		}
		
	}

?>

<form method="post" action="add_category.php">
  <div class="form-group">
    <label>Category Name</label>
    <input type="text" name="name" class="form-control" placeholder="Add Category">
  </div>
  <div>
  <input type="submit" name="submit" class="btn btn-default" value="submit">
  </div>
  <br/>
</form>
<?php  include 'includes/footer.php';?>