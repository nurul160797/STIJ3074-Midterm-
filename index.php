<?php
session_start();
include_once("dbconnect.php");

$title = $_POST['title']; 

try {
    $sql = "SELECT * FROM book WHERE title = 'title'";
    $stmt = $conn->prepare($sql );
    $stmt->execute();
  
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $count = $stmt->rowCount();
    $book = $stmt->fetchAll();  

    if ($count > 0){
        foreach($book as $book) {
            $title = $book['title'];
        } 
        setcookie("timer", "10s", time()+100000,"/");

        $_SESSION["title"] = $title;

        //setcookie("email", $email, time()+60,"/");
        //setcookie("matric", $matric, time()+60,"/");
        //setcookie("name", $name, time()+60,"/");
        
       // echo "<script> alert('Login Success')</script>";
        echo "<script> window.location.replace('mainpage.php?title=".$title."') </script>;";
    }else{
       // echo "<script> alert('Login Failed')</script>";
        echo "<script> window.location.replace('index.html') </script>;";
    }

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
  $conn = null;
?>