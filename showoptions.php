<?php
include_once('connection.php');
$stmt = $conn->prepare("SELECT tblsubjects.Subjectname as sn FROM Tblpupilstudies 
INNER JOIN tblsubjects 
ON tblsubjects.SubjectID=tblpupilstudies.SubjectID 
WHERE UserID=:selecteduser");

$stmt->bindParam(':selecteduser', $_POST["Name"]);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
        echo($row["sn"]."<br>");
}
?>
