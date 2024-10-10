
<?php 

require_once 'dbConfig.php'; 
require_once 'models.php';

if (isset($_POST['insertNewQABtn'])) {
	$firstName = trim($_POST['firstName']);
	$lastName = trim($_POST['lastName']);
	$gender = trim($_POST['gender']);
	$department = trim($_POST['department']);
	$expertiseArea = trim($_POST['expertiseArea']);
	$email = trim($_POST['email']);
	$dateAdded = trim($_POST['dateAdded']);

	if (!empty($firstName) && !empty($lastName) && !empty($gender) && !empty($department) && !empty($expertiseArea)  && !empty($email) && !empty($dateAdded)) {
			$query = insertIntoQualityAssuranceRecords($conn, $firstName, $lastName, 
			$gender, $department, $expertiseArea, $email, $dateAdded);

		if ($query) {
			header("Location: ../index.php");
		}

		else {
			echo "Insertion failed";
		}
	}

	else {
		echo "Make sure that no fields are empty";
	}
	
}


if (isset($_POST['editQABtn'])) {
	$QA_id = $_GET['QA_id'];
	$firstName = trim($_POST['firstName']);
	$lastName = trim($_POST['lastName']);
	$gender = trim($_POST['gender']);
	$department = trim($_POST['department']);
	$expertiseArea = trim($_POST['expertiseArea']);
	$email = trim($_POST['email']);
	$dateAdded = trim($_POST['dateAdded']);

	if (!empty($QA_id) && !empty($firstName) && !empty($lastName) && !empty($gender) && !empty($department) && !empty($expertiseArea) && !empty($email) && !empty($dateAdded)) {

		$query = updateAQA($pdo, $QA_id, $firstName, $lastName, $gender, $department, $expertiseArea, $email, $dateAdded);

		if ($query) {
			header("Location: ../index.php");
		}
		else {
			echo "Update failed";
		}

	}

	else {
		echo "Make sure that no fields are empty";
	}

}





if (isset($_POST['deleteQABtn'])) {

	$query = deleteAQA($pdo, $_GET['QA_id']);

	if ($query) {
		header("Location: ../index.php");
	}
	else {
		echo "Deletion failed";
	}
}




?>
