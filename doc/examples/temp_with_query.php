<?php

class Item
{
    /** @var int */
    private $quantity;
    /** @var float */
    private $itemPrice;
    public function calculateTotal(): float
    {
        $basePrice = $this->quantity * $this->itemPrice;
        if ($basePrice > 1000) {
            return $basePrice * 0.95;
        }
        else {
            return $basePrice * 0.98;
        }
    }
}


class ItemRefactored
{
    /** @var int */
    private $quantity;
    /** @var float */
    private $itemPrice;
    function calculateTotal(): float
    {
        if ($this->basePrice() > 1000) {
            return $this->basePrice();
        }
        return $this->basePrice() * 0.89;
    }
    public function basePrice(): float
    {
        return $this->quantity * $this->itemPrice;
    }
}