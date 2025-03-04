<?php

require_once 'LibraryItem.php';
require_once 'Borrowable.php';

class DVD extends LibraryItem implements Borrowable
{
    private int $duration;
    public string $format;
    private bool $isBorrowed = false;

    public function __construct(
        string $title,
        string $author,
        int $publicationYear,
        int $duration,
        string $format
    )
    {
        parent::__construct($title, $author, $publicationYear);
        $this->duration = $duration;
        $this->format = $format;
    }

    public function borrowItem(): void
    {
        if ($this->isBorrowed) {
            throw new Exception("DVD '{$this->title}' is already borrowed.");
        }
        $this->isBorrowed = true;
    }

    public function returnItem(): void
    {
        $this->isBorrowed = false;
    }

    public function getDetails(): string
    {
        return "DVD: {$this->title} by {$this->author} ({$this->publicationYear}) - {$this->duration} mins, Format: {$this->format}" . 
            ($this->isBorrowed ? ' [Borrowed]' : ' [Available]');
    }
}