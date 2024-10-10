
<!-- Functions for interacting with the database -->

<?php 

require_once 'dbConfig.php';

function insertIntoQualityAssuranceRecords($pdo,$first_name, $last_name, $gender, $Department, $Expertise_Area, $Email, $date_added) {

	$sql = "INSERT INTO qualityassurance_records(first_name,last_name,gender,Department,Expertise_Area,Email,date_added) VALUES (?,?,?,?,?,?,?)";

	$stmt = $pdo->prepare($sql);

	$executeQuery = $stmt->execute([$first_name, $last_name, $gender, $Department, $Expertise_Area, $Email, $date_added]);

	if ($executeQuery) {
		return true;	
	}
}

function seeAllQualityAssuranceRecords($pdo) {
	$sql = "SELECT * FROM qualityassurance_records";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getQAByID($pdo, $QA_id) {
	$sql = "SELECT * FROM qualityassurance_records WHERE QA_id = ?";
	$stmt = $pdo->prepare($sql);
	if ($stmt->execute([$QA_id])) {
		return $stmt->fetch();
	}
}

function updateAQA($pdo, $QA_id, $first_name, $last_name, 
	$gender, $Department, $Expertise_Area, $Email, $date_added) {

	$sql = "UPDATE qualityassurance_records
				SET first_name = ?, 
					last_name = ?, 
					gender = ?, 
					Department = ?, 
					Expertise_Area = ?, 
					Email = ?, 
					date_added = ? 
			WHERE QA_id = ?";
	$stmt = $pdo->prepare($sql);
	
	$executeQuery = $stmt->execute([$first_name, $last_name, $gender, 
		$Department, $Expertise_Area, $Email, $date_added, $QA_id]);

	if ($executeQuery) {
		return true;
	}
}



function deleteAQA($pdo, $QA_id) {

	$sql = "DELETE FROM qualityassurance_records WHERE QA_id= ?";
	$stmt = $pdo->prepare($sql);

	$executeQuery = $stmt->execute([$QA_id]);

	if ($executeQuery) {
		return true;
	}

}




?>
