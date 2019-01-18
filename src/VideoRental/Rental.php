<?php

declare(strict_types=1);

namespace VideoRental;

class Rental
{
    public $movie;
    public $daysRented;

    public function __construct(Movie $movie, $daysRented)
    {
        $this->movie = $movie;
        $this->daysRented = $daysRented;
    }

    public function getDaysRented()
    {
        return $this->daysRented;
    }

    public function getMovie()
    {
        return $this->movie;
    }
}

