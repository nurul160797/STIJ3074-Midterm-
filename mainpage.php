<?php
session_start();
include_once("dbconnect.php");
$title = $_GET['title']; 
$author = $_GET['author'];

//delete operation
if (isset($_COOKIE["timer"])){
    if (isset($_GET['operation'])) {
      $title = $_GET['title'];
      try {
        $sql = "DELETE FROM book WHERE title='$title'";
        $conn->exec($sql);
        echo "<script> alert('Delete Success')</script>";
      } catch(PDOException $e) {
        echo "<script> alert('Delete Error')</script>";
      }
    }

    try {

        $sql = "SELECT * FROM book WHERE title = '$title' ORDER BY title ASC";
        $stmt = $conn->prepare($sql );
        $stmt->execute();
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $book = $stmt->fetchAll(); 
        echo "<p><h1 align='center'>Your Current book</h1></p>";
        echo "<table border='1' align='center'>
        <tr>
          <th>Title</th>
          <th>Author</th>
          <th>Price</th>
          <th>Description</th>
          <th>Publisher</th>
          <th>ISBN</th>
          <th>Operation</th>

        </tr>";
        
        foreach($book as $book) {
            echo "<tr>";
            echo "<td>".$book['title']."</td>";
            echo "<td>".$book['author']."</td>";
            echo "<td>".$book['price']."</td>";
            echo "<td>".$book['description']."</td>";
            echo "<td>".$book['publisher']."</td>";
            echo "<td>".$book['isbn']."</td>";
            echo "<td><a href='mainpage.php?title=".$title."&price=".$book['price']."&operation=del' onclick= 'return confirm(\"Delete. Are your sure?\");'>Delete</a><br>
            <a href='update.php?title=".$title."&author=".$author['author']."&price=".$book['price']."&price=".$book['price'].
            "&description=".$book['description']."&publisher=".$book['publisher']."&isbn=".$book['isbn']." '>Update</a></td>";
            echo "</tr>";
        } 
        echo "</table>";
        echo "<p align='center'><a href='n_book.php?'>Insert new book</a></p>";

    } catch(PDOException $e) {
       echo "Error: " . $e->getMessage();
    }
}else{
  echo "<script> alert('Timer expired!!!')</script>";
  echo "<script> window.location.replace('index.html') </script>;";
}

  $conn = null;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
</head>
<body>
</body>
</html>