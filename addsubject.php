<?php
try{
array_map("htmlspecialchars", $_POST);


print_r($_POST);

include_once("connection.php");

$stmt = $conn->prepare("INSERT INTO Tblsubjects (SubjectID, Subjectname, Teacher)VALUES (null,:subjectname, :Teacher)");

$stmt->bindParam(':subjectname', $_POST["Subject"]);
$stmt->bindParam(':Teacher', $_POST["Teacher"]);

$stmt->execute();
}
catch(PDOException $e)
{
	echo "error".$e->getMessage();
}
$conn=null;

header('Location: subject.php');


?>
