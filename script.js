function addBook() {
    // Perform the desired action here, such as navigating to a new page
    window.location.href = "addBook.php";
}

function deleteBookSubmit() {
    var r = confirm("Are you sure you want to delete the book?");
    if (r == true) {
        return true;
    } else {
        return false;
    }
} 

function deleteAllBooks(){
	var result = confirm("Are you sure you want to delete all books?");
    if (result) {
        // User pressed OK, redirect to the servlet
        window.location.href ="deleteAllBooks.php";
    }
}

function confirmSubmit() {
    var r = confirm("Are you sure you want to submit the changes?");
    if (r == true) {
        return true;
    } else {
        return false;
    }
}