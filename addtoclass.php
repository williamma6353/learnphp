<?php
try{
array_map("htmlspecialchars", $_POST);


print_r($_POST);

include_once("connection.php");

$stmt = $conn->prepare("INSERT INTO Tblpupilstudies(Subjectid, Userid)VALUES (:subjectid, :userid)");

$stmt->bindParam(':subjectid', $_POST["subject"]);
$stmt->bindParam(':userid', $_POST["student"]);

$stmt->execute();
}
catch(PDOException $e)
{
	echo "error".$e->getMessage();
}
$conn=null;

header('Location: pupildoessubject.php');


?>
