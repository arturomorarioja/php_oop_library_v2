<?php

interface Borrowable
{
    public function borrowItem(): void;
    public function returnItem(): void;
}