<?php

function printOwing() {
    $this->printBanner();
    print("name:  " . $this->name);
    print("amount " . $this->getOutstanding());
}

// --------------------------------------------------------------------------------------------


function printOwingRefactored() {
    $this->printBanner();
    $this->printDetails($this->getOutstanding());
}

function printDetails($outstanding) {
    print("name:  " . $this->name);
    print("amount " . $outstanding);
}