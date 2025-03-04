<?php

require_once 'LibraryItem.php';
require_once 'Borrowable.php';

class Book extends LibraryItem implements Borrowable
{
    private string $isbn;
    public int $pages;
    private bool $isBorrowed = false;

    public function __construct(
        string $title,
        string $author,
        int $publicationYear,
        string $isbn,
        int $pages
    )
    {
        parent::__construct($title, $author, $publicationYear);
        $this->isbn = $isbn;
        $this->pages = $pages;
    }

    public function borrowItem(): void
    {
        if ($this->isBorrowed) {
            throw new Exception("Book '{$this->title}' is already borrowed.");
        }
        $this->isBorrowed = true;
    }

    public function returnItem(): void
    {
        $this->isBorrowed = false;
    }

    public function getDetails(): string
    {
        return "Book: {$this->title} by {$this->author} ({$this->publicationYear}) - ISBN: {$this->isbn}" . 
            ($this->isBorrowed ? ' [Borrowed]' : ' [Available]');
    }
}