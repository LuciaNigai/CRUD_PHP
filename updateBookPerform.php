<?php

if($_SERVER["REQUEST_METHOD"]==="POST"){

    include "connectionToDB.php";
    $oldbookName=$_POST["oldBook"];
    $oldauthorName=$_POST["oldAuthor"];
    $oldpublisher=$_POST["oldPublisher"];
    $oldyear=$_POST["oldYear"];
    $oldgenre=$_POST["oldGenre"];
    $oldisbn=$_POST["oldISBN"];

    $bookName=$_POST["fbook"];
    $authorName=$_POST["fauthor"];
    $publisher=$_POST["fpublisher"];
    $year=$_POST["fyear"];
    $genre=$_POST["fgenre"];
    $isbn=$_POST["fisbn"];

    
    // Split the strings into arrays
    $arrayOld = explode(',', $oldgenre);
    $arrayNew = explode(',', $genre);
    
    // Trim whitespace from each value in the arrays
    foreach ($arrayOld as &$value) {
        $value = trim($value);
    }
    unset($value); // Clean up the reference
    
    foreach ($arrayNew as &$value) {
        $value = trim($value);
    }
    unset($value); // Clean up the reference
    
    // Calculate the difference between the arrays
    $differenceOld = array_diff($arrayOld, $arrayNew);
    $differenceNew = array_diff($arrayNew, $arrayOld);
    
    // Convert the differences back to comma-separated strings
    $oldgenre = implode(", ", $differenceOld);
    $genre = implode(", ", $differenceNew);
    
    

    try{
        $sql = mysqli_query($conn,"call editBook('$oldbookName','$oldauthorName','$oldpublisher','$oldyear','$oldgenre','$oldisbn','$bookName','$authorName','$publisher','$year','$genre','$isbn')");
        if($sql){
        // Message for successfull insertion
        echo "<script>alert('Book updated successfully');</script>";
        echo "<script>window.location.href='index.php'</script>"; 
        }
    }
    catch(mysqli_sql_exception $e){
                // Message for unsuccessfull insertion
                echo "<script>alert('Error updating the book:{$e->getMessage()}');</script>";
                echo "<script>window.location.href='index.php'</script>"; 
    }
}

?>