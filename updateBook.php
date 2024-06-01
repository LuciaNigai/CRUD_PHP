<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="script.js" defer></script>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Document</title>
</head>
<body>
    
    <form class="newBookForm"  action="updateBookPerform.php" method="post" onsubmit="return confirmSubmit();">
        <!-- old book data -->
        <input type="hidden" id="oldBook" name="oldBook" value="<?php echo $_POST["bookName"]?>" required>
        <input type="hidden" id="oldAuthor" name="oldAuthor" value="<?php echo $_POST["authorName"]?>" required>
        <input type="hidden" id="oldPublisher" name="oldPublisher" value="<?php echo $_POST["publisher"]?>" required>
        <input type="hidden" value="<?php echo $_POST["year"]?>" id="oldYear" name="oldYear"> <br>
        <input type="hidden" id="oldGenre" name="oldGenre" value="<?php echo $_POST["genre"]?>" required><br>
        <input type="hidden" id="oldISBN" name="oldISBN" minlength="13" maxlength="13" value="<?php echo $_POST["isbn"]?>"><br>
        <!-- new book data -->
        <label for="fbook">Book name</label>
        <input type="text" id="fbook" name="fbook" value="<?php echo $_POST["bookName"]?>" required><br>
        <label for="fauthor">Author name</label>
        <input type="text" id="fauthor" name="fauthor" value="<?php echo $_POST["authorName"]?>" required><br>
        <label for="fpublisher">Publisher</label>
        <input type="text" id="fpublisher" name="fpublisher" value="<?php echo $_POST["publisher"]?>" required><br>
        <label for="fyear">Pubication year</label>
        <input type="number" min="1900" max="2024" step="1" value="<?php echo $_POST["year"]?>" id="fyear" name="fyear"> <br>
        <label for="fgenre">Genre</label>
        <input type="text" id="fgenre" name="fgenre" value="<?php echo $_POST["genre"]?>" required><br>
        <label for="fisbn">ISBN</label>
        <input type="text" id="fisbn" name="fisbn" minlength="13" maxlength="13" value="<?php echo $_POST["isbn"]?>"><br>
        <input type="submit" value="Submit" name="submitbutton">
    </form>

</body>
</html>
