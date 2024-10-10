<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		body {
			font-family: "Arial";
		}
		input {
			font-size: 1.5em;
			height: 50px;
			width: 200px;
		}
		table, th, td {
		  border:1px solid black;
		}
	</style>
</head>
<body>
	<h3>Welcome to the Quality Assurance Management System. Input your details here to register</h3>
	<form action="core/handleForms.php" method="POST">
		<p><label for="firstName">First Name</label> <input type="text" name="firstName"></p>
		<p><label for="lastName">Last Name</label> <input type="text" name="lastName"></p>
		<p><label for="gender">Gender</label> <input type="text" name="gender"></p>
		<p><label for="department">Department</label> <input type="text" name="department"></p>
		<p><label for="expertiseArea">Expertise_Area</label> <input type="text" name="expertiseArea"></p>
		<p><label for="email">Email</label> <input type="text" name="email"></p>
		<p><label for="dateAdded">Date_Added</label> <input type="text" name="dateAdded">
			<input type="submit" name="insertNewQABtn">
		</p>
	</form>

	<table style="width:50%; margin-top: 50px;">
	  <tr>
	    <th>QA ID</th>
	    <th>First Name</th>
	    <th>Last Name</th>
	    <th>Gender</th>
	    <th>Departmentl</th>
	    <th>Expertise Area</th>
	    <th>Email</th>
	    <th>Date Added</th>
	    <th>Action</th>
	  </tr>

	  <?php $seeAllQARecords = seeAllQualityAssuranceRecords($conn); ?>
	  <?php foreach ($seeAllQARecords as $row) { ?>
	  <tr>
	  	<td><?php echo $row['QA_Id']; ?></td>
	  	<td><?php echo $row['first_name']; ?></td>
	  	<td><?php echo $row['last_name']; ?></td>
	  	<td><?php echo $row['gender']; ?></td>
	  	<td><?php echo $row['Department']; ?></td>
	  	<td><?php echo $row['Expertise_Area']; ?></td>
	  	<td><?php echo $row['Email']; ?></td>
	  	<td><?php echo $row['date_added']; ?></td>
	  	<td>
	  		<a href="editstudent.php?QA_id=<?php echo $row['QA_Id'];?>">Edit</a>
	  		<a href="deletestudent.php?QA_id=<?php echo $row['QA_Id'];?>">Delete</a>
	  	</td>
	  </tr>
	  <?php } ?>
	</table>



</body>
</html>