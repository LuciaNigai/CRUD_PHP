<?php

 include "connectionToDB.php";

try{
    $sql = mysqli_query($conn,"call deleteAllBooks()");
    if($sql){
    // Message for successfull insertion
    echo "<script>alert('Books deleted successfully');</script>";
    echo "<script>window.location.href='index.php'</script>"; 
    }
}
catch(mysqli_sql_exception $e){
    // Message for unsuccessfull insertion
    echo "<script>alert('Error deleting the books:{$e->getMessage()}');</script>";
    echo "<script>window.location.href='index.php'</script>"; 
}


?>