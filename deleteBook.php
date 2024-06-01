<?php

if($_SERVER["REQUEST_METHOD"]==="POST"){
    include "connectionToDB.php";

    $bookName=$_POST["book"];
    $authorName=$_POST["author"];
    echo "$bookName";
    echo "$authorName";

    try{
        $sql = mysqli_query($conn,"call deleteBook('$bookName','$authorName')");
        if($sql){
        // Message for successfull insertion
        echo "<script>alert('Book deleted successfully');</script>";
        echo "<script>window.location.href='index.php'</script>"; 
        }
    }
    catch(mysqli_sql_exception $e){
                // Message for unsuccessfull insertion
                echo "<script>alert('Error deleting the book:{$e->getMessage()}');</script>";
                echo "<script>window.location.href='index.php'</script>"; 
    }
}

?>