<?php

class Book{
    private $bookName;
    private $authorName;
    private $publisher;
    private $year;
    private $genres;
    private $isbn;

    public function __construct($bookName, $authorName,$publisher,$year,$genres,$isbn){
        $this->bookName=$bookName;
        $this->authorName=$authorName;
        $this->publisher=$publisher;
        $this->year=$year;
        $this->genres=$genres;
        $this->isbn=$isbn;
    }

    public function getBookName(){
        return $this->bookName;
    }

    public function getAuthorName(){
        return $this->authorName;
    }

    public function getPubliisher(){
        return $this->publisher;
    }
    
    public function getYear(){
        return $this->year;
    }

    public function getGenres(){
        return $this->genres;
    }

    public function getISBN(){
        return $this->isbn;
    }

    public function printBook(){
        echo "<br>{$this->bookName}, {$this->authorName}, {$this->publisher}, {$this->year}, {$this->genres}, {$this->isbn}";
    }
}

?>