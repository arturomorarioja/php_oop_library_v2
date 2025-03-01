<?php

Class LibraryItem
{
    public string $title;
    public string $author;
    private int $publicationYear;
    private bool $isBorrowed = false;

    public function __construct(
        string $title,
        string $author,
        int $publicationYear
    )
    {
        $this->title = $title;
        $this->author = $author;
        if ($this->validateYear($publicationYear)) {
            $this->publicationYear = $publicationYear;
        } else {
            throw new Exception('Invalid publication year.');
        }
    }

    public function __get(string $property): mixed
    {
        if ($property === 'publicationYear') {
            return $this->publicationYear;
        }
        if ($property === 'isBorrowed') {
            return $this->isBorrowed;
        }
        return null;
    }

    public function __set(string $property, mixed $value)
    {
        if ($property === 'publicationYear' && !$this->validateYear($value)) {
            throw new Exception('Invalid publication year.');
        }
        if ($property === 'isBorrowed') {
            $this->isBorrowed = (bool) $value;
        }
    }

    protected function validateYear(int $year): bool
    {
        return $year > 0 && $year <= date('Y');
    }

    public function borrow(): void
    {
        if ($this->isBorrowed) {
            throw new Exception("Item '{$this->title}' is already borrowed.");
        }
        $this->isBorrowed = true;
    }

    public function returnItem(): void
    {
        $this->isBorrowed = false;
    }

    public function getDetails(): string
    {
        return "<em>{$this->title}</em> by {$this->author} ({$this->publicationYear})" .
            ($this->isBorrowed ? ' - Currently Borrowed' : ' - Available');
    }
}