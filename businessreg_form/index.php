<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Milktea Managemeent System</title>
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
	<h1>Welcome To Milktea Management System. Add new Barista!</h1>
	<form action="core/handleForms.php" method="POST">
		<p>
			<label for="firstName">Username</label> 
			<input type="text" name="username">
		</p>
		<p>
			<label for="firstName">First Name</label> 
			<input type="text" name="firstName">
		</p>
		<p>
			<label for="firstName">Last Name</label> 
			<input type="text" name="lastName">
		</p>
		<p>
            <input type="submit" name="insertBaristaBtn">
		</p>
	</form>
	<?php $getAllBarista = getAllBarista($pdo); ?>
	<?php foreach ($getAllBarista as $row) { ?>
	<div class="container" style="border-style: solid; width: 50%; height: 300px; margin-top: 20px;">
		<h3>Username: <?php echo $row['username']; ?></h3>
		<h3>First Name: <?php echo $row['first_name']; ?></h3>
		<h3>Last Name: <?php echo $row['last_name']; ?></h3>
		<h3>Date Added: <?php echo $row['date_added']; ?></h3>


		<div class="editAndDelete" style="float: right; margin-right: 20px;">
			<a href="viewdrinks.php?barista_id=<?php echo $row['barista_id']; ?>">View Projects</a>
			<a href="editbarista.php?barista_id=<?php echo $row['barista_id']; ?>">Edit</a>
			<a href="deletebarista.php?barista_id=<?php echo $row['barista_id']; ?>">Delete</a>
		</div>


	</div> 
	<?php } ?>
</body>
</html>