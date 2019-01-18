<?php
/**
 * Inappropriate Intimacy
 */
class Motorist
{
    /** @var string */
    private $title;
    /** @var string */
    private $firstName;
    /** @var string */
    private $surName;
    public function __construct(string $title, string $firstName, string $surName)
    {
        $this->title = $title;
        $this->firstName = $firstName;
        $this->surName = $surName;
    }
    public function getTitle(): string
    {
        return $this->title;
    }
    public function getFirstName(): string
    {
        return $this->firstName;
    }
    public function getSurName(): string
    {
        return $this->surName;
    }
}
class License
{
    /** @var Motorist */
    private $motorist;
    /** @var int  */
    private $points = 0;
    private $name;
    public function __construct(string $name, Motorist $motorist)
    {
        $this->name = $name;
        $this->motorist = $motorist;
    }
    public function addPoints(int $points)
    {
        $this->points += $points;
    }
    public function getPoints(): int
    {
        return $this->points;
    }
    public function getMotorist(): Motorist
    {
        return $this->motorist;
    }
    public function getSummary()
    {
        return $this->getMotorist()->getTitle() . " " .
            $this->getMotorist()->getFirstName(). " ".
            $this->getMotorist()->getSurName(). " " .
            $this->getPoints();
    }
}
$motorist = new Motorist("sr", "John", "Smith");
$license = new License("B1", $motorist);
echo $license->getSummary();