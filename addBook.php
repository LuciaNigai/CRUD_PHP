

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Add Book</title>
</head>
<body>
<form class="newBookForm" action="addBook.php" method="post">
<label for="fbook">Book name</label>
<input type="text" id="fbook" name="fbook"  required><br>
<label for="fauthor">Author name</label>
<input type="text" id="fauthor" name="fauthor"  required><br>
<label for="fpublisher">Publisher</label>
<input type="text" id="fpublisher" name="fpublisher"  required><br>
<label for="fyear">Pubication year</label>
<input type="number" min="1900" max="2024" step="1"  id="fyear" name="fyear"> <br>
<label for="fgenre">Genre</label>
<input type="text" id="fgenre" name="fgenre"  required><br>
<label for="fisbn">ISBN</label>
<input type="text" id="fisbn" name="fisbn" minlength="13" maxlength="13"><br>
<input type="submit" value="Submit" name="submitbutton">
</form>
</body>
</html>

<?php
if($_SERVER["REQUEST_METHOD"]==="POST"){
    include "connectionToDB.php";
    $bookName=$_POST["fbook"];
    $authorName=$_POST["fauthor"];
    $publisher=$_POST["fpublisher"];
    $year=$_POST["fyear"];
    $genre=$_POST["fgenre"];
    $isbn=$_POST["fisbn"];
    try{
        $sql = mysqli_query($conn,"call addBook('$bookName','$authorName','$publisher','$year','$genre','$isbn')");
        if($sql){
        // Message for successfull insertion
        echo "<script>alert('Book added successfully');</script>";
        echo "<script>window.location.href='index.php'</script>"; 
        }
    }
    catch(mysqli_sql_exception $e){
                // Message for unsuccessfull insertion
                echo "<script>alert('Error inserting the book:{$e->getMessage()}');</script>";
                echo "<script>window.location.href='index.php'</script>"; 
    }

}
?>