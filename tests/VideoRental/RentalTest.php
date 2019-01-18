<?php

declare(strict_types=1);

namespace VideoRental;

use PHPUnit\Framework\TestCase;

final class RentalTest extends TestCase
{
    public function testCustomerName()
    {
        $name = "Clara";
        $customer = new Customer($name);

        $this->assertEquals($name, $customer->getName());
    }
}
