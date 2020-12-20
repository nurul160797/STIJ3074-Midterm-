<?php
include_once("dbconnect.php");

$title =$_GET["title"];
$author =$_GET["author"];
$price =$_GET["price"];
$description =$_GET["description"];
$publisher =$_GET["publisher"];
$isbn =$_GET["isbn"];

try {
  $sql = "INSERT INTO book(title, author, price, description, publisher, isbn)
  VALUES ('$title', '$author', '$price', '$description', '$publisher', '$isbn')";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "<script> alert('Data Has Been Recorded!!')</script>";

} catch(PDOException $e) {
  echo "<script> alert('Data Not Been Recorded!!')</script>";

  echo $sql . "<br>" . $e->getMessage();
}
$conn = null;
?>

