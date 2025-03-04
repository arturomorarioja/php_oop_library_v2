<?php

require_once 'LibraryItem.php';

class Magazine extends LibraryItem
{
    private int $issueNumber;
    public string $publisher;

    public function __construct(
        string $title,
        string $author,
        int $publicationYear,
        int $issueNumber,
        string $publisher
    )
    {
        parent::__construct($title, $author, $publicationYear);
        $this->issueNumber = $issueNumber;
        $this->publisher = $publisher;
    }

    public function getDetails(): string
    {
        return "Magazine: {$this->title} ({$this->publicationYear}) - Issue {$this->issueNumber}, Publisher: {$this->publisher}";
    }
}
