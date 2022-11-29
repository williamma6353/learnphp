<?php

session_start();
include_once ("connection.php");
array_map("htmlspecialchars", $_POST);
$stmt = $conn->prepare("SELECT * FROM tblusers WHERE surname =:username ;" );
$stmt->bindParam(':username', $_POST['Username']);
$stmt->execute();
//if no results from query, head back to login page
if($stmt->rowCount()>0){
    $_SESSION['name']=$row["surname"];





while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{ 
    $hashed= $row['Password'];
    $attempt= $_POST['Pword'];
    if(password_verify($attempt,$hashed)){
        $_SESSION['name']=$row["Surname"];
        if (!isset($_SESSION['backURL'])){
            $backURL= "/"; //Sets a default destination if no BackURL set (parent dir)
        }else{
            $backURL=$_SESSION['backURL'];
        }
        unset($_SESSION['backURL']);
        header('Location: ' . $backURL);

    }else{

        header('Location: login.php');
    }
}
}else{
    header('Location: login.php');
}
$conn=null;
?>
