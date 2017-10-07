<?php
	require_once '../core/init.php';
	include 'includes/head.php';
	include 'includes/navigation.php';
	//get brands from database
	$sql = "SELECT * FROM brand ORDER BY brand";
	$results = $db->query($sql);
	$errors = array();
	//if add form is submitted
	if(isset($_POST['add_submit'])){
		$brand = sanitize($_POST['brand']);
		//check if brand is blank
		if($_POST['brand'] == ''){
			$errors[] .= 'You must enter a brand!';
		}
		// check if brand exists in database
		$sql = "SELECT * FROM brand WHERE brand = '$brand'";
		$result = $db->query($sql);
		$count = mysqli_num_rows($result);
		if($count > 0){
			$errors[] .= $brand.'That brand already exist. Please choose another brand name...';
		}
		
		//display errors
		if(!empty($errors)){
			echo display_errors($errors);
		}
		
		else{
			//Add brand to database
			$sql = "INSERT INTO brand (brand) VALUES ('$brand')";
			$db->query($sql);
			header('Location: brands.php');
		}
			
	}
?>

<h2 class="text-center">Brands</h2><hr>
	<!-- Brand Form -->
	
	<div class="text-center">
		<form class="form-inline" action="brands.php" method="post">
			<div class="form-group">
				<label for="brand">ADD a Brand:</label>
				<input type="text" name="brand" id="brand" class=form-control" value="<?=((isset($_POST['brand']))?$_POST['brand']:''); ?>">
				<input type="submit" name="add_submit" value="Add Brand" class="btn btn-success">
			</div>	
		</form>
	</div><hr>
<table class="table table-bordered table-striped table-auto table-condensed">
	<thead>
		<th></th><th>Brand</th><th></th>
	</thead>
	<tbody>
	<?php while($brand = mysqli_fetch_assoc($results)) : ?>
		<tr>
			<td><a href="brands.php?edit=<?=$brand['id'];?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-pencil"></td>
			<td class="text-center"><?=$brand['brand'];?></td>
			<td><a href="brands.php?delete=<?=$brand['id'];?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-remove-sign"></td>
		</tr>
		<?php endwhile; ?>
	</tbody>
</table>
<?php include 'includes/footer.php'; ?>