<?php

Class Library
{
    private array $items = [];

    public function addItem(LibraryItem $item): void
    {
        $this->items[] = $item;
    }

    public function getItems(): string
    {
        $items = '';
        foreach ($this->items as $item) {
            $items .= $item->getDetails() . '<br>';
        }
        return $items;
    }
}