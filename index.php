<?php
include "Book.php";
require_once "ConnectionToDB.php";

$sql = "CALL getBooks()";
$result=$conn->query($sql);
$books=array();
if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
        $bookName=$row["book_name"];
        $authorName=$row["author"];
        $publisher=$row["publisher"];
        $year=$row["year"];
        $genres=$row["genres"];
        $isbn=$row["isbn"];
        $book = new Book($bookName,$authorName,$publisher,$year,$genres,$isbn);
        array_push($books,$book);
    }
}

if($_SERVER["REQUEST_METHOD"]==="POST"){
    $search=$_POST["searchFor"];
    $param=$_POST["search_parameter"];
    $search_array = array();
    switch($param){
        case "book":
            foreach($books as $book){
                if(str_contains($book->getBookName(),$search)){
                    array_push($search_array,$book);
                }
            }
        break;
        case "author":
            foreach($books as $book){
                if(str_contains($book->getAuthorName(),$search)){
                    array_push($search_array,$book);
                }
            }
        break;
        case "publisher":
            foreach($books as $book){
                if(str_contains($book->getPubliisher,$search)){
                    array_push($search_array,$book);
                }
            }
        break;
        case "year":
            foreach($books as $book){
                if($book->getYear()===$search){
                    array_push($search_array,$book);
                }
            }
        break;
        case "genre":
            foreach($books as $book){
                $genres_array = explode(",",$book->getGenres());
                foreach($genres_array as $genre){
                    if($genre===$search){
                        array_push($search_array,$book);
                    }
                }
            }
        break;
        case "isbn":
            foreach ($books as $book) {
            if($book->getISBN()===$search){
                array_push($search_array,$book);
            }
            }
        break;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<script type="text/javascript" src="script.js" defer></script>
<title>Page Title</title>
</head>
<body>
    <div class="main_class">
        <h1>Books</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>book</th>
                    <th>author</th>
                    <th>publisher</th>
                    <th>year</th>
                    <th>genres</th>
                    <th>isbn</th>
                    <th colspan="2">Operations</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($books as $book): ?>
                    <tr>
                        <td><?php echo $book->getBookName(); ?></td>
                        <td><?php echo $book->getAuthorName(); ?></td>
                        <td><?php echo $book->getPubliisher(); ?></td>
                        <td><?php echo $book->getYear(); ?></td>
                        <td><?php echo $book->getGenres(); ?></td>
                        <td><?php echo $book->getISBN(); ?></td>
                        <td colspan="1">
                            <form action="updateBook.php" method="post">
                                <input type="hidden" name="bookName" value="<?php echo $book->getBookName();?>">
                                <input type="hidden" name="authorName" value="<?php echo $book->getAuthorName(); ?>">
                                <input type="hidden" name="publisher" value="<?php echo $book->getPubliisher(); ?>">
                                <input type="hidden" name="year" value="<?php echo  $book->getYear(); ?>">
                                <input type="hidden" name="genre" value="<?php echo  $book->getGenres(); ?>">
                                <input type="hidden" name="isbn" value="<?php echo  $book->getISBN(); ?>">
                                <input type="submit" value="Update">
                            </form>
                        </td>
                        <td colspan="1">
                            <form action="deleteBook.php" method="POST" onsubmit="return deleteBookSubmit()">
                                <input type="hidden" name="book" value="<?php echo $book->getBookName() ?>">
                                <input type="hidden" name="author" value="<?php echo $book->getAuthorName() ?>">
                                <input type="submit" value="Delete">
                            </form>
               </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <button class="buttonInsert" onclick="addBook()">Insert new book</button>
    <button onclick="deleteAllBooks()">Delete all books</button>
    <div class="searchContainer">
		<form action="index.php" method="POST">
	          	<input class="search-bar" type="text" name="searchFor" placeholder="Search..." required> <br>
	          	<input type="radio" id="book" name="search_parameter" value="book" required>
				<label for="book">Book name</label>
				<input type="radio" id="author" name="search_parameter" value="author" required>
				<label for="author">Author name</label>
				<input type="radio" id="publisher" name="search_parameter" value="publisher" required>
				<label for="publisher">Publisher</label> 
				<input type="radio" id="year" name="search_parameter" value="year" required>
				<label for="year">Published year</label> 
				<input type="radio" id="genre" name="search_parameter" value="genre" required>
				<label for="genre">Genre</label> 
				<input type="radio" id="isbn" name="search_parameter" value="isbn" required>
				<label for="isbn">ISBN</label><br> 
	            <input type="submit" value="Search">
		</form>
	</div>

    <?php if(count($search_array)>0): ?>
    <div class="main_class">
        <h1>Books</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>book</th>
                    <th>author</th>
                    <th>publisher</th>
                    <th>year</th>
                    <th>genres</th>
                    <th>isbn</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($search_array as $book): ?>
                    <tr>
                        <td><?php echo $book->getBookName(); ?></td>
                        <td><?php echo $book->getAuthorName(); ?></td>
                        <td><?php echo $book->getPubliisher(); ?></td>
                        <td><?php echo $book->getYear(); ?></td>
                        <td><?php echo $book->getGenres(); ?></td>
                        <td><?php echo $book->getISBN(); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php else : ?>
        <p>There are not books found.</p>
    <?php endif; ?>

</body>
</html>
