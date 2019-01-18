<?php

class Bird {
    // ...
    public function getSpeed() {
        switch ($this->type) {
            case EUROPEAN:
                return $this->getBaseSpeed();
            case AFRICAN:
                return $this->getBaseSpeed() - $this->getLoadFactor() * $this->numberOfCoconuts;
            case NORWEGIAN_BLUE:
                return ($this->isNailed) ? 0 : $this->getBaseSpeed($this->voltage);
        }
        throw new Exception("Should be unreachable");
    }
    // ...
}

// --------------------------------------------------------------------------------------------

abstract class BirdRefactored {
    // ...
    abstract function getSpeed();
    // ...
}

class European extends Bird {
    public function getSpeed() {
        return $this->getBaseSpeed();
    }
}
class African extends Bird {
    public function getSpeed() {
        return $this->getBaseSpeed() - $this->getLoadFactor() * $this->numberOfCoconuts;
    }
}
class NorwegianBlue extends Bird {
    public function getSpeed() {
        return ($this->isNailed) ? 0 : $this->getBaseSpeed($this->voltage);
    }
}

// Somewhere in Client code.
$speed = $bird->getSpeed();


// Replace Conditionals With Composition And Polymorphism