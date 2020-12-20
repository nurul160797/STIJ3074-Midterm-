<?php
include_once("dbconnect.php");

if (isset($_GET['title'])) {
  $title = $_GET['title'];
  $author = $_GET['author'];
  $price = $_GET['price'];
  $description = $_GET['description'];
  $publisher = $_GET['publisher'];
  $isbn = $_GET['isbn'];


  try {
    $sql = "INSERT INTO book(title, author, price, description, publisher, isbn)
    VALUES ('$title', '$author', '$price','$description','$publisher', 'isbn')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "<script> alert('Insert Success')</script>";
    echo "<script> window.location.replace('mainpage.php?title=".$title."') </script>;";

  } catch(PDOException $e) {
    echo "<script> alert('Insert Error')</script>";

  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
</head>

<body>
    <h2 align="center">Insert New Book</h2>

    <form action="n_book.php" method="get" align="center" onsubmit="return confirm('Insert new book?');">
        <label for="title">Title</label><br>
        <input type="text" id="title" name="title" value="" required><br><br>
        <label for="author">Author</label><br>
        <input type="text" id="author" name="author" value="" required><br><br>
        <label for="price">Price</label><br>
        <input type="text" id="price" name="price" value="" required><br><br>
        <label for="description">Description</label><br>
        <input type="text" id="description" name="description" value="" required><br><br>
        <label for="publisher">Publisher</label><br>
        <input type="text" id="publisher" name="publisher" value="" required><br><br>
        <label for="isbn">ISBN</label><br>
        <input type="text" id="isbn" name="isbn" value="" required><br><br>
        <input type="submit" value="Submit">
    </form>
    
    <p align="center"><a href="mainpage.php?">Cancel</a></p>
</body>

</html>
