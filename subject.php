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
    
    <title>Subjects</title>
    
</head>
<body>
<form action="addsubject.php" method = "post">
  Subject:<input type="text" name="Subject"><br>
  Teacher:<input type="text" name="Teacher"><br>
  <br>
  <input type="submit" value="Add Subject">
</form>
<?php
include_once('connection.php');
$stmt = $conn->prepare("SELECT * FROM Tblsubjects");
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
echo($row["Subjectname"].' '.$row["Teacher"]."<br>");
}
$conn=null;

?>
</body>
</html>