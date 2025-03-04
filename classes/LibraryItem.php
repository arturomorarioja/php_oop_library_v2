<?php

abstract class LibraryItem
{
    public string $title;
    public string $author;
    private int $publicationYear;

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
        return null;
    }

    protected function validateYear(int $year): bool
    {
        return $year > 0 && $year <= date('Y');
    }

    abstract public function getDetails(): string;
}
