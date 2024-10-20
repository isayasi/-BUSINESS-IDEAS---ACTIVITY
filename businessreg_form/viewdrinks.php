<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>View Drinks</title>
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
	<a href="index.php">Return to home</a>
	<?php $getAllInfoByBarista = getBaristaByID($pdo, $_GET['barista_id']); ?>
    <h1>Username: <?php echo $getAllInfoByBarista['username']; ?></h1>
    <h1>Add New Drinks</h1>
	<form action="core/handleForms.php?barista_id=<?php echo $_GET['barista_id']; ?>" method="POST">
		<p>
            <label for="firstName">Milktea Flavor</label> 
			<input type="text" name="mt_flavor">
			<input type="submit" name="insertFlavorBtn">
		</p>
    </form>
    <table style="width:100%; margin-top: 50px;">
	  <tr>
	    <th>Milktea ID</th>
	    <th>Milktea Flavor</th>
	    <th>Maker</th>
	    <th>Date Added</th>
	    <th>Action</th>
	  </tr>
      <?php $getDrinksByBarista = getDrinksByBarista($pdo, $_GET['barista_id']); ?>
	  <?php foreach ($getDrinksByBarista as $row) { ?>
      <tr>
            <td><?php echo $row['mtdrinks_id']; ?></td>	  	
            <td><?php echo $row['mt_flavor']; ?></td>	  	
            <td><?php echo $row['maker']; ?></td>	  	
            <td><?php echo $row['date_added']; ?></td>
            <td>
                <a href="editmtdrinks.php?mtdrinks_id=<?php echo $row['mtdrinks_id']; ?>&barista_id=<?php 
                echo $_GET['barista_id']; ?>">Edit</a>

                <a href="deletemtdrinks.php?mtdrinks_id=<?php echo $row['mtdrinks_id']; ?>&barista_id=<?php 
                echo $_GET['barista_id']; ?>">Delete</a>
            </td>	  	
        </tr>
        <?php } ?>
    </table>
</body>
</html>
