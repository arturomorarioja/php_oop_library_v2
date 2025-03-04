<?php

class Library
{
    private array $items = [];

    public function addItem(LibraryItem $item): void
    {
        $this->items[] = $item;
    }

    public function listItems(): void
    {
        foreach ($this->items as $item) {
            echo $item->getDetails() . '<br>';
        }
    }
}