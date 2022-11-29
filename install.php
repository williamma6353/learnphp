<?php
include_once("connection.php");
$stmt = $conn->prepare("DROP TABLE IF EXISTS TblUsers;
CREATE TABLE TblUsers 
(UserID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Gender VARCHAR(1) NOT NULL,
Surname VARCHAR(20) NOT NULL,
Forename VARCHAR(20) NOT NULL,
Password VARCHAR(200) NOT NULL,
House VARCHAR(20) NOT NULL,
Year INT(2) NOT NULL,
Role TINYINT(1))");
$stmt->execute();
$stmt->closeCursor();

$stmt = $conn->prepare("DROP TABLE IF EXISTS TblSubjects;
CREATE TABLE TblSubjects
(SubjectID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Subjectname VARCHAR(20) NOT NULL,
Teacher VARCHAR(20) NOT NULL)");
$stmt->execute();
$stmt->closeCursor();

$stmt = $conn->prepare("DROP TABLE IF EXISTS TblPupilStudies;
CREATE TABLE TblPupilStudies
(Subjectid INT(4),
Userid INT(4),
Classposition INT(2),
Classgrade  CHAR(1),
Exammark INT(2),
Comment TEXT,
PRIMARY KEY(Subjectid,Userid))");
$stmt->execute();
$stmt->closeCursor();

?>