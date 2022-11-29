<?php
session_start();

if (!isset($_SESSION['name']))
{   
    $_SESSION['backURL'] = $_SERVER['REQUEST_URI'];
    header("Location:login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    
    <title>Add to class</title>
    
</head>
<body>
<form action="addtoclass.php" method = "post">
  
  <!--Creates a drop down list-->
<select name = "student">
<?php
include_once('connection.php');
$stmt = $conn->prepare("SELECT * FROM TblUsers WHERE Role = 0 ORDER BY Surname ASC");
$stmt->execute();


while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
	echo('<option value='.$row["UserID"].'>'.$row["Surname"].', '.$row["Forename"].'</option>');
}
?>
</select>

<select name = "subject">
<?php

$stmt = $conn->prepare("SELECT * FROM Tblsubjects  ORDER BY Subjectname ASC");
$stmt->execute();


while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
	echo('<option value='.$row["SubjectID"].'>'.$row["Subjectname"].'</option>');
}
?>
</select>
  <input type="submit" value="Add to class">
</form>
</body>
</html>



