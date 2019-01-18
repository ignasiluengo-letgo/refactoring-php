<?php

namespace VideoRental;

class Customer
{
    public $name;
    public $rentals;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function addRental(Rental $rental)
    {
        $this->rentals[] = $rental;
    }

    public function getName()
    {
        return $this->name;
    }

    public function statement()
    {
        $totalAmount = 0;
        $frequentRenterPoints = 0;
        $result = "Rental Record for " . $this->getName() . "\n";

        foreach ($this->rentals as $each) {

            $thisAmount = 0;

            switch ($each->movie->getPriceCode()) {
                case Movie::REGULAR:
                    $thisAmount += 2;
                    if ($each->getDaysRented() > 2) {
                        $thisAmount += ($each->getDaysRented() - 2) * 1.5;
                    }
                    break;

                case Movie::NEW_RELEASE:
                    $thisAmount += $each->getDaysRented() * 3;
                    break;

                case Movie::CHILDRENS:
                    $thisAmount += 1.5;
                    if ($each->getDaysRented() > 3) {
                        $thisAmount += ($each->getDaysRented() - 3) * 1.5;
                    }
                    break;
            }

            $frequentRenterPoints++;

            // add bonus for a two day release rental
            if (($each->movie->getPriceCode() == Movie::NEW_RELEASE) && ($each->getDaysRented() > 1)) {
                $frequentRenterPoints++;
            }

            $result .= "\t" . $each->movie->getTitle() . "\t" . $thisAmount . "\n";
            $totalAmount += $thisAmount;
        }

        // add footer lines
        $result .= "Amount owed is " . $totalAmount . "\n";
        $result .= "You earned " . $frequentRenterPoints . " frequent renter points";

        return $result;
    }
}
